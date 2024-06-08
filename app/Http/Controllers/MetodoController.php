<?php

namespace App\Http\Controllers;

use App\Models\Metodo;
use App\Models\Promocion;
use Illuminate\Http\Request;

class MetodoController extends Controller
{
    public function index(){
        $metodos = Metodo::orderBy('id', 'desc')->paginate(10);
        
        return view('metodo.index', compact('metodos'));
    }

    public function create(){
        return view('promocion.create');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'txtNombre' => 'required|string|max:255',
            'txtDescripcion' => 'required',
            'txtImage' => 'nullable|image|mimes:jpg,png,jpeg|max:255',
            'cmbEstado' => 'required'
        ],
        [
            'txtNombre' => 'El campo nombre es requerido',
            'txtDescripcion' => 'El campo descripcion es requerido',
            'cmbEstado' => 'El campo estado es requerido'
        ]
        );

        try {
            
            $promocion = new Promocion();

            $promocion->nombre = $validateData['txtNombre'];
            $promocion->descripcion = $validateData['txtDescripcion'];
            $promocion->image_path = $validateData['txtImage'];
            $promocion->cmbEstado = $validateData['cmbEstado'];

            $promocion->save();

            return redirect()->route('promociones.index')->with('success', 'Promoción agregada con éxito');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hubo un error al agregar la promocion: ' . $e->getMessage());
        }
    }

    public function edit(){
        return view('promocion.edit');
    }

    public function update(Request $request){
        
        /* $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            // otras reglas de validación según sea necesario
        ]);

        $metodo = Metodo::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $metodo->image_path = 'images/' . $imageName;
        }

        $metodo->nombre = $request->input('nombre');
        $metodo->descripcion = $request->input('descripcion');
        $metodo->estado = $request->input('estado', $metodo->estado);

        $metodo->save();

        return back()->with('success', 'Metodo actualizado correctamente.'); */
    }

    public function destroy($id){
        
    }
}
