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
}
