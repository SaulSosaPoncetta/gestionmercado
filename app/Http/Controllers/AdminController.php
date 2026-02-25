<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        // ----------------------------------------   Datos para graficos ----------------------------------------
        // Usuarios registrados por mes
        $usuarios_mensuales = User::select(
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('mes')
        ->orderBy('mes', 'asc')
        ->get()
        ->toArray();

        $usuarios_datos = array_fill(1,12,0);
        foreach ($usuarios_mensuales as $datos) {
            $usuarios_datos[$datos['mes']] = $datos['total'];
        }
        //print_r($usuarios_datos); // Verificar los datos obtenidos
        //die(); // Detener la ejecución para revisar los datos

        // Pedidos registrados por mes
        $pedidos_mensuales = Orden::select(
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('SUM(total) as total_monto')
        )
        ->groupBy('mes')
        ->orderBy('mes', 'asc')
        ->get()
        ->toArray();

        $pedidos_datos = array_fill(1,12,0);
        foreach ($pedidos_mensuales as $datos) {
            $pedidos_datos[$datos['mes']] = $datos['total_monto'];
        }

        //print_r($pedidos_datos); // Verificar los datos obtenidos
        //die(); // Detener la ejecución para revisar los datos
        
        // Limites stock
        $limiteStockMin = 10; // Definir el límite de stock bajo
        $limiteStockMax = 30; // Definir el límite de stock alto

        $stockBajo = Producto::where('stock', '<', $limiteStockMin)->count(); // Contar el total de productos con stock bajo
        $stockMax = Producto::where('stock', '>', $limiteStockMax)->count(); // Contar el total de productos con stock exceso

        // Porcentajes de stock maximo y minimo del total de productos
        $stockBajoPorcentaje = round(($stockBajo / $total_productos) * 100, 2); // Calcular el porcentaje de productos con stock bajo
        $stockMaxPorcentaje = round(($stockMax / $total_productos) * 100, 2); // Calcular el porcentaje de productos con stock exceso


        // Distribución de pedidos por categoría
        $categorias = Orden::select(
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('SUM(total) as total_monto')
        )
        ->groupBy('mes')
        ->orderBy('mes', 'asc')
        ->get()
        ->toArray();

        $categorias_datos = array_fill(1,12,0);
        foreach ($categorias as $datos) {
            $categorias_datos[$datos['mes']] = $datos['total_monto'];
        }

        //print_r($pedidos_datos); // Verificar los datos obtenidos
        //die(); // Detener la ejecución para revisar los datos
        return view('admin.index', compact('total_roles', // Mostrar el total de roles
                                        'total_usuarios', // Mostrar el total de usuarios sin el rol "SUPER ADMIN"
                                        'total_categorias',  // Mostrar el total de categorías
                                        'total_productos',      // Mostrar el total de productos
                                        'total_pedidos_nuevos',      // Mostrar el total de pedidos nuevos
                                        'total_pedidos_procesados',      // Mostrar el total de pedidos procesados
                                        'total_pedidos_enviados',      // Mostrar el total de pedidos enviados
                                        'total_pedidos_entregados',      // Mostrar el total de pedidos entregados
                                        'total_pedidos',      // Mostrar el total de pedidos
                                        'usuarios_datos',      // Datos para el gráfico de usuarios registrados por mes
                                        'pedidos_datos',      // Datos para el gráfico de pedidos registrados por mes
                                        'categorias_datos',      // Datos para el gráfico de distribución de pedidos por categoría
                                        'stockBajo',      // Total de productos con stock bajo
                                        'stockMax',      // Total de productos con stock exceso
                                        'stockBajoPorcentaje',      // Porcentaje de productos con stock bajo
                                        'stockMaxPorcentaje',      // Porcentaje de productos con stock exceso


                                        //'total_clientes',      // Mostrar el total de clientes
                                        //'total_empleados',      // Mostrar el total de empleados  
                                        ));
    }
}
