<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(10);

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

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

        echo "Rol guardado";

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
