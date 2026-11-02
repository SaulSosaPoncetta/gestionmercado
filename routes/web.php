<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\WebController;



Auth::routes();

// La landing vive en la raíz; si ya hay sesión, LandingController@index redirige al sistema
Route::get('/', [App\Http\Controllers\LandingController::class, 'index'])->name('landing.index');
Route::get('/landing', fn () => redirect()->route('landing.index'));

//-------------------------------------- RUTAS PARA HOME -------------------------------------
//Rutas para la vista de home
Route::get('/home', [App\Http\Controllers\AdminController::class,'index'])
       ->name('home')
       ->middleware('auth', 'can:Ver dashboard de admin');
//Rutas para la vista de home admin
Route::get('/admin', [App\Http\Controllers\AdminController::class,'index'])
    ->name('admin')
    ->middleware('auth', 'can:Ver dashboard de admin');

//-------------------------------------- RUTAS PARA AJUSTES -------------------------------------
//Rutas para la vista de ajustes
Route::get('/admin/ajustes', [App\Http\Controllers\AjustesController::class,'index'])
    ->name('admin.ajustes.index')
    ->middleware('auth', 'can:Ver ajustes del sistema');
//Rutas para guardar los datos de la vista de ajustes
Route::post('/admin/ajustes/create', [App\Http\Controllers\AjustesController::class,'store'])
    ->name('admin.ajustes.store')
    ->middleware('auth' , 'can:Actualizar ajustes del sistema');


//-------------------------------------- RUTAS PARA ROLES -------------------------------------
// Rutas para la vista de roles
Route::get('/admin/roles', [App\Http\Controllers\RoleController::class,'index'])
    ->name('admin.roles.index')
    ->middleware('auth', 'can:Ver listado de roles');

// Mostrar formulario
Route::get('/admin/roles/create', [App\Http\Controllers\RoleController::class,'create'])
    ->name('admin.roles.create')
    ->middleware('auth' , 'can:Crear roles');

// Guardar (POST SIEMPRE va a /admin/roles)
Route::post('/admin/roles', [App\Http\Controllers\RoleController::class,'store'])
    ->name('admin.roles.store')
    ->middleware('auth', 'can:Guardar roles');

Route::get('/admin/rol/{id}', [App\Http\Controllers\RoleController::class,'show'])
    ->name('admin.roles.show')
    ->middleware('auth', 'can:Ver rol');

Route::get('/admin/rol/{id}/edit', [App\Http\Controllers\RoleController::class,'edit'])
    ->name('admin.roles.edit')
    ->middleware('auth' , 'can:Editar roles');

Route::put('/admin/rol/{id}', [App\Http\Controllers\RoleController::class,'update'])
    ->name('admin.roles.update')
    ->middleware('auth' , 'can:Actualizar roles');

Route::delete('/admin/rol/{id}', [App\Http\Controllers\RoleController::class,'destroy'])
    ->name('admin.roles.destroy')
    ->middleware('auth', 'can:Eliminar roles');

//-------------------------------- RUTAS PARA PERMISOS -------------------------------------
//Rutas para la vista de permisos
Route::get('/admin/rol/{id}/permisos', [App\Http\Controllers\RoleController::class,'permisos'])
    ->name('admin.roles.permisos')
    ->middleware('auth', 'can:Ver listado de permisos');
//Rutas para guardar los datos de la vista de permisos
Route::put('/admin/rol/{id}/actualizar_permisos', [App\Http\Controllers\RoleController::class,'actualizar_permisos'])
    ->name('admin.roles.actualizar_permisos')
    ->middleware('auth', 'can:Actualizar permisos');

//-------------------------------------- RUTAS PARA USUARIOS -------------------------------------
// Rutas para la vista de USUARIOS
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class,'index'])
    ->name('admin.usuarios.index')
    ->middleware('auth' , 'can:Ver listado de usuarios');
// Mostrar formulario
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class,'create'])
    ->name('admin.usuarios.create')
    ->middleware('auth' , 'can:Crear usuarios');
