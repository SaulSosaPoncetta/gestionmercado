<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\ProductoImagen;
use App\Models\Categoria;
use App\Models\Ajuste;
use App\Models\User;
use App\Models\Orden;
use App\Models\ProductoFavorito;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $ajuste = Ajuste::first();
            
            $pedidos = Orden::with('usuario', 'detalles')->where('usuario_id', Auth::user()->id)->get();   

            $total_pedidos = Orden::where('usuario_id', Auth::user()->id)->count();
            $total_favoritos = ProductoFavorito::where('usuario_id', Auth::user()->id)->count();

            return view('web.dashboard', compact('ajuste', 'total_pedidos', 'total_favoritos', 'pedidos' ));
        }
        else{
            return redirect('/authloginweb');
        }
    }

        public function ajustes()
        {
            $ajuste = Ajuste::first();
            return view('web.ajustes', compact('ajuste'));
        }

        public function carrito()
        {
        if(Auth::check()){
            return view('web.carrito');
        }
        else{
            return redirect('/authloginweb');
        }
        
    }
   
    public function misventas()
    {
        if(Auth::check()){
            return view('web.misventas');
        }
        else{
            return redirect('/authloginweb');
        }
        
    }
  
    public function loginweb()
    {
        return view('web.loginweb');
    }

    public function autenticacion(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:9',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->intended('/dashboard');
        } else {
            // Autenticación fallida
            return redirect('/authloginweb')->withErrors(['login_error' => 'Credenciales inválidas.']);
        }
    }

     public function authregistroweb()
     {
        $ajuste = Ajuste::first();
        return view('web.registroweb',compact('ajuste'));
     }
    
     public function crearcuenta(Request $request)
        {
            //return response()->json($request->all());

            // Validar los datos del formulario
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:9|confirmed',
            ]);
    
            // Crear el nuevo usuario
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password')); // Encriptar la contraseña

            $user->save();

            $user->assignRole('CLIENTE'); // Asignar rol al usuario
                
            // Iniciar sesión automáticamente después del registro
            Auth::login($user);
    
            // Redirigir al usuario al dashboard u otra página
            return redirect('/dashboard');
        }

        public function informacion_personal(Request $request)
        {
            // return response()->json($request->all());
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            ]);

            $user = Auth::user();
            $user->name = $request->input('name');
            $user->email = $request->input('email');

            $user->save();

            return redirect()->back()
                ->with('mensaje', 'Información personal actualizada correctamente.')
                ->with('icono', 'success');
        }

        public function actualizar_password(Request $request)
        {
            //return response()->json($request->all());
            $request->validate([
                'current_password' => 'required|string',
                'password' => 'required|string|min:8|confirmed',
            ]);
            
            $user = Auth::user();
            // Verificar si la contraseña actual es correcta
            if (!password_verify($request->input('current_password'), $user->password)) {
                return redirect()->back()
                    ->with('mensaje', 'La contraseña actual no es correcta.')
                    ->with('icono', 'error');
            }

            // Actualizar la contraseña
            $user->password = bcrypt($request->input('password'));

            $user->save();

            return redirect()->back()
                ->with('mensaje', 'Contraseña actualizada correctamente.')
                ->with('icono', 'success');
        }

    }