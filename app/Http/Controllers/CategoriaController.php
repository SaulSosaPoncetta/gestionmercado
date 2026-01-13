<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
//Funcion del controlador para mostrar la vista y la lista de categorias en ella.
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');
        $query = Categoria::query();

        if ($buscar){
            $query->where('nombre', 'like', '%'.$buscar.'%')
                ->orWhere('descripcion', 'like', '%'.$buscar.'%');
        }

        $categorias = $query->paginate(10);
        return view('admin.categorias.index', compact('categorias'));
    }

//Funcion del controlador para crear una categoria
    public function create()
    {
        return view('admin.categorias.create');
    }

//Funcion del controlador para guardar los datos de la categoria creada o editada
    public function store(Request $request)
    {
       // return response()->json($request->all());
       $request->validate([
            'nombre' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
        ]);
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->slug = $request->slug;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();


       // return view('admin.categorias.store'); 
       return redirect()->route('admin.categorias.index')
        ->with('mensaje','Categoria creada exitosamente')
        ->with('icono','success');
    }

//Funcion del controlador para mostrar una categoria por id    
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('admin.categorias.show', compact('categoria'));
        //return redirect()->route('admin.categorias.index')
        //->with('mensaje','Categoria creada exitosamente')
        // ->with('icono','success');
    }

//Funcion del controlador para editar una categoria por id
public function edit($id)
{
    $categoria = Categoria::findOrFail($id);

    return view('admin.categorias.edit', compact('categoria'));
}
   
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categorias,slug,'.$id,
            'descripcion' => 'nullable|string',
        ]);
        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->nombre;
        $categoria->slug = $request->slug;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

         return redirect()->route('admin.categorias.index')
        ->with('mensaje','Categoria actualizada exitosamente')
        ->with('icono','success');
        //return view('admin.categorias.update', compact('categoria'));
    }

//Funcion del controlador para eliminar una categoria por id
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('admin.categorias.index')
            ->with('mensaje', 'Categoría eliminada correctamente')
            ->with('icono','success');
    }
}