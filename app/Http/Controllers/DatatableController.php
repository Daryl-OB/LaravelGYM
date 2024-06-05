<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class DatatableController extends Controller
{
    //funcion que devuelve todos los registros de la tabla categoria en formato json
    public function dataCategoria(){
        $categoria = Categoria::all(['id', 'nombre', 'descripcion', 'estado']);
        return json_encode($categoria);
    }
}
