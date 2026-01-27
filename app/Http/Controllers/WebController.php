<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ajuste;  
use App\Models\Producto;

class WebController extends Controller
{
    public function index()
    {
        $ajuste = Ajuste::first(); // se trae a la variable los datos del primer registro de la tabla ajustes
        $productos = Producto::paginate(4); // se trae a la variable los datos de (all) todos los registros de la tabla productos

        return view('web.index', compact('ajuste', 'productos')); // se envian los datos a la vista web.index con la funcion compact y la variable ajuste y productos
    }

    public function buscar_producto(Request $request)
    {
        // return response()->json($request->all());// prueba para ver los datos que llegan del formulario de busqueda

        $ajuste = Ajuste::first(); // se trae a la variable los datos del primer registro de la tabla ajustes
        $query = $request->input('producto_buscado'); // se obtiene el valor del campo de busqueda 'query' del formulario

        // se realiza la consulta para buscar productos que coincidan con el termino de busqueda en el nombre o descripcion
        $productos = Producto::where('nombre', 'LIKE', "%$query%")
            ->orWhere('descripcion_corta', 'LIKE', "%$query%")
            ->orderBy('nombre', 'ASC') // se ordenan los resultados de la busqueda
            ->paginate(8); // se paginan los resultados de la busqueda

        return view('web.buscar', compact('ajuste', 'productos', 'query')); // se envian los datos a la vista web.index con la funcion compact y la variable ajuste y productos
    }
}
