<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Orden;
use App\Models\Carrito;
use App\Models\DetalleOrden;
use App\Models\Ajuste;
use Illuminate\Support\Facades\Mail; 
use App\Mail\CompraConfirmada;       
use Srmklive\PayPal\Services\PayPal as PayPalClient; // Importa la clase para usar las funciones de paypal

class PaypalController extends Controller // Clase que hereda de la clase Controller
{
    protected $provider; // Variable que almacena el objeto de paypal

    public function __construct() // Constructor de la clase
    {
        $this->provider = new PayPalClient; // Crea un objeto de paypal
        $this->provider->setApiCredentials(config('paypal')); // Configura los datos de paypal
        $this->provider->getAccessToken(); // Obtiene el token de acceso
    }

    public function pago(Request $request) // Proceso de pago con paypal
    {
        $request->validate([
            'direccion_envio' => 'required|string|max:255',
            'total' => 'required|numeric|min:0.01',
        ]);
        $direccion_formulario = $request->input('direccion_envio'); // direccion de envio del formulario
        $request->session()->put('direccion_envio', $direccion_formulario); // guardo la direccion de envio en la session para poder tenrla temporalmente y enviarla al proceso de pago
        
        //return response()->json($request->all());
        //proceos el pago con paypal
        $total = $request->input('total'); // total del pago
        // creo la orden para mandar el data a paypal
        $data = [ // datos de la orden
            "intent" => "CAPTURE", // intento de pago
            "purchase_units" => [   // unidades de compra
                [
                    "amount" => [ // cantidad de la unidad
                        "currency_code" => config('paypal.currency'), // moneda
                        "value" => number_format($total, 2, '.', ''), // valor
                        ],
                        "description" => "Compra en Eloisa", // descripcion de la transaccion
                    ]
                ],
            "application_context" => [ // contexto de la aplicacion
                "return_url" => route('web.paypal.paypalgracias'), // url de retorno
                "cancel_url" => route('web.paypal.paypalcancelar_pago'), // url de cancelacion
                ]
            ];

            //dd($data); // imprimo los datos de la orden en pantalla

           // $response = $this->provider->createOrder($data); // crea la orden

           // dd($response);

            try {
                $response = $this->provider->createOrder($data); // crea la orden

                if (isset($response['id']) && $response['status'] == 'CREATED') { // si el status es creado
                    foreach ($response['links'] as $link) { // recorro las links
                        if ($link['rel'] === 'approve') { // si el link es para aprobar
                            return redirect()->away($link['href']); // redirige a la url
                        }
                    }
                    return redirect()->route('web.carrito.index') // si no se redirige a la url
                        ->with('mensaje', 'No se pudo redirigir a PayPal para realizar el pago') // mensaje de error
                        ->with('icono', 'error'); // icono de error
                } else {
                    return redirect()->route('web.carrito.index') 
                        ->with('mensaje', 'Error al crear la orden de pago en PayPal') // mensaje de error
                        ->with('icono', 'error'); // icono de error
                }
            } catch (\Exception $e) {
                return redirect()->route('web.carrito.index')
                    ->with('mensaje', 'Execpcion capturada: ' . $e->getMessage())
                    ->with('icono', 'error');
            } 
        }

    public function gracias(Request $request) // Proceso de pago con paypal
        {
            $usuario_id = Auth::user()->id; // id del usuario y autenticado
            
            $token = $request->query('token'); // token de la orden

            try {
                $response = $this->provider->capturePaymentOrder($token); // captura la orden
                //dd($response);
                
                if (isset($response['status']) && $response['status'] == 'COMPLETED') { // si el status es completado
                    // AQUI se pone la logica para almacenar el pago en la base de datos
                    $DatosPago = $response['purchase_units'][0]['payments']['captures'][0]; // obtengo los datos del pago
                    $total = $DatosPago['amount']['value']; // obtengo el total del pago
                    $transaccion_id = $DatosPago['id']; // obtengo el id de la transaccion
                    $estado_pago = $DatosPago['status']; // obtengo el estado del pago  
                    $divisa = $DatosPago['amount']['currency_code']; // obtengo la divisa del pago
                    $estado_orden = 'Procesando'; // obtengo el estado de la orden
                    $direccion_envio = $request->session()->get('direccion_envio', 'No se encontro la direccion de envio'); // obtengo la direccion de envio del formulario almacenada en la session

                    // guardo los datos de la orden en la base de datos uso rollback para que no se pierda la informacion
                    DB::begintransaction(); // inicio de la transaccion
                        try {
                            // Guardar los datos de la orden en la base de datos
                            $orden = new Orden();
                            $orden->usuario_id = $usuario_id;
                            $orden->total = $total;
                            $orden->divisa = $divisa;
                            $orden->estado_pago = $estado_pago;
                            $orden->estado_orden = $estado_orden;
                            $orden->transaccion_id = $transaccion_id;
                            $orden->direccion_envio = $direccion_envio;

                            $orden->save(); // guardo los datos de la orden en la base de datos

                            // Guardar los datos de la destalle en la base de datos
                            $carritos = Carrito::where('usuario_id', $usuario_id )->get();
                            foreach ($carritos as $item) {
                                $detalle = new DetalleOrden();
                                $detalle->orden_id = $orden->id;
                                $detalle->producto_id = $item->producto_id;
                                $detalle->cantidad = $item->cantidad;
                                $detalle->precio = $item->producto->precio_venta;
                                $detalle->save(); // guardo los datos de la destalle en la base de datos

                            // Descuento los productos deagregados del stock en la base de datos
                                $producto = $item->producto; // obtengo el producto
                                $producto->stock -= $item->cantidad; // decremento el stock del producto
                                $producto->save(); // guardo los cambios en la base de datos

                            // eliminar el producto del carrito
                                $item->delete(); // elimino el producto del carrito
                            }
                            DB::commit(); // si todo va bien, se va a lanzar la transaccion y se ejecuta el catch       

                            // enviar correo de confirmacion
                            Mail::to($orden->usuario->email)->send(new CompraConfirmada($orden));

                            return redirect()->route('web.paypal.ordencompletada',$orden->id) // si no se redirige a la url con el id de la orden
                                ->with('mensaje', 'Pago exitoso')   // mensaje de exito
                                ->with('icono', 'success');           // icono de exito
                        } catch (\Exception $e) {
                            DB::rollback(); // si ocurre algun error en la transaccion, se va a lanzar una excepcion y se va a ejecutar el catch
                            return redirect()->route('web.carrito.index') // si no se redirige a la url
                                ->with('mensaje', 'Error al guardar los datos de la orden en la base de datos: ' . $e->getMessage()) // mensaje de error
                                ->with('icono', 'error'); // icono de error
                        }
                    } else {
                    return redirect()->route('web.carrito.index')   // si no se redirige a la url
                        ->with('mensaje', 'Error al realizar el pago') // mensaje de error
                        ->with('icono', 'error');                   // icono de error
                }
            } catch (\Exception $e) {
                return redirect()->route('web.carrito.index')
                    ->with('mensaje', 'Execpcion capturada: ' . $e->getMessage())
                    ->with('icono', 'error');
            }
        }

        public function orden_completada($id)     // Proceso de completar la orden con paypal, recibe la orden por id
        {
            $orden = Orden::findOrFail($id);
            $ajuste = Ajuste::first();
            return view('web.orden_completada', compact('orden','ajuste'));
        }
    
        public function cancelar_pago(Request $request)     // Proceso de cancelar pago con paypal
        {

        }


}
