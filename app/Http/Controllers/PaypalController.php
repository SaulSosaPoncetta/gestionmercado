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
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    protected $provider;

    public function __construct()
    {
        $this->provider = new PayPalClient;
        $this->provider->setApiCredentials(config('paypal'));
        $this->provider->getAccessToken();
    }

    public function pago(Request $request)
    {
        $request->validate([
            'direccion_envio' => 'required|string|max:255',
            'total' => 'required|numeric|min:0.01',
        ]);
        $direccion_formulario = $request->input('direccion_envio');
        $request->session()->put('direccion_envio', $direccion_formulario);

        $total = $request->input('total');
        $data = [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => config('paypal.currency'),
                        "value" => number_format($total, 2, '.', ''),
                        ],
                        "description" => "Compra en Eloisa",
                    ]
                ],
            "application_context" => [
                "return_url" => route('web.paypal.paypalgracias'),
                "cancel_url" => route('web.paypal.paypalcancelar_pago'),
                ]
            ];

            try {
                $response = $this->provider->createOrder($data);

                if (isset($response['id']) && $response['status'] == 'CREATED') {
                    foreach ($response['links'] as $link) {
                        if ($link['rel'] === 'approve') {
                            return redirect()->away($link['href']);
                        }
                    }
                    return redirect()->route('web.carrito.index')
                        ->with('mensaje', 'No se pudo redirigir a PayPal para realizar el pago')
                        ->with('icono', 'error');
                } else {
                    return redirect()->route('web.carrito.index')
                        ->with('mensaje', 'Error al crear la orden de pago en PayPal')
                        ->with('icono', 'error');
                }
            } catch (\Exception $e) {
                return redirect()->route('web.carrito.index')
                    ->with('mensaje', 'Execpcion capturada: ' . $e->getMessage())
                    ->with('icono', 'error');
            }
        }

    // Proceso de pago con paypal: ahora crea UNA orden por cada vendedor presente en el carrito
    public function gracias(Request $request)
        {
            $usuario_id = Auth::user()->id;

            $token = $request->query('token');

            try {
                $response = $this->provider->capturePaymentOrder($token);

                if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                    $DatosPago = $response['purchase_units'][0]['payments']['captures'][0];
                    $transaccion_id = $DatosPago['id'];
                    $estado_pago = $DatosPago['status'];
                    $divisa = $DatosPago['amount']['currency_code'];
                    $estado_orden = 'Procesando';
                    $direccion_envio = $request->session()->get('direccion_envio', 'No se encontro la direccion de envio');

                    DB::begintransaction();
                        try {
                            $carritos = Carrito::where('usuario_id', $usuario_id)->with('producto')->get();

                            // Agrupo los items del carrito por vendedor (0 = productos viejos sin vendedor asignado)
                            $itemsPorVendedor = $carritos->groupBy(function ($item) {
                                return $item->producto->vendedor_id ?? 0;
                            });

                            $primeraOrdenId = null;

                            foreach ($itemsPorVendedor as $vendedor_id => $items) {
                                $totalVendedor = $items->sum(function ($item) {
                                    return $item->producto->precio_venta * $item->cantidad;
                                });

                                $orden = new Orden();
                                $orden->usuario_id = $usuario_id;
                                $orden->vendedor_id = $vendedor_id ?: null;
                                $orden->total = $totalVendedor;
                                $orden->divisa = $divisa;
                                $orden->estado_pago = $estado_pago;
                                $orden->estado_orden = $estado_orden;
                                $orden->transaccion_id = $transaccion_id;
                                $orden->direccion_envio = $direccion_envio;
                                $orden->save();

                                if (!$primeraOrdenId) {
                                    $primeraOrdenId = $orden->id;
                                }

                                foreach ($items as $item) {
                                    $detalle = new DetalleOrden();
                                    $detalle->orden_id = $orden->id;
                                    $detalle->producto_id = $item->producto_id;
                                    $detalle->cantidad = $item->cantidad;
                                    $detalle->precio = $item->producto->precio_venta;
                                    $detalle->save();

                                    $producto = $item->producto;
                                    $producto->stock -= $item->cantidad;
                                    $producto->save();

                                    $item->delete();
                                }

                                Mail::to($orden->usuario->email)->send(new CompraConfirmada($orden));
                            }

                            DB::commit();

                            return redirect()->route('web.paypal.ordencompletada', $primeraOrdenId)
                                ->with('mensaje', 'Pago exitoso')
                                ->with('icono', 'success');
                        } catch (\Exception $e) {
                            DB::rollback();
                            return redirect()->route('web.carrito.index')
                                ->with('mensaje', 'Error al guardar los datos de la orden en la base de datos: ' . $e->getMessage())
                                ->with('icono', 'error');
                        }
                    } else {
                    return redirect()->route('web.carrito.index')
                        ->with('mensaje', 'Error al realizar el pago')
                        ->with('icono', 'error');
                }
            } catch (\Exception $e) {
                return redirect()->route('web.carrito.index')
                    ->with('mensaje', 'Execpcion capturada: ' . $e->getMessage())
                    ->with('icono', 'error');
            }
        }

        // Muestra la confirmación agrupando todas las sub-ordenes de la misma transaccion de PayPal
        public function orden_completada($id)
        {
            $orden = Orden::findOrFail($id);
            $ordenes = Orden::where('transaccion_id', $orden->transaccion_id)
                ->with('detalles.producto', 'vendedor')
                ->get();
            $ajuste = Ajuste::first();
            return view('web.orden_completada', compact('orden', 'ordenes', 'ajuste'));
        }

        public function cancelar_pago(Request $request)
        {

        }


}
