<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Promocion;
use Illuminate\Http\Request;

class DatatableController extends Controller
{
    //funcion que devuelve todos los registros de la tabla categoria en formato json
    public function dataCategoria(){
        $categorias = Categoria::all(['id', 'nombre', 'descripcion', 'estado']);
        return json_encode($categorias);
    }

    //funcion que devuelve todos los registros de la tabla promocion en formato json
    public function dataPromocion(){
        $promociones = Promocion::all(['id', 'nombre', 'descripcion', 'estado']);
        return json_encode($promociones);
    }
}
