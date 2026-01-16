<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');
        $query = Producto::query();

        if ($buscar){
            $query->where('nombre', 'like', '%'.$buscar.'%')
                ->orWhere('codigo', 'like', '%'.$buscar.'%')
                ->orWhere('descripcion_corta', 'like', '%'.$buscar.'%')
                ->orWhere('descripcion_larga', 'like', '%'.$buscar.'%');
        }

        $productos = $query->paginate(10);
        return view('admin.productos.index', compact('productos'));
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
            'categoria_id' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:50|unique:productos,codigo',
            'descripcion_corta' => 'required|string|max:500',
            'descripcion_larga' => 'required|string',
            'precio_compra' => 'required|numeric|min:0',
            'precio_venta' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            ]);

            $producto = new Producto();// instanciacion de un producto
            $producto->categoria_id = $request->categoria_id;
            $producto->nombre = $request->nombre;
            $producto->codigo = $request->codigo;
            $producto->descripcion_corta = $request->descripcion_corta;
            $producto->descripcion_larga = $request->descripcion_larga;
            $producto->precio_compra = $request->precio_compra;
            $producto->precio_venta = $request->precio_venta;
            $producto->stock = $request->stock;

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
    
    public function imagenes($id)
    {
        $producto = Producto::findOrFail($id);
        $imagenes = $producto->imagenes()->get();
        return view('admin.productos.showImagenes', compact('producto', 'imagenes'));
    }

    //Funcion del controlador para editar un producto por id
    public function edit(Producto $producto)
    {
        //
    }

    //Funcion del controlador para actualizar los datos de un producto por id
    public function update(Request $request, Producto $producto)
    {
        //
    }

    //Funcion del controlador para eliminar un producto por id
    public function destroy(Producto $producto)
    {
        //
    }
}
