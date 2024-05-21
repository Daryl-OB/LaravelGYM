<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MetodoController;
use App\Http\Controllers\PromocionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Ruta de la vista home
Route::get('gimnasio', [App\Http\Controllers\HomeController::class, 'index'])->name('gimnasio');

//Rutas de categoria
Route::controller(CategoriaController::class)->group(function (){
    //ruta vista principal categoria
    Route::get('gimnasio/categorias', 'index')->name('categorias.index'); 
    //ruta vista create categoria
    Route::get('gimnasio/categorias/create', 'create')->name('categorias.create'); 
    //ruta para recibir datos de un formulario y crear una categoria
    Route::post('gimnasio/categorias/store', 'store')->name('categorias.store'); 
    //ruta para la vista editar categoria
    Route::get('gimnasio/categorias/edit/{id}', 'edit')->name('categorias.edit'); 
    //ruta para recibir datos de un formulario y actualizar la categoria
    Route::put('gimnasio/categorias/update', 'update')->name('categorias.update'); 
    
    Route::delete('gimnasio/categoria/delete/{id}', 'destroy')->name('categorias.destroy');
});

//Rutas de promocion
Route::controller(PromocionController::class)->group(function (){
    Route::get('gimnasio/promociones', 'index')->name('promociones.index');
});

//Rutas de cliente
Route::controller(ClienteController::class)->group(function (){
    Route::get('gimnasio/clientes', 'index')->name('clientes.index');
});

//Rutas de metodo
Route::controller(MetodoController::class)->group(function (){
    Route::get('gimnasio/metodos', 'index')->name('metodos.index');
});







