<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscripcion', function (Blueprint $table) {
            $table->id();
            $table->string('numero_boleta', 11);
            $table->foreignId('cliente_id')->constrained('cliente');
            $table->foreignId('categoria_id')->constrained('categoria');
            $table->foreignId('promocion_id')->constrained('promocion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->foreignId('metodo_id')->constrained('metodo');
            $table->float('monto_costo');
            $table->float('monto_pagado');
            $table->float('monto_deuda');
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscripcion');
    }
};
