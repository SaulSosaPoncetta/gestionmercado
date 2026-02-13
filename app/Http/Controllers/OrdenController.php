<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Ajuste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PedidoEnvioMail;

class OrdenController extends Controller
{

    // Lógica para mostrar la lista de órdenes con paginación
    public function ordenes_index(Request $request)

    {
    
       $buscar = $request->get('buscar'); // Obtiene el término de búsqueda del formulario

       $query = Orden::with(['usuario', 'detalles.producto'])->orderBy('created_at', 'desc');
       //return response()->json($ordenes);

       if ($buscar) { // Valida si hay un término de búsqueda
           $query->where(function($userQuery) use ($buscar){
          
           $userQuery->whereHas('usuario', function($userQuery) use ($buscar){
               $userQuery->where('name', 'like', '%' . $buscar . '%')
                         ->orWhere('email', 'like', '%' . $buscar . '%');
           });
           $userQuery->orWhereHas('detalles.producto', function($productoQuery) use ($buscar){
                   $productoQuery->where('nombre', 'like', '%' . $buscar . '%'); // Filtra los resultados por el nombre del producto
          });
       });
       }
       $ordenes = $query->paginate(5);

        return view('admin.pedidos.index', compact('ordenes', 'buscar')); // Muestra la vista con la lista de órdenes y el término de búsqueda si existe
    }
 

      // Lógica para mostrar el formulario de creación de envío para una orden específica
    public function ordenes_create_envio($id)
    {
        $orden = Orden::with('detalles')->findOrFail($id); // Obtiene el pedido de la base de datos
        return view('admin.pedidos.create_envio', compact('orden')); // Muestra el formulario de creación de envío
    }

  
    public function store(Request $request, $id)
    {
        $orden = Orden::findOrFail($id); // Obtiene el pedido de la base de datos
        $ajuste = Ajuste::first(); // Obtiene el primer registro de ajustes para obtener datos del vendedor
    
        $request->validate([ // Valida los datos del formulario
            'nota' => 'required',
        ]);

        //return response()->json($request->all());
        $orden->nota = $request->input('nota'); // Actualiza la nota del pedido
        $orden->estado_orden = 'Enviado'; // Actualiza el estado del pedido

        $orden->save(); // Guarda el pedido en la base de datos

        // Envia correo electrónico al cliente notificando el envío
        Mail::to($orden->usuario->email)->send(new PedidoEnvioMail($orden, $ajuste)); // Envía el correo electrónico al cliente con la información del pedido y ajustes

        return redirect()->route('admin.pedidos.index') // Redirige al index de pedidos
            ->with('mensaje', 'Nota de envío actualizada exitosamente.') // Mensaje de exito
            ->with('icono', 'success'); // Icono de exito
            
    }

    public function show(Orden $orden)
    {
        //
    }

    public function edit(Orden $orden)
    {
        //
    }

    public function update(Request $request, Orden $orden)
    {
        //
    }

    public function destroy(Orden $orden)
    {
        //
    }
}
