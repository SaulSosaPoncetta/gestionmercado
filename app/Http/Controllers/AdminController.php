<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Categoria;
//use App\Models\Producto;
//use App\Models\Pedido;
//use App\Models\Cliente;
//use App\Models\Empleado;

class AdminController extends Controller
{
    public function index()
    {
        $total_roles = Role::count();

        $total_usuarios = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'SUPER ADMIN');
        })->count();
        
        $total_categorias = Categoria::count();

        //$total_productos = Producto::count();
        //$total_pedidos = Pedido::count();
        //$total_clientes = Cliente::count();
        //$total_empleados = Empleado::count();

        return view('admin.index', compact('total_roles', 'total_usuarios', 'total_categorias'));
    }
}
