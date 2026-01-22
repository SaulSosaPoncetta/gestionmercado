<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\ProductoImagen;
use App\Models\Categoria;
use App\Models\Ajuste;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    
    public function index(Request $request)
    {
        $ajuste = Ajuste::first();
        $buscar = $request->get('buscar');
        $query = Producto::query();

        if ($buscar){
            $query->where('nombre', 'like', '%'.$buscar.'%')
                ->orWhere('codigo', 'like', '%'.$buscar.'%')
                ->orWhere('descripcion_corta', 'like', '%'.$buscar.'%')
                ->orWhere('descripcion_larga', 'like', '%'.$buscar.'%');
        }

        $productos = $query->paginate(10);
        return view('admin.productos.index', compact('productos', 'ajuste'));
    }

    //Funcion del controlador para crear un producto
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.productos.create', compact('categorias'));
    }



    //Funcion del controlador para guardar los datos del producto creado o editado
    public function store(Request $request)
    {
       
        //return response()->json($request->all());
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

            $producto = new Producto();// instanciacion de un producto
            
            $producto->nombre = $request->nombre;
            $producto->codigo = $request->codigo;
            $producto->descripcion_corta = $request->descripcion_corta;
            $producto->descripcion_larga = $request->descripcion_larga;
            $producto->precio_compra = $request->precio_compra;
            $producto->precio_venta = $request->precio_venta;
            $producto->stock = $request->stock;
            $producto->categoria_id = $request->categoria_id;

            $producto->save();

            return redirect()->route('admin.productos.index')
            ->with('mensaje', 'Producto creado correctamente')
            ->with('icono', 'success');

    }

    //Funcion del controlador para mostrar un producto por id
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('admin.productos.show', compact('producto'));
    }

    
    //Funcion del controlador para mostrar imagenes de un producto por id
    public function showImagenes($id)
    {
        $producto = Producto::with('imagenes')->findOrFail($id);
        $imagenes = $producto->imagenes()->get();
        return view('admin.productos.imagenes', compact('producto'));
    }

    //Funcion del controlador para subir imagenes
    public function cargaImagen(Request $request, $id)
    {
        $request->validate([
            'imagen' => 'required|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
            ]);
        $producto = Producto::findOrFail($id);

        $imagenProducto = new ProductoImagen();
        $imagenProducto->producto_id = $producto->id;
        $rutaGuardarImagen = $request->file('imagen')->store('productos', 'public');
        $imagenProducto->imagen = $rutaGuardarImagen;

        $imagenProducto->save();

        return redirect()->route('admin.productos.imagenes', ['producto' => $id])
            ->with('mensaje', 'Imagen subida correctamente')
            ->with('icono', 'success');
    }

    //Funcion del controlador para eliminar una imagen de un producto por id
public function eliminaImagen($id)
{
    $imagenProducto = ProductoImagen::findOrFail($id);
    $producto_id = $imagenProducto->producto_id;

    // borrar archivo físico
    if (Storage::disk('public')->exists($imagenProducto->imagen)) {
        Storage::disk('public')->delete($imagenProducto->imagen);
    }

    // borrar registro BD
    $imagenProducto->delete();

    return redirect()
        ->route('admin.productos.imagenes', $producto_id)
        ->with('mensaje', 'Imagen eliminada correctamente')
        ->with('icono', 'success');
}
    //Funcion del controlador para editar un producto por id
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('admin.productos.edit', compact('producto', 'categorias'));

    }

    //Funcion del controlador para actualizar los datos de un producto por id
    public function update(Request $request, $id)
    {
        //return response()->json($request->all());
        $request->validate([
            
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:50|unique:productos,codigo,' .$id,
            'descripcion_corta' => 'required|string|max:500',
            'descripcion_larga' => 'required|string',
            'precio_compra' => 'required|numeric|min:0',
            'precio_venta' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            ]);

            $producto = Producto::findOrFail($id);// instanciacion de un producto
            
            $producto->nombre = $request->nombre;
            $producto->codigo = $request->codigo;
            $producto->descripcion_corta = $request->descripcion_corta;
            $producto->descripcion_larga = $request->descripcion_larga;
            $producto->precio_compra = $request->precio_compra;
            $producto->precio_venta = $request->precio_venta;
            $producto->stock = $request->stock;
            $producto->categoria_id = $request->categoria_id;

            $producto->save();

            return redirect()
                    ->route('admin.productos.index')
                    ->with('mensaje', 'Producto actualizado correctamente')
                    ->with('icono', 'success'); 

    }

    //Funcion del controlador para eliminar un producto por id
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        // eliminar imagenes asociadas
        foreach ($producto->imagenes as $imagen) {
            if ($imagen->imagen && Storage::disk('public')->exists($imagen->imagen)) {
                Storage::disk('public')->delete($imagen->imagen);
            }
            $imagen->delete();
        }

        // eliminar producto
        $producto->delete();

        return redirect()
                ->route('admin.productos.index')
                ->with('mensaje', 'Producto eliminado correctamente')
                ->with('icono', 'success');
    }

    //Funcion del controlador para mostrar detalle de un producto por id en la vista detalle del producto
    public function detalle_producto($id)
    {
        $ajuste = Ajuste::first(); // Obtener el primer registro de ajustes
        $producto = Producto::findOrFail($id); // Buscar el producto por su ID
        return view('web.detalle_producto', compact('ajuste','producto')); // Mostrar la vista web.detalle_producto con el producto y los ajustes
    }
}