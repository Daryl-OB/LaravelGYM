<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //funcion que nos lleva a la vista principal de categoria
    public function index(){

        $categorias = Categoria::orderBy('id', 'desc')->paginate(10);
        
        return view('categoria.index', compact('categorias'));
    }

    //funcion que nos lleva a la vista create (formulario crear)
    public function create(){
        return view('categoria.create');
    }
    
    //funcion que captura los datos del formulario "crear" y crea un nuevo registro en nuestra base de datos
    public function store(Request $request){
        
        $categoria = new Categoria();

        $categoria->nombre = $request->txtNombre;
        $categoria->descripcion = $request->txtDescripcion;

        $categoria->save();
        
        return redirect()->route('categorias.index')->with('success', 'Nueva categoria agregada');
    }

    //funcion que nos lleva a la vista edit (formulario edit)
    public function edit($id){
        $categoria = Categoria::find($id);

        return view('categoria.edit', compact('categoria'));
    }

    //funcion que toma los datos del formulario "edit" y actualiza un registro de la base de datos
    public function update(Request $request){
        $categoria = Categoria::find($request->cid);

        $categoria->nombre = $request->txtNombre;
        $categoria->descripcion = $request->txtDescripcion;
        $categoria->estado = $request->cmbEstado;

        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada con éxito');
    }

    //funcion que nos permite eliminar un registro de la base de datos por el id
    public function destroy($id){
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada con éxito');
    }
}
