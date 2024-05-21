<?php

namespace App\Http\Controllers;

use App\Models\Metodo;
use Illuminate\Http\Request;

class MetodoController extends Controller
{
    public function index(){
        $metodos = Metodo::orderBy('id', 'desc')->paginate(10);
        
        return view('metodo.index', compact('metodos'));
    }
}
