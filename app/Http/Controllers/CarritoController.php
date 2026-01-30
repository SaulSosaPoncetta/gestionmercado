<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Ajuste;
use App\Models\Carrito;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    
    public function index_carrito()
    {
        $ajuste = Ajuste::first();
        $carritos = Carrito::where('usuario_id', Auth::user()->id)
            ->with('producto.imagenes')
            ->get();
            
            return view('web.carrito', compact('carritos','ajuste'));
    }

    
    public function agregar_a_carrito(Request $request)
    {
       //return response()->json($request->all());
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $carrito_existe = Carrito::where('producto_id', Auth::user()->id)
            ->where('producto_id', $request->producto_id)
            ->first();

        if($carrito_existe){
            $carrito_existe->cantidad += $request->cantidad;
            $carrito_existe->save();
        } else {
            Carrito::create([
                'usuario_id' => Auth::user()->id,
                'producto_id' => $request->producto_id,
                'cantidad' => $request->cantidad,
            ]);
            return redirect()->route('web.carrito.index')
                ->with('mensaje', 'Producto agregado al carrito exitosamente')
                ->with('icono', 'success');
        }
    }

    
    public function actualizar_cantidad(Request $request)
    {
        //
    }

    
    public function eliminar_del_carrito(Carrito $carrito)
    {
        //
    }

    
    public function vaciar_carrito(Carrito $carrito)
    {
        //
    }
}
