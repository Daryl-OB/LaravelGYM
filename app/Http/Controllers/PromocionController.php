<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    //funcion que nos lleva a la vista principal de promocion
    public function index()
    {
        $promociones = Promocion::orderBy('id', 'desc')->paginate(10);

        return view('promocion.index', compact('promociones'));
    }

    //funcion que nos lleva a la vista create (formulario crear)
    public function create()
    {
        return view('promocion.create');
    }

    //funcion que captura los datos del formulario "crear" y crea un nuevo registro en nuestra base de datos
    public function store(Request $request)
    {
        //validar los datos del formulario
        $validateData = $request->validate(
            [
                'txtNombre' => 'required|string|max:255',
                'txtDescripcion' => 'required|string'
            ],
            [
                'txtNombre.required' => 'El campo nombre es obligatorio',
                'txtDescripcion.required' => 'El campo descripcion es obligatorio'
            ]
        );

        try {
            //Nueva instancia de la clase Promocion
            $promocion = new Promocion();

            // Asignar los valores del formulario a los campos de la instancia
            $promocion->nombre = $validateData['txtNombre'];
            $promocion->descripcion = $validateData['txtDescripcion'];

            //guardar en la base de datos
            $promocion->save();

            //redirigir a 'promociones.index' con un mensaje de exito
            return redirect()->route('promociones.index')->with('success', 'Nueva promoción agregada');
        } catch (\Exception $e) {
            //redirigir a la misma página con un mensaje de error
            return redirect()->back()->with('error', 'Hubo un error al agregar la promoción: ' . $e->getMessage());
        }
    }

    //funcion que nos lleva a la vista edit (formulario edit)
    public function edit($id)
    {
        $promocion = Promocion::find($id);

        return view('promocion.edit', compact('promocion'));
    }

    //funcion que toma los datos del formulario "edit" y actualiza un registro de la base de datos
    public function update(Request $request)
    {
        //validar los datos del formulario
        $validateData = $request->validate(
            [
                'cid' => 'required',
                'txtNombre' => 'required|string|max:255',
                'txtDescripcion' => 'required|string',
                'cmbEstado' => 'required'
            ],
            [
                'cid.required' => 'No se encuentra el ID del registro',
                'txtNombre.required' => 'El campo nombre es obligatorio',
                'txtDescripcion.required' => 'El campo descripcion es obligatorio',
                'cmbEstado.required' => 'El campo estado es obligatorio'
            ]
        );

        try {
            //Buscar la promocion por su ID
            $promocion = Promocion::find($validateData['cid']);

            // Asignar los valores del formulario a los campos
            $promocion->nombre = $validateData['txtNombre'];
            $promocion->descripcion = $validateData['txtDescripcion'];
            $promocion->estado = $validateData['cmbEstado'];

            //guardar en la base de datos
            $promocion->save();

            //redirigir a la vista con un mensaje de exito
            return redirect()->route('promociones.index')->with('success', 'Promoción actualizada con éxito');
        } catch (\Exception $e) {
            //redirigir a la vista actual con mensaje de error
            return redirect()->back()->with('error', 'Hubo un error al actualizar la promocion: ' . $e->getMessage());
        }
    }

    //funcion que nos permite eliminar un registro de la base de datos por el id
    public function destroy($id)
    {
        $promocion = Promocion::findOrFail($id);

        $promocion->delete();

        return redirect()->route('promociones.index')->with('success', 'Promoción eliminada con éxito');
    }
}
