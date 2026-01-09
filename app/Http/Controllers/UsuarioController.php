<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UsuarioController extends Controller
{
    // Muestra la lista de usuarios
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');
        $query = User::whereDoesntHave('roles', function($q) {
            $q->where('name', 'SUPER ADMIN');
        })->withTrashed();

        if($buscar){
            $query->where('name', 'like', '%'.$buscar.'%')
                ->orWhere('email', 'like', '%'.$buscar.'%');
        }

        $usuarios = $query->paginate(10);
        return view('admin.usuarios.index', compact('usuarios'));
    }

    // Muestra el formulario para crear un nuevo usuario
    public function create()
    {
        $roles = Role::all();
        return view('admin.usuarios.create', compact('roles'));
    }

    // Guarda los datos del nuevo usuario
    public function store(Request $request)
    {
       //return response()->json($request->all());
       $request->validate([
            'rol' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:9|confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->save();   

        $usuario->assignRole($request->rol);

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje','Usuario creado exitosamente')
            ->with('icono','success');
    }

    // Muestra los datos de un usuario
    public function show($id)
    {
        $usuario = User::withTrashed()->findOrFail($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    // Muestra el formulario y trae los datos para editar un usuario
    public function edit($id)
    {
        $usuario = User::withTrashed()->findOrFail($id);
        $roles = Role::all();
        return view('admin.usuarios.edit', compact('usuario', 'roles'));
    }

    // Actualiza los datos del usuario tomando los mismos del form ulario edit
    public function update(Request $request, $id)
    {
        //return response()->json($request->all());
        $request->validate([
            'rol' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:9|confirmed',
        ]);
        $usuario = User::withTrashed()->findOrFail($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        if($request->password){
            $usuario->password = bcrypt($request->password);
        }
        
        $usuario->save();
        
        $usuario->syncRoles($request->rol);

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje','Usuario actualizado exitosamente')
            ->with('icono','success');
    }
    // Elimina un usuario
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->estado = false;
        $usuario->save();
        $usuario->delete();

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje','Usuario eliminado exitosamente')
            ->with('icono','success');
    }

    // Restaura un usuario (activa)
    public function restore($id)
    {
        $usuario = User::onlyTrashed()->findOrFail($id);
        $usuario->restore();
        $usuario->estado = true;
        $usuario->save();
       
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje','Usuario restaurado exitosamente')
            ->with('icono','success');
    }
}
