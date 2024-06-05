<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    //funcion que nos lleva a la vista principal de promocion
    public function index(){
        $promociones = Promocion::orderBy('id', 'desc')->paginate(10);

        return view('promocion.index', compact('promociones'));
    }

    //funcion que nos lleva a la vista create (formulario crear)
    public function create(){
        return view('promocion.create');
    }

    //funcion que captura los datos del formulario "crear" y crea un nuevo registro en nuestra base de datos
    public function store(Request $request){
        $promocion = new Promocion();

        $promocion->nombre = $request->txtNombre;
        $promocion->descripcion = $request->txtDescripcion;

        $promocion->save();

        return redirect()->route('promociones.index')->with('success', 'Nueva promoción agregada');
    }

    //funcion que nos lleva a la vista edit (formulario edit)
    public function edit($id){
        $promocion = Promocion::find($id);

        return view('promocion.edit', compact('promocion'));
    }

    //funcion que toma los datos del formulario "edit" y actualiza un registro de la base de datos
    public function update(Request $request){
        $promocion = Promocion::find($request->cid);

        $promocion->nombre = $request->txtNombre;
        $promocion->descripcion = $request->txtDescripcion;
        $promocion->estado = $request->cmbEstado;

        $promocion->save();
    
        return redirect()->route('promociones.index')->with('success', 'Promoción actualizada con éxito');
    }

    //funcion que nos permite eliminar un registro de la base de datos por el id
    public function destroy($id){
        $promocion = Promocion::findOrFail($id);

        $promocion->delete();

        return redirect()->route('promociones.index')->with('success', 'Promoción eliminada con éxito');
    }
}
