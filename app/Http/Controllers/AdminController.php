<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Orden;

class AdminController extends Controller
{
    public function index()
    {
        $total_roles = Role::count();      // Contar el total de roles
        $total_usuarios = User::whereDoesntHave('roles', function ($query) { // Excluir usuarios con el rol "SUPER ADMIN"
            $query->where('name', 'SUPER ADMIN'); //
        })->count(); // Contar el total de usuarios sin el rol "SUPER ADMIN"
        
        $total_categorias = Categoria::count(); // Contar el total de categorías

        $total_productos = Producto::count(); // Contar el total de productos

        $total_pedidos = Orden::count(); // Contar el total de pedidos nuevos / sin procesar
        $total_pedidos_nuevos = Orden::where('estado_orden', 'Procesando')->count(); // Contar el total de pedidos nuevos
        $total_pedidos_procesados = Orden::where('estado_orden', 'Enviado')->count(); // Contar el total de pedidos procesados
        $total_pedidos_enviados = Orden::where('estado_orden', 'Completado')->count(); // Contar el total de pedidos enviados
        $total_pedidos_entregados = Orden::where('estado_orden', 'Entregado')->count(); // Contar el total de pedidos entregados
        //$total_pedidos = Pedido::count();
        //$total_clientes = Cliente::count();
        //$total_empleados = Empleado::count();

        return view('admin.index', compact('total_roles', // Mostrar el total de roles
                                        'total_usuarios', // Mostrar el total de usuarios sin el rol "SUPER ADMIN"
                                        'total_categorias',  // Mostrar el total de categorías
                                        'total_productos',      // Mostrar el total de productos
                                        'total_pedidos_nuevos',      // Mostrar el total de pedidos nuevos
                                        'total_pedidos_procesados',      // Mostrar el total de pedidos procesados
                                        'total_pedidos_enviados',      // Mostrar el total de pedidos enviados
                                        'total_pedidos_entregados',      // Mostrar el total de pedidos entregados
                                        'total_pedidos',      // Mostrar el total de pedidos
                                        
                                        //'total_clientes',      // Mostrar el total de clientes
                                        //'total_empleados',      // Mostrar el total de empleados  
                                        ));
    }
}
