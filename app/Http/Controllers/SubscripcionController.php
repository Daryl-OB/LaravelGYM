<?php

namespace App\Http\Controllers;

use App\Models\Subscripcion;
use Illuminate\Http\Request;

class SubscripcionController extends Controller
{
    public function index(){
        //listado de todas las subscripciones, paginando de 10 en 10
        $subscripciones = Subscripcion::where('estado', 1)->orderBy('id', 'desc')->paginate(10);
        
        return view('subscripcion.index', compact('subscripciones'));
    }
}
