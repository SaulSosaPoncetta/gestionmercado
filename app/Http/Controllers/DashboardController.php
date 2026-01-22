<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\ProductoImagen;
use App\Models\Categoria;
use App\Models\Ajuste;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('web.dashboard');
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

}