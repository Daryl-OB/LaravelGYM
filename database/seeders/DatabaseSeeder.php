<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Metodo;
use App\Models\Promocion;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Categoria::factory()->count(30)->create();
        Promocion::factory()->count(30)->create();
        Metodo::factory()->count(30)->create();
        Cliente::factory()->count(30)->create();
    }
}
