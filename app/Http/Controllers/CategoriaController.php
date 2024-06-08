<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //funcion que nos lleva a la vista principal de categoria
    public function index()
    {
        /* $categorias = Categoria::orderBy('id', 'desc')->paginate(10); */

        return view('categoria.index');
    }

    //funcion que nos lleva a la vista create (formulario crear)
    public function create()
    {
        return view('categoria.create');
    }

    //funcion que captura los datos del formulario "crear" y crea un nuevo registro en nuestra base de datos
    public function store(Request $request)
    {
        //validar los datos del formulario
        $validateData = $request->validate(
            [
                'txtNombre' => 'required|string|max:255',
                'txtDescripcion' => 'required|string',
            ],
            [
                'txtNombre.required' => 'El campo nombre es obligatorio.',
                'txtDescripcion.required' => 'El campo descripcion es obligatorio.'
            ]
        );

        try {
            //Crear nueva instancia de la clase Categoria
            $categoria = new Categoria();

            // Asignar los valores del formulario a los campos de la instancia
            $categoria->nombre = $validateData['txtNombre'];
            $categoria->descripcion = $validateData['txtDescripcion'];

            //guardar en la base de datos
            $categoria->save();

            //redirigir a 'categorias.index' con mensaje de exito
            return redirect()->route('categorias.index')->with('success', 'Nueva categoria agregada');
            
        } catch (\Exception $e) {
            //redirigir a la misma página con mensaje de error
            return redirect()->back()->with('error', 'Hubo un problema al agregar la categoría: ' . $e->getMessage());
        }
    }

    //funcion que nos lleva a la vista edit (formulario edit)
    public function edit($id)
    {
        $categoria = Categoria::find($id);

        return view('categoria.edit', compact('categoria'));
    }

    //funcion que toma los datos del formulario "edit" y actualiza un registro de la base de datos
    public function update(Request $request)
    {
        //validar los datos del formulario
        $validateData = $request->validate([
            'cid' => 'required',
            'txtNombre' => 'required|string|max:255',
            'txtDescripcion' => 'required|string',
            'cmbEstado' => 'required'
        ],
        [
            'cid.required' => 'No se encuentra el ID del registro',
            'txtNombre' => 'El campo nombre es obligatorio',
            'txtDescripcion' => 'El campo descripcion es obligatorio',
            'cmbEstado' => 'El campo estado es obligatorio'
        ]);

        try {
            //Buscar el registro categoria por el ID
            $categoria = Categoria::find($validateData['cid']);

            //actualizar los valores del registro por los que tenemos en el formulario
            $categoria->nombre = $validateData['txtNombre'];
            $categoria->descripcion = $validateData['txtDescripcion'];
            $categoria->estado = $validateData['cmbEstado'];

            //guardar en la base de datos
            $categoria->save();

            //redirige a 'categorias.index' con un mensaje de exito
            return redirect()->route('categorias.index')->with('success', 'Categoría actualizada con éxito');

        } catch (\Exception $e) {
            //regresa a la misma vista actual con un mensaje de error
            return redirect()->back()->with('error', 'Hubo un problema al actualizar la categoria: ' . $e->getMessage());
        }
        
    }

    //funcion que nos permite eliminar un registro de la base de datos por el id
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada con éxito');
    }
}
