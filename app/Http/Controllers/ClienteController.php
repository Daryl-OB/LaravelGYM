<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::orderBy('id', 'desc')->paginate(10);
        
        return view('cliente.index', compact('clientes'));
    }
}