// Guardar (POST SIEMPRE va a /admin/usuarios)
Route::post('/admin/usuarios', [App\Http\Controllers\UsuarioController::class,'store'])
    ->name('admin.usuarios.store')
    ->middleware('auth' , 'can:Guardar usuarios');
// Mostrar usuario
Route::get('/admin/usuario/{id}', [App\Http\Controllers\UsuarioController::class,'show'])
    ->name('admin.usuarios.show')
    ->middleware('auth' , 'can:Ver usuario');
// Editar usuario
Route::get('/admin/usuario/{id}/edit', [App\Http\Controllers\UsuarioController::class,'edit'])
    ->name('admin.usuarios.edit')
    ->middleware('auth' , 'can:Editar usuarios');
// Actualizar usuario
Route::put('/admin/usuario/{id}', [App\Http\Controllers\UsuarioController::class,'update'])
    ->name('admin.usuarios.update')
    ->middleware('auth' , 'can:Actualizar usuarios');
// Eliminar usuario
Route::delete('/admin/usuario/{id}', [App\Http\Controllers\UsuarioController::class,'destroy'])
    ->name('admin.usuarios.destroy')
    ->middleware('auth' , 'can:Eliminar usuarios');
// Restaurar usuario
Route::post('/admin/usuario/{id}/restaurar', [App\Http\Controllers\UsuarioController::class,'restore'])
    ->name('admin.usuarios.restore')
    ->middleware('auth', 'can:Restaurar usuarios');

// Perfil usuario
Route::get('/admin/usuario/{id}/perfil', [App\Http\Controllers\UsuarioController::class,'perfil'])
    ->name('admin.usuarios.perfil')
    ->middleware('auth', 'can:Ver perfil de usuario');

// Actualizar perfil usuario
Route::put('/admin/usuario/{id}/actualizar_perfil', [App\Http\Controllers\UsuarioController::class,'actualizar_perfil'])
    ->name('admin.usuarios.actualizar_perfil')
    ->middleware('auth', 'can:Actualizar perfil de usuario');

// Perfil usuario
Route::get('/admin/usuario/{id}/seguridad', [App\Http\Controllers\UsuarioController::class,'seguridad'])
    ->name('admin.usuarios.seguridad')
    ->middleware('auth', 'can:Ver seguridad de usuario');

    // Actualizar seguridad usuario
Route::put('/admin/usuario/{id}/actualizar_seguridad', [App\Http\Controllers\UsuarioController::class,'actualizar_seguridad'])
    ->name('admin.usuarios.actualizar_seguridad')
    ->middleware('auth', 'can:Actualizar seguridad de usuario');    

//-------------------------------------- RUTAS PARA CATEGORIAS -------------------------------------

// Guardar (POST SIEMPRE va a /admin/categorias)
Route::get('/admin/categorias', [App\Http\Controllers\CategoriaController::class,'index'])
    ->name('admin.categorias.index')
    ->middleware('auth' , 'can:Ver listado de categorias');
//Ruta para crear una nueva categoria
Route::get('/admin/categorias/create', [App\Http\Controllers\CategoriaController::class,'create'])
    ->name('admin.categorias.create')
    ->middleware('auth' , 'can:Crear categorias');
//Ruta para guardar los datos de la categoria creada o editada
Route::post('/admin/categorias', [App\Http\Controllers\CategoriaController::class,'store'])
    ->name('admin.categorias.store')
    ->middleware('auth', 'can:Guardar categorias');
