<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // Funcion para mostrar la lista de roles
    public function index()
    {
        $roles = Role::paginate(10);

        return view('admin.roles.index', compact('roles'));
    }

    // Funcion para crear un rol
    public function create()
    {
        return view('admin.roles.create');
    }

    // Funcion para ver los permisos de un rol
    public function permisos($id)
    {
        $rol = Role::find($id);
        $permisos = Permission::all()->groupBy(function($permiso) {
            if(stripos($permiso->name, 'admin') !== false) { return 'Ajustes del Administrador:'; }
            if(stripos($permiso->name, 'ajuste') !== false) { return 'Ajustes del Sistema:'; }
            if(stripos($permiso->name, 'rol') !== false) { return 'Gestion de Roles:'; }
            if(stripos($permiso->name, 'permiso') !== false) { return 'Gestion de Permisos:'; }
            if(stripos($permiso->name, 'usuario') !== false) { return 'Gestion de Usuarios:'; }
            if(stripos($permiso->name, 'categoria') !== false) { return 'Gestion de Categorias:'; }
            if(stripos($permiso->name, 'producto') !== false) { return 'Gestion de Productos:'; }
            if(stripos($permiso->name, 'pedido') !== false) { return 'Gestion de Pedidos:'; }
        });
        return view('admin.roles.permisos', compact('rol', 'permisos'));
    }

    // Funcion para actualizar los permisos de un rol
public function actualizar_permisos(Request $request, $id)
{
    $rol = Role::findOrFail($id);

    // Si no viene nada, enviar array vacío
    $permisosIds = $request->permisos ?? [];

    $permisos = Permission::whereIn('id', $permisosIds)->get();

    $rol->syncPermissions($permisos);

    return redirect()->route('admin.roles.index')
        ->with('mensaje', 'Permisos actualizados correctamente')
        ->with('icono', 'success');
}

    // Funcion para guardar un rol
    public function store(Request $request)
    {
        //return redirect()->route('admin.roles.index');
        //return response()->json($request->all());

        //guardar rol
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        $rol = new Role();
        $rol->name = strtoupper($request->name);

        $rol->guard_name = 'web';
        $rol->save();

        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'Rol creado correctamente')
        ->with('icono', 'success');
    }

    // Funcion para mostrar un rol
    public function show(string $id)
    {
        $rol = Role::find($id);
       // return response()->json($rol);
        return view('admin.roles.show', compact('rol'));
    }

    // Funcion para editar un rol
    public function edit(string $id)
    {
        $rol = Role::find($id);
        return view('admin.roles.edit', compact('rol'));
    }

    // Funcion para actualizar un rol   
    public function update(Request $request, string $id)
    {
        $request->validate([
        'name' => 'required|string|max:255|unique:roles,name,'.$id,
    ]);

    $rol = Role::findOrFail($id);

    $rol->name = strtoupper($request->name);
    $rol->save();

    return redirect()->route('admin.roles.index')
        ->with('mensaje', 'Rol actualizado correctamente')
        ->with('icono', 'success');
    }

   //
    public function destroy(string $id)
    {
        $rol = Role::find($id);
        $rol->delete();

    return redirect()->route('admin.roles.index')
        ->with('mensaje', 'Rol eliminado correctamente')
        ->with('icono', 'success');
    }
}
