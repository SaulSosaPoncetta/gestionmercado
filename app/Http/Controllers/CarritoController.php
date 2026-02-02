<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Ajuste;
use App\Models\Carrito;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
// index de la vista de carrito    
    public function index_carrito() 
    {

        if(Auth::guest()){ // si el usuario no esta logeado
            return redirect()->route('web.authloginweb') // redirecciona al login
            ->with('mensaje', 'Debes estar logeado para acceder al carrito') // mensaje de error
            ->with('icono', 'warning'); // icono de error
        }


        $ajuste = Ajuste::first(); // obtiene el ajuste del usuario
        $carritos = Carrito::where('usuario_id', Auth::user()->id) // obtiene los carritos del usuario
            ->with('producto.imagenes') // con los productos de los carritos
            ->get(); // devuelve los carritos
            
            return view('web.carrito', compact('carritos','ajuste')); // devuelve la vista de carrito
    }

    // agrega un producto al carrito
    public function agregar_a_carrito(Request $request) 
    {
       //return response()->json($request->all());
        $request->validate([ // valida los datos del request
            'producto_id' => 'required|exists:productos,id', // valida que el producto existe
            'cantidad' => 'required|integer|min:1', // valida que la cantidad sea mayor o igual a 1
        ]);

        $carrito_existe = Carrito::where('usuario_id', Auth::user()->id) // busca si el carrito existe
            ->where('producto_id', $request->producto_id) // busca si el producto existe en el carrito
            ->first(); // devuelve el carrito si existe

        if($carrito_existe){ // si el carrito existe
            $carrito_existe->cantidad += $request->cantidad; // suma la cantidad del carrito
            $carrito_existe->save(); // guarda el carrito actualizado
        } else {
            Carrito::create([ // si no existe crea el carrito
                'usuario_id' => Auth::user()->id, // el usuario id del usuario
                'producto_id' => $request->producto_id, // el producto id del producto
                'cantidad' => $request->cantidad, // la cantidad del producto
            ]);
            
        }
        return redirect()->route('web.carrito.index') // redirecciona al carrito
            ->with('mensaje', 'Producto agregado al carrito exitosamente') // mensaje de exito
            ->with('icono', 'success');  
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
