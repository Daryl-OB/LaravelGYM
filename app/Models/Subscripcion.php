<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscripcion extends Model
{
    //Nombre de la tabla a la que haremos referencia
    protected $table = 'subscripcion';

    use HasFactory;
    
    //Columnas con las que tenemos que interacturar
    protected $fillable = [
        'numero_boleta',
        'cliente_id', //foreing key -> cliente
        'categoria_id', //foreing key -> categoria
        'promocion_id', //foreing key -> promocion
        'fecha_inicio',
        'fecha_fin',
        'metodo_id', // foreing key -> metodo
        'monto_costo',
        'monto_pagado',
        'monto_deuda',
        'estado'
    ];

    //Relacion con la tabla Cliente
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    //Relacion con la tabla Categoria
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    //Relacion con la tabla Promocion
    public function promocion(){
        return $this->belongsTo(Promocion::class);
    }

    //Referencia con la tabla Metodo
    public function metodo(){
        return $this->belongsTo(Metodo::class);
    }

    /*
        Ejemplo de funcionalidad de las funciones de relaciones
        (En el controlador Subscripcion)

        Obtener una instancia de Subscripcion
        $subscripcion = Subscripcion::find(1); -> Suponiendo que el ID del registro es 1

        Obtener la categoría asociada a la subscripción
        $categoria = $subscripcion->categoria; -> Esta es la función que tenemos

        // Ahora puedes acceder a los atributos de la categoría
        echo $categoria->nombre;
        echo $categoria->descripcion;
    */
}
