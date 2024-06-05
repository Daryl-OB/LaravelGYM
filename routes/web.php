<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\MetodoController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\SubscripcionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Ruta de la vista home
Route::get('gimnasio', [App\Http\Controllers\HomeController::class, 'index'])->name('gimnasio');

//Rutas de los Datatables
Route::controller(DatatableController::class)->group(function(){
    Route::get('datatable/categoria', 'dataCategoria')->name('datatables.categoria');
    Route::get('datatable/promocion', 'dataPromocion')->name('datatables.promocion');
});

//Rutas de categoria
Route::controller(CategoriaController::class)->group(function (){
    Route::get('gimnasio/categorias', 'index')->name('categorias.index'); 
    Route::get('gimnasio/categorias/create', 'create')->name('categorias.create'); 
    Route::post('gimnasio/categorias/store', 'store')->name('categorias.store');
    Route::get('gimnasio/categorias/edit/{id}', 'edit')->name('categorias.edit'); 
    Route::put('gimnasio/categorias/update', 'update')->name('categorias.update'); 
    Route::delete('gimnasio/categoria/delete/{id}', 'destroy')->name('categorias.destroy');
});

//Rutas de promociones
Route::controller(PromocionController::class)->group(function (){
    Route::get('gimnasio/promociones', 'index')->name('promociones.index');
    Route::get('gimnasio/promociones/create', 'create')->name('promociones.create');
    Route::post('gimnasio/promociones/store', 'store')->name('promociones.store');
    Route::get('gimnasio/promociones/edit/{id}', 'edit')->name('promociones.edit');
    Route::put('gimnasio/promociones/update', 'update')->name('promociones.update');
    Route::delete('gimnasio/promociones/delete/{id}', 'destroy')->name('promociones.destroy');
});

//Rutas de cliente
Route::controller(ClienteController::class)->group(function (){
    Route::get('gimnasio/clientes', 'index')->name('clientes.index');
});

//Rutas de metodo
Route::controller(MetodoController::class)->group(function (){
    Route::get('gimnasio/metodos', 'index')->name('metodos.index');
});

//Rutas de subscripcion
Route::controller(SubscripcionController::class)->group(function (){
    Route::get('gimnasio/subscripciones', 'index')->name('subscripciones.index');
});