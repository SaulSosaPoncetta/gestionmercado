<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class,'index'])
    ->name('home')
    ->middleware('auth');

Route::get('/admin', [App\Http\Controllers\AdminController::class,'index'])
    ->name('admin')
    ->middleware('auth');

//--------------------------------------AJUSTES----------------------------------------
//Rutas para la vista de ajustes
Route::get('/admin/ajustes', [App\Http\Controllers\AjustesController::class,'index'])
    ->name('admin.ajustes.index')
    ->middleware('auth');
//Rutas para guardar los datos de la vista de ajustes
Route::post('/admin/ajustes/create', [App\Http\Controllers\AjustesController::class,'store'])
    ->name('admin.ajustes.store')
    ->middleware('auth');


//--------------------------------------ROLES----------------------------------------
// Rutas para la vista de roles
Route::get('/admin/roles', [App\Http\Controllers\RoleController::class,'index'])
    ->name('admin.roles.index')
    ->middleware('auth');

// Mostrar formulario
Route::get('/admin/roles/create', [App\Http\Controllers\RoleController::class,'create'])
    ->name('admin.roles.create')
    ->middleware('auth');

// Guardar (POST SIEMPRE va a /admin/roles)
Route::post('/admin/roles', [App\Http\Controllers\RoleController::class,'store'])
    ->name('admin.roles.store')
    ->middleware('auth');

Route::get('/admin/rol/{id}', [App\Http\Controllers\RoleController::class,'show'])
    ->name('admin.roles.show')
    ->middleware('auth');

Route::get('/admin/rol/{id}/edit', [App\Http\Controllers\RoleController::class,'edit'])
    ->name('admin.roles.edit')
    ->middleware('auth');

Route::put('/admin/rol/{id}', [App\Http\Controllers\RoleController::class,'update'])
    ->name('admin.roles.update')
    ->middleware('auth');

Route::delete('/admin/rol/{id}', [App\Http\Controllers\RoleController::class,'destroy'])
    ->name('admin.roles.destroy')
    ->middleware('auth');


//--------------------------------------USUARIOS----------------------------------------

// Rutas para la vista de USUARIOS
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class,'index'])
    ->name('admin.usuarios.index')
    ->middleware('auth');

// Mostrar formulario
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class,'create'])
    ->name('admin.usuarios.create')
    ->middleware('auth');

// Guardar (POST SIEMPRE va a /admin/usuarios)
Route::post('/admin/usuarios', [App\Http\Controllers\UsuarioController::class,'store'])
    ->name('admin.usuarios.store')
    ->middleware('auth');

Route::get('/admin/usuario/{id}', [App\Http\Controllers\UsuarioController::class,'show'])
    ->name('admin.usuarios.show')
    ->middleware('auth');

Route::get('/admin/usuario/{id}/edit', [App\Http\Controllers\UsuarioController::class,'edit'])
    ->name('admin.usuarios.edit')
    ->middleware('auth');

Route::put('/admin/usuario/{id}', [App\Http\Controllers\UsuarioController::class,'update'])
    ->name('admin.usuarios.update')
    ->middleware('auth');

Route::delete('/admin/usuario/{id}', [App\Http\Controllers\UsuarioController::class,'destroy'])
    ->name('admin.usuarios.destroy')
    ->middleware('auth');

Route::post('/admin/usuario/{id}/restaurar', [App\Http\Controllers\UsuarioController::class,'restore'])
    ->name('admin.usuarios.restore')
    ->middleware('auth');

//--------------------------------------CATEGORIAS----------------------------------------

// Guardar (POST SIEMPRE va a /admin/categorias)
Route::get('/admin/categorias', [App\Http\Controllers\CategoriaController::class,'index'])
    ->name('admin.categorias.index')
    ->middleware('auth');
//Ruta para crear una nueva categoria
Route::get('/admin/categorias/create', [App\Http\Controllers\CategoriaController::class,'create'])
    ->name('admin.categorias.create')
    ->middleware('auth');
//Ruta para guardar los datos de la categoria creada o editada
Route::post('/admin/categorias', [App\Http\Controllers\CategoriaController::class,'store'])
    ->name('admin.categorias.store')
    ->middleware('auth');
//Ruta para mostrar los datos de una categoria por id
Route::get('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class,'show'])
    ->name('admin.categorias.show')
    ->middleware('auth');
//Ruta para editar una categoria por id
Route::get('/admin/categorias/{id}/edit', [App\Http\Controllers\CategoriaController::class,'edit'])
    ->name('admin.categorias.edit')
    ->middleware('auth');
//Ruta para actualizar los datos de una categoria por id
Route::put('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class,'update'])
    ->name('admin.categorias.update')
    ->middleware('auth');
//Ruta para eliminar una categoria por id
Route::delete('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class,'destroy'])
    ->name('admin.categorias.destroy')
    ->middleware('auth');
//Ruta para restaurar una categoria por id solo si es soft delete y esta inactiva
Route::post('/admin/categorias/{id}/restaurar', [App\Http\Controllers\CategoriaController::class, 'restore'])
    ->name('admin.categorias.restore')
    ->middleware('auth');




// Route::middleware('auth')->group(function () {
// Route::resource('admin/roles', App\Http\Controllers\RoleController::class);
// });



