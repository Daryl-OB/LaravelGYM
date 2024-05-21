<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    public function index(){
        $promociones = Promocion::orderBy('id', 'desc')->paginate(10);

        return view('promocion.index', compact('promociones'));
    }
}
