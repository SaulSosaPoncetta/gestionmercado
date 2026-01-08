<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Ajuste;

class AjustesController extends Controller
{

    public function index()
    {
        $ajuste = Ajuste::first();
        try {
            $jsonData = file_get_contents('https://api.hilariweb.com/divisas');
            $monedas = json_decode($jsonData, true);
        } catch (\Exception $e) {
            $monedas = [];
        }
        
        return view('admin.ajustes.index', compact('monedas', 'ajuste'));

    }

    public function create()
    {
        echo "hola aca va la view de alta";
    }

    public function store(Request $request)
    {
        $ajuste= Ajuste::firstOrNew();
        //return response()->json($request->all());
        $rules =[
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'sucursal' => 'required|string|max:255',
            'direccion' => 'required|string|',
            'telefono' => 'required|string|max:255',   
            
            'email' => 'required|email|max:255',
            'moneda' => 'required|string|max:10',
            'pagina_web' => 'nullable|url|max:255',
        ];

        if ($ajuste){
            $rules['logo'] = 'nullable|image|mimes:jpeg,png,jpg,svg|max:12000';
            $rules['imagen_login'] = 'nullable|image|mimes:jpeg,png,jpg,svg|max:12000';
        } else {
            $rules['logo'] = 'required|image|mimes:jpeg,png,jpg,svg|max:12000';
            $rules['imagen_login'] = 'required|image|mimes:jpeg,png,jpg,svg|max:12000';
        }
        $request->validate($rules);

        if (!$ajuste){
            $ajuste = new Ajuste();
        } 
        
        $ajuste->nombre = $request->nombre;
        $ajuste->descripcion = $request->descripcion;
        $ajuste->sucursal = $request->sucursal;
        $ajuste->direccion = $request->direccion;
        $ajuste->telefono = $request->telefono;
        $ajuste->email = $request->email;
        $ajuste->moneda = $request->moneda; 
        $ajuste->pagina_web = $request->pagina_web;

        if ($request->hasFile('logo')){
            if ($ajuste->logo && Storage::disk('public')->exists($ajuste->logo)){
                Storage::disk('public')->delete($ajuste->logo);
            }
            $ajuste->logo = $request->file('logo')->store('logos', 'public');
        }

        if ($request->hasFile('imagen_login')){
            if ($ajuste->imagen_login && Storage::disk('public')->exists($ajuste->imagen_login)){
                Storage::disk('public')->delete($ajuste->imagen_login);
            }
            $ajuste->imagen_login = $request->file('imagen_login')->store('imagenes_login', 'public');
        }
        $ajuste->save();
        
        return redirect()->route('admin.ajustes.index')
        ->with('mensaje', 'Cambios guardados correctamente')
        ->with('icono', 'success');    

    }

    public function show(Ajuste $ajuste)
    {
        echo "hola aca va la view de ver";
    }

    public function edit(Ajuste $ajuste)
    {
        echo "hola aca va la view de edicion";
    }

    public function update(Request $request, Ajuste $ajuste)
    {
        echo "hola aca va la view de actualizar";
    }

    public function destroy(Ajuste $ajuste)
    {
        echo "hola aca va la view de delete";
    }
}
