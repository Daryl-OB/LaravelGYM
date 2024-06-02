<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Metodo;
use App\Models\Promocion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SubscripcionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero_boleta' => $this->faker->numerify('###########'),


            // Utilizar registros existentes de Categoria, Cliente, Promocion, Metodo
            'cliente_id' => Cliente::all()->random()->id,
            'categoria_id' => Categoria::all()->random()->id,
            'promocion_id' => Promocion::all()->random()->id,

            'fecha_inicio' => $this->faker->date(),
            'fecha_fin' => $this->faker->date(),

            //Para el foreikey metodo
            'metodo_id' => Metodo::all()->random()->id,

            'monto_costo' => $this->faker->randomFloat(2, 50, 180),
            'monto_pagado' => $this->faker->randomFloat(2, 10, 180),
            'monto_deuda' => $this->faker->randomFloat(2, 0, 180),
            'estado' => $this->faker->randomElement([0, 1]),
        ];
    }
}
