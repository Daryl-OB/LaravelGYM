<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Metodo;
use App\Models\Promocion;
use App\Models\Subscripcion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Contando el total de categorias con estado 1 = activo
        $totalCategoriasActivas = Categoria::where('estado', 1)->count();

        //Contando el total de promociones con estado 1 = activo
        $totalPromocionesActivas = Promocion::where('estado', 1)->count();

        //Contando el total de clientes
        $totalClientes = Cliente::count();

        //Contando el total de clientes
        $totalMetodos = Metodo::count();

        //Contando las subscripciones vigentes
        $totalSubscripciones = Subscripcion::where('estado', 1)->count();

        return view('home', compact(
            'totalCategoriasActivas',
            'totalPromocionesActivas',
            'totalClientes',
            'totalMetodos',
            'totalSubscripciones',
        ));
    }
}
