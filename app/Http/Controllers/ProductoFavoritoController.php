<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Ajuste;
use App\Models\ProductoFavorito;
use Illuminate\Http\Request;

class ProductoFavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_favoritos()
    {
        $ajuste = Ajuste::first();
        $productoFavoritos = ProductoFavorito::where('usuario_id', Auth::user()->id)
            ->with('producto.imagenes')
            ->get();
            
            return view('web.favoritos', compact('productoFavoritos','ajuste'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_favoritos(Request $request)
    {
        //return response()->json($request->all());
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
        ]);

        if ($productoFavorito = ProductoFavorito::where('usuario_id', Auth::user()->id)
            ->where('producto_id', $request->producto_id)
            ->first()) {
                return redirect()->back()
                    ->with('mensaje', 'Producto ya existente en tus favoritos')
                    ->with('icono', 'info');
            }   
        
        $productoFavorito = new ProductoFavorito();
        $productoFavorito->usuario_id = Auth::user()->id;
        $productoFavorito->producto_id = $request->producto_id;
        
        $productoFavorito->save();

        return redirect()->back()
            ->with('mensaje', 'Producto agregado a favoritos')
            ->with('icono', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show(ProductoFavorito $productoFavorito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductoFavorito $productoFavorito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductoFavorito $productoFavorito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductoFavorito $productoFavorito)
    {
        //
    }
}
