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

}