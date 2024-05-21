<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){

        $categorias = Categoria::orderBy('id', 'desc')->paginate(10);
        
        return view('categoria.index', compact('categorias'));
    }

    public function create(){
        return view('categoria.create');
    }

    public function store(Request $request){
        
        $categoria = new Categoria();

        $categoria->nombre = $request->txtNombre;
        $categoria->descripcion = $request->txtDescripcion;

        $categoria->save();
        
        return redirect()->route('categorias.index')->with('success', 'Nueva categoria agregada');
    }

    public function edit($id){
        $categoria = Categoria::find($id);

        return view('categoria.edit', compact('categoria'));
    }

    public function update(Request $request){
        $categoria = Categoria::find($request->cid);

        $categoria->nombre = $request->txtNombre;
        $categoria->descripcion = $request->txtDescripcion;
        $categoria->estado = $request->cmbEstado;

        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada con éxito');
    }

    public function destroy($id){
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada con éxito');
    }
}
