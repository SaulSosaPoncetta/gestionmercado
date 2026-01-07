<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])
    ->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class,'index'])
    ->name('admin')->middleware('auth');

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

// Route::middleware('auth')->group(function () {
// Route::resource('admin/roles', App\Http\Controllers\RoleController::class);
// });