//Ruta para mostrar los datos de una categoria por id
Route::get('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class,'show'])
    ->name('admin.categorias.show')
    ->middleware('auth' , 'can:Ver categoria');
//Ruta para editar una categoria por id
Route::get('/admin/categorias/{id}/edit', [App\Http\Controllers\CategoriaController::class,'edit'])
    ->name('admin.categorias.edit')
    ->middleware('auth', 'can:Editar categorias');
//Ruta para actualizar los datos de una categoria por id
Route::put('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class,'update'])
    ->name('admin.categorias.update')
    ->middleware('auth', 'can:Actualizar categorias');
//Ruta para eliminar una categoria por id
Route::delete('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class,'destroy'])
    ->name('admin.categorias.destroy')
    ->middleware('auth', 'can:Eliminar categorias');
//Ruta para restaurar una categoria por id solo si es soft delete y esta inactiva
Route::post('/admin/categorias/{id}/restaurar', [App\Http\Controllers\CategoriaController::class, 'restore'])
    ->name('admin.categorias.restore')
    ->middleware('auth');

//-------------------------------------- RUTAS PARA PRODUCTOS -------------------------------------
// Listar productos
Route::get('/admin/productos', [App\Http\Controllers\ProductoController::class,'index'])
    ->name('admin.productos.index')
    ->middleware('auth' , 'can:Ver listado de productos');
// Crear producto
Route::get('/admin/productos/create', [App\Http\Controllers\ProductoController::class,'create'])
    ->name('admin.productos.create')
    ->middleware('auth' , 'can:Crear productos');
// Guardar producto
Route::post('/admin/productos/create', [App\Http\Controllers\ProductoController::class,'store'])
    ->name('admin.productos.store')
    ->middleware('auth', 'can:Guardar productos');
// EDITAR → SIEMPRE ANTES DE {id}
Route::get('/admin/productos/{id}/edit', [App\Http\Controllers\ProductoController::class,'edit'])
    ->name('admin.productos.edit')
    ->middleware('auth' , 'can:Editar productos');
// MOSTRAR → SIEMPRE DESPUÉS
Route::get('/admin/productos/{id}', [App\Http\Controllers\ProductoController::class,'show'])
    ->name('admin.productos.show')
    ->middleware('auth' , 'can:Ver producto');
// Actualizar producto
Route::put('/admin/productos/{id}', [App\Http\Controllers\ProductoController::class,'update'])
    ->name('admin.productos.update')
    ->middleware('auth', 'can:Actualizar productos');
// Eliminar producto
Route::delete('/admin/productos/{id}', [App\Http\Controllers\ProductoController::class,'destroy'])
    ->name('admin.productos.destroy')
    ->middleware('auth');

//--------------------------------------IMAGENES PRODUCTOS----------------------------------------
//Ruta para mostrar imagenes de un producto por id
Route::get('/admin/productos/{producto}/imagenes', [App\Http\Controllers\ProductoController::class, 'showImagenes'])
    ->name('admin.productos.imagenes')
    ->middleware('auth' , 'can:Ver imagenes de productos');
//Ruta para subir imagenes
Route::post('/admin/productos/{producto}/uploadimagen', [App\Http\Controllers\ProductoController::class, 'cargaImagen'])
    ->name('admin.productos.uploadimagen')
    ->middleware('auth', 'can:Subir imagenes de productos');
//Ruta para eliminar imagen
Route::delete('/admin/productos/imagen/{imagen}/eliminaimagen', [App\Http\Controllers\ProductoController::class, 'eliminaImagen'])
    ->name('admin.productos.eliminaimagen')
    ->middleware('auth', 'can:Eliminar imagenes de productos');

//-------------------------------------- RUTAS PARA PEDIDOS/ORDENES -------------------------------------
// Rutas para la vista de pedidos
Route::get('/admin/pedidos', [App\Http\Controllers\OrdenController::class,'ordenes_index'])->name('admin.pedidos.index')->middleware('auth' , 'can:Ver listado de pedidos');
// Rutas para crear un nuevo pedido
Route::get('/admin/pedidos/{id}', [App\Http\Controllers\OrdenController::class,'ordenes_create_envio'])->name('admin.pedidos.create_envio' )->middleware('auth' , 'can:Crear Pedido');
// Rutas para guardar los datos del pedido
Route::post('/admin/pedidos/{id}', [App\Http\Controllers\OrdenController::class,'store'])->name('admin.pedidos.store')->middleware('auth' , 'can:Procesar pedido');



//////////////////////////////////////////// RUTAS PARA LA WEB //////////////////////////////////
//------------------------ RUTAS PARA PAGINA DE INICIO O HOME-----------------------------
// La tienda pública vive en /tienda (el nombre de ruta web.index se mantiene)
Route::get('/tienda', [App\Http\Controllers\WebController::class,'index'])->name('web.index');

//------------------------ RUTAS PARA DETALLE PRODUCTO------------------------------------
Route::get('/producto/{id}', [App\Http\Controllers\ProductoController::class,'detalle_producto'])->name('web.detalle_producto');

//------------------------ RUTAS PARA DASHBOARD----------------------------------------------
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,'index'])->name('web.dashboard');

//------------------------ RUTAS PARA MIS ajustes--------------------------------------------
// Ruta que trae mis ajustes del usuario logueado
Route::get('/ajustes', [App\Http\Controllers\DashboardController::class,'ajustes'])->name('web.ajustes');
// Ruta que actualiza la informacion personal del usuario logueado
Route::put('/ajustes/informacion_personal', [App\Http\Controllers\DashboardController::class,'informacion_personal'])->name('web.ajustes.informacion_personal');
// Ruta que actualiza la contraseña del usuario logueado
Route::put('/ajustes/actualizar_password', [App\Http\Controllers\DashboardController::class,'actualizar_password'])->name('web.ajustes.actualizar_password');


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

//------------------------ RUTAS PARA MIS PRODUCTOS (VENDEDOR)--------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/mis-productos', [App\Http\Controllers\MisProductosController::class, 'index'])->name('web.mis_productos.index');
    Route::get('/mis-productos/create', [App\Http\Controllers\MisProductosController::class, 'create'])->name('web.mis_productos.create');
    Route::post('/mis-productos', [App\Http\Controllers\MisProductosController::class, 'store'])->name('web.mis_productos.store');
    Route::get('/mis-productos/{id}/edit', [App\Http\Controllers\MisProductosController::class, 'edit'])->name('web.mis_productos.edit');
    Route::put('/mis-productos/{id}', [App\Http\Controllers\MisProductosController::class, 'update'])->name('web.mis_productos.update');
    Route::delete('/mis-productos/{id}', [App\Http\Controllers\MisProductosController::class, 'destroy'])->name('web.mis_productos.destroy');
});    

    Route::get('/mis-productos/{id}/imagenes', [App\Http\Controllers\MisProductosController::class, 'imagenes'])->name('web.mis_productos.imagenes');
    Route::post('/mis-productos/{id}/imagenes', [App\Http\Controllers\MisProductosController::class, 'cargaImagen'])->name('web.mis_productos.cargaimagen');
    Route::delete('/mis-productos/imagenes/{id}', [App\Http\Controllers\MisProductosController::class, 'eliminaImagen'])->name('web.mis_productos.eliminaimagen');

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
Route::post('/paypal/pago', [App\Http\Controllers\PaypalController::class,'pago'])->name('web.paypal.paypalpago');
// procesa el pago con paypal
Route::get('/paypal/gracias', [App\Http\Controllers\PaypalController::class,'gracias'])->name('web.paypal.paypalgracias');
// completa y guarda la orden en la base de datos
Route::get('/paypal/orden_completada/{id}', [App\Http\Controllers\PaypalController::class,'orden_completada'])->name('web.paypal.ordencompletada');
// cancela el pago con paypal
Route::get('/paypal/cancelar', [App\Http\Controllers\PaypalController::class,'cancelar_pago'])->name('web.paypal.paypalcancelar_pago');


//-------------------------         MERCADOPAGO          ------------------------------------





//-------------------------         CUENTADNI          ------------------------------------







//--------------------------------------FALLBACK --- RUTAS PARA PAGINAS DE ERROR -------------------------------------
Route::fallback(function () {
    if (request()->is('admin*')) {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        return response()->view('errors.404', [], 404);
    }
    return response()->view('errors.404-admin', [], 404);
});


// Route::middleware('auth')->group(function () {
// Route::resource('admin/roles', App\Http\Controllers\RoleController::class);
// });



