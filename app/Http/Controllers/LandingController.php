<?php

namespace App\Http\Controllers;

use App\Models\Ajuste;
use App\Models\Categoria;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        // Si ya está logueado, va directo al sistema
        if ($request->user()) {
            return $request->user()->hasRole('SUPER_ADMIN')
                ? redirect()->route('admin')
                : redirect()->route('web.index');
        }

        $ajuste = Ajuste::first();
        $categorias = Categoria::orderBy('nombre')->take(8)->get();

        return view('landing.index', compact('ajuste', 'categorias'));
    }
}
