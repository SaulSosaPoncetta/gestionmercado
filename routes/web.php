<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\WebController;



Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', [App\Http\Controllers\AdminController::class,'index'])
       ->name('home')
       ->middleware('auth');

Route::get('/admin', [App\Http\Controllers\AdminController::class,'index'])
    ->name('admin')
    ->middleware('auth');

//-------------------------------------- RUTAS PARA AJUSTES -------------------------------------
//Rutas para la vista de ajustes
Route::get('/admin/ajustes', [App\Http\Controllers\AjustesController::class,'index'])
    ->name('admin.ajustes.index')
    ->middleware('auth');
//Rutas para guardar los datos de la vista de ajustes
Route::post('/admin/ajustes/create', [App\Http\Controllers\AjustesController::class,'store'])
    ->name('admin.ajustes.store')
    ->middleware('auth');


//-------------------------------------- RUTAS PARA ROLES -------------------------------------
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


//-------------------------------------- RUTAS PARA USUARIOS -------------------------------------

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

//-------------------------------------- RUTAS PARA CATEGORIAS -------------------------------------

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

//-------------------------------------- RUTAS PARA PRODUCTOS -------------------------------------
// Listar productos
Route::get('/admin/productos', [App\Http\Controllers\ProductoController::class,'index'])
    ->name('admin.productos.index')
    ->middleware('auth');
// Crear producto
Route::get('/admin/productos/create', [App\Http\Controllers\ProductoController::class,'create'])
    ->name('admin.productos.create')
    ->middleware('auth');
// Guardar producto
Route::post('/admin/productos/create', [App\Http\Controllers\ProductoController::class,'store'])
    ->name('admin.productos.store')
    ->middleware('auth');
// EDITAR → SIEMPRE ANTES DE {id}
Route::get('/admin/productos/{id}/edit', [App\Http\Controllers\ProductoController::class,'edit'])
    ->name('admin.productos.edit')
    ->middleware('auth');
// MOSTRAR → SIEMPRE DESPUÉS
Route::get('/admin/productos/{id}', [App\Http\Controllers\ProductoController::class,'show'])
    ->name('admin.productos.show')
    ->middleware('auth');
// Actualizar producto
Route::put('/admin/productos/{id}', [App\Http\Controllers\ProductoController::class,'update'])
    ->name('admin.productos.update')
    ->middleware('auth');
// Eliminar producto
Route::delete('/admin/productos/{id}', [App\Http\Controllers\ProductoController::class,'destroy'])
    ->name('admin.productos.destroy')
    ->middleware('auth');


//--------------------------------------IMAGENES PRODUCTOS----------------------------------------
//Ruta para mostrar imagenes de un producto por id
Route::get('/admin/productos/{producto}/imagenes', [App\Http\Controllers\ProductoController::class, 'showImagenes'])
    ->name('admin.productos.imagenes')
    ->middleware('auth');
//Ruta para subir imagenes
Route::post('/admin/productos/{producto}/uploadimagen', [App\Http\Controllers\ProductoController::class, 'cargaImagen'])
    ->name('admin.productos.uploadimagen')
    ->middleware('auth');
//Ruta para eliminar imagen
Route::delete('/admin/productos/imagen/{imagen}/eliminaimagen', [App\Http\Controllers\ProductoController::class, 'eliminaImagen'])
    ->name('admin.productos.eliminaimagen')
    ->middleware('auth');





//////////////////////////////////////////// RUTAS PARA LA WEB //////////////////////////////////
//------------------------ RUTAS PARA PAGINA DE INICIO O HOME-----------------------------
Route::get('/', [App\Http\Controllers\WebController::class,'index'])->name('web.index');

//------------------------ RUTAS PARA DETALLE PRODUCTO------------------------------------
Route::get('/producto/{id}', [App\Http\Controllers\ProductoController::class,'detalle_producto'])->name('web.detalle_producto');

//------------------------ RUTAS PARA DASHBOARD----------------------------------------------
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'index'])->name('web.dashboard');

//------------------------ RUTAS PARA CARRITO-------------------------------------------------
// Route::metodo('direccion de la ruta', [controlador::class,'nombre de la funcion en controller'])->name('nombre de la ruta con la que se la llama');
// Ruta para mostrar el carrito
Route::get('/carrito', [App\Http\Controllers\CarritoController::class,'index_carrito'])->name('web.carrito.index');
// Ruta para agregar un producto al carrito
Route::post('/carrito/agregar', [App\Http\Controllers\CarritoController::class,'agregar_a_carrito'])->name('web.carrito.agregar');
// Ruta para actualizar el cantidad de un producto en el carrito
Route::put('/carrito/actualizar_cantidad', [App\Http\Controllers\CarritoController::class,'actualizar_cantidad'])->name('web.carrito.actualizar');
// Ruta para eliminar un producto del carrito
Route::delete('/carrito/{id}', [App\Http\Controllers\CarritoController::class,'eliminar_del_carrito'])->name('web.carrito.eliminar');
// Ruta para vaciar todos los productos del carrito
Route::post('/carrito/vaciar', [App\Http\Controllers\CarritoController::class,'vaciar_carrito'])->name('web.carrito.vaciar');





//------------------------ RUTAS PARA LOGIN-------------------------------------------------
// Muestra formulario de login
Route::get('/authloginweb', [App\Http\Controllers\WebController::class,'loginweb'])->name('web.authloginweb'); 
// Procesa el login
Route::post('/authloginweb', [App\Http\Controllers\WebController::class,'autenticacion'])->name('web.autenticacion');   

//------------------------ RUTAS PARA REGISTRO-----------------------------------------------
//Mostrar formulario de registro    
Route::get('/authregistronweb', [App\Http\Controllers\DashboardController::class,'authregistroweb'])->name('web.authregistroweb'); 
//Guarda datos del registro
Route::post('/authregistronweb', [App\Http\Controllers\DashboardController::class,'crearcuenta'])->name('web.crearcuenta');

//------------------------ RUTAS PARA MISVENTAS--------------------------------------------
Route::get('/misventas', [App\Http\Controllers\DashboardController::class,'misventas'])->name('web.misventas');
    


//------------------------ RUTA PARA BARRA DE BUSQUEDA-----------------------------------------
Route::get('/buscar', [App\Http\Controllers\WebController::class,'buscar_producto'])->name('web.buscar');

//------------------------ RUTAS PARA FAVORITOS ------------------------------------
//Rutas para mostrar los productos favoritos del usuario
Route::get('/favoritos', [App\Http\Controllers\ProductoFavoritoController::class,'index_favoritos'])->name('web.favoritos.index');
//Rutas para guardar los productos favoritos del usuario
Route::post('/favoritos/store', [App\Http\Controllers\ProductoFavoritoController::class,'store_favoritos'])->name('web.favoritos.store');
//Rutas para eliminar los productos favoritos del usuario
Route::delete('/favoritos/{id}', [App\Http\Controllers\ProductoFavoritoController::class,'destroy_favoritos'])->name('web.favoritos.destroy');

//-------------------------RUTAS PARA PASARELAS DE PAGOS--------------------------------
//-------------------------         PAYPAL          ------------------------------------
// realiza el pago con paypal
Route::post('/paypal/pago', [App\Http\Controllers\PayPalController::class,'pago'])->name('web.paypal.paypalpago');
// procesa el pago con paypal
Route::get('/paypal/gracias', [App\Http\Controllers\PayPalController::class,'gracias'])->name('web.paypal.paypalgracias');
// completa y guarda la orden en la base de datos
Route::get('/paypal/orden_completada/{id}', [App\Http\Controllers\PayPalController::class,'orden_completada'])->name('web.paypal.ordencompletada');
// cancela el pago con paypal
Route::get('/paypal/cancelar', [App\Http\Controllers\PayPalController::class,'cancelar_pago'])->name('web.paypal.paypalcancelar_pago');


//-------------------------         MERCADOPAGO          ------------------------------------





//-------------------------         CUENTADNI          ------------------------------------







//--------------------------------------FALLBACK --- RUTAS PARA PAGINAS DE ERROR -------------------------------------
Route::fallback(function () {
    if (request()->is('admin*')) {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        return response()->view('404', [], 404);
    }

    return response()->view('404-admin', [], 404);
});


// Route::middleware('auth')->group(function () {
// Route::resource('admin/roles', App\Http\Controllers\RoleController::class);
// });



