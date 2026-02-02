<?php

namespace App\Http\Controllers; // namespace de la clase

use Illuminate\Support\Facades\Auth; // fachada para el Auth
use App\Models\Ajuste; // modelo de ajustes
use App\Models\ProductoFavorito; // modelo de producto favorito
use Illuminate\Http\Request; // clase para el request

class ProductoFavoritoController extends Controller // clase para el controlador
{

    public function index_favoritos() // el metodo index debe recibir el id del producto favorito
    {
        if(Auth::guest()){ // si el usuario no esta logeado
            return redirect()->route('web.authloginweb') // redirecciona al login
            ->with('mensaje', 'Debes estar logeado para acceder afavoritos') // muestra un mensaje de error
            ->with('icono', 'warning'); // indica que el usuario no esta logeado
        }
        $ajuste = Ajuste::first(); // recupera el primer registro de la tabla ajustes
        $productoFavoritos = ProductoFavorito::where('usuario_id', Auth::user()->id) // recupera todos los productos favoritos del usuario
            ->with('producto.imagenes') // recupera las imagenes del producto
            ->get(); // devuelve el producto favorito
            
            return view('web.favoritos', compact('productoFavoritos','ajuste')); // muestra la vista de favoritos
    }


    public function create() // el metodo create debe recibir el id del producto favorito
    {
        //
    }


    public function store_favoritos(Request $request) // el metodo store debe recibir el id del producto favorito
    {
        //return response()->json($request->all());
        $request->validate([ // valida que el producto existe 
            'producto_id' => 'required|exists:productos,id', 
        ]);

        if($productoFavorito = ProductoFavorito::where('usuario_id', Auth::user()->id)
            ->where('producto_id', $request->producto_id)->first()){
                return redirect()->back() // redirecciona al usuario a la pagina de favoritos
                    ->with('mensaje', 'Producto ya esta en tusfavoritos') // muestra un mensaje de error
                    ->with('icono', 'warning'); // indica que el producto ya esta en favoritos
        }
        
        $productoFavorito = new ProductoFavorito(); // crea un producto favorito
        $productoFavorito->usuario_id = Auth::user()->id; // asigna el usuario al producto favorito
        $productoFavorito->producto_id = $request->producto_id; // asigna el producto al producto favorito
        
        $productoFavorito->save(); // guarda el producto favorito

        return redirect()->back() // redirecciona al usuario a la pagina de favoritos
            ->with('mensaje', 'Producto agregado a favoritos') // muestra un mensaje de exito
            ->with('icono', 'success'); // indica que el producto se ha agregado correctamente

    }

    public function show(ProductoFavorito $productoFavorito)
    {
        //
    }

    public function edit(ProductoFavorito $productoFavorito)
    {
        //
    }

    public function update(Request $request, ProductoFavorito $productoFavorito)
    {
        //
    }

    public function destroy_favoritos($id) // el metodo destroy debe recibir el id del producto favorito
    {
        $productoFavorito = ProductoFavorito::find($id); // recupera el producto favorito
            if(!$productoFavorito){
                return redirect()->back() // redirecciona al usuario a la pagina de favoritos
                    ->with('mensaje', 'Producto no encontrado')
                    ->with('icono', 'error'); // indica que el producto no se ha encontrado
            }
        
        $productoFavorito->delete(); // elimina el producto favorito

        return redirect()->back() // redirecciona al usuario a la pagina de favoritos
            ->with('mensaje', 'Producto eliminado de favoritos') // muestra un mensaje de exito
            ->with('icono', 'success'); // indica que el producto se ha eliminado correctamente
    }
}
