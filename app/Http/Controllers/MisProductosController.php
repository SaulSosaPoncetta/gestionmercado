<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MisProductosController extends Controller
{
    // Lista solo los productos del vendedor logueado
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');
        $query = Producto::where('vendedor_id', Auth::id());

        if ($buscar) {
            $query->where(function ($q) use ($buscar) {
                $q->where('nombre', 'like', '%'.$buscar.'%')
                  ->orWhere('codigo', 'like', '%'.$buscar.'%');
            });
        }

        $productos = $query->latest()->paginate(10);
        return view('web.mis_productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('web.mis_productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:50|unique:productos,codigo',
            'descripcion_corta' => 'required|string|max:500',
            'descripcion_larga' => 'required|string',
            'precio_compra' => 'required|numeric|min:0',
            'precio_venta' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->codigo = $request->codigo;
        $producto->descripcion_corta = $request->descripcion_corta;
        $producto->descripcion_larga = $request->descripcion_larga;
        $producto->precio_compra = $request->precio_compra;
        $producto->precio_venta = $request->precio_venta;
        $producto->stock = $request->stock;
        $producto->categoria_id = $request->categoria_id;
        $producto->vendedor_id = Auth::id();
        $producto->save();

        return redirect()->route('web.mis_productos.index')
            ->with('mensaje', 'Producto publicado correctamente')
            ->with('icono', 'success');
    }

    public function edit($id)
    {
        $producto = Producto::where('vendedor_id', Auth::id())->findOrFail($id);
        $categorias = Categoria::all();
        return view('web.mis_productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::where('vendedor_id', Auth::id())->findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:50|unique:productos,codigo,'.$id,
            'descripcion_corta' => 'required|string|max:500',
            'descripcion_larga' => 'required|string',
            'precio_compra' => 'required|numeric|min:0',
            'precio_venta' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $producto->nombre = $request->nombre;
        $producto->codigo = $request->codigo;
        $producto->descripcion_corta = $request->descripcion_corta;
        $producto->descripcion_larga = $request->descripcion_larga;
        $producto->precio_compra = $request->precio_compra;
        $producto->precio_venta = $request->precio_venta;
        $producto->stock = $request->stock;
        $producto->categoria_id = $request->categoria_id;
        $producto->save();

        return redirect()->route('web.mis_productos.index')
            ->with('mensaje', 'Producto actualizado correctamente')
            ->with('icono', 'success');
    }

    public function destroy($id)
    {
        $producto = Producto::where('vendedor_id', Auth::id())->findOrFail($id);
        $producto->delete();

        return redirect()->route('web.mis_productos.index')
            ->with('mensaje', 'Producto eliminado correctamente')
            ->with('icono', 'success');
    }

    // Muestra las imágenes del producto (solo si es del vendedor logueado)
    public function imagenes($id)
    {
        $producto = Producto::with('imagenes')->where('vendedor_id', Auth::id())->findOrFail($id);
        return view('web.mis_productos.imagenes', compact('producto'));
    }

    // Sube una imagen nueva
    public function cargaImagen(Request $request, $id)
    {
        $producto = Producto::where('vendedor_id', Auth::id())->findOrFail($id);

        $request->validate([
            'imagen' => 'required|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
        ]);

        $imagenProducto = new \App\Models\ProductoImagen();
        $imagenProducto->producto_id = $producto->id;
        $rutaGuardarImagen = $request->file('imagen')->store('productos', 'public');
        $imagenProducto->imagen = $rutaGuardarImagen;
        $imagenProducto->save();

        return redirect()->route('web.mis_productos.imagenes', ['id' => $id])
            ->with('mensaje', 'Imagen subida correctamente')
            ->with('icono', 'success');
    }

    // Elimina una imagen (verificando que el producto sea del vendedor logueado)
    public function eliminaImagen($id)
    {
        $imagenProducto = \App\Models\ProductoImagen::findOrFail($id);
        $producto = Producto::where('vendedor_id', Auth::id())->findOrFail($imagenProducto->producto_id);

        if (\Illuminate\Support\Facades\Storage::disk('public')->exists($imagenProducto->imagen)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($imagenProducto->imagen);
        }

        $imagenProducto->delete();

        return redirect()->route('web.mis_productos.imagenes', $producto->id)
            ->with('mensaje', 'Imagen eliminada correctamente')
            ->with('icono', 'success');
    }
}
