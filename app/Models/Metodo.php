<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metodo extends Model
{
    protected $table = 'metodo';

    use HasFactory;

    protected $fillable = 
    [
        'nombre',
        'descripcion',
        'image_path',
        'estado'
    ];

}
