<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dni' => $this->faker->randomNumber(8),
            'nombre' => $this->faker->firstName(),
            'ap_paterno' => $this->faker->lastName(),
            'ap_materno' => $this->faker->lastName(),
            'telefono' => $this->faker->numerify('9########'),
            'direccion' => $this->faker->sentence()
            //'estado' => $this->faker->randomElement([1,0])
        ];
    }
}
