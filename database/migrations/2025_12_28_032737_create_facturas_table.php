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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
    $table->string('num_factura', 20)->unique();
    $table->foreignId('cliente_id')->constrained('clientes');
    $table->string('nombre_empleado', 30);
    $table->date('fecha_facturacion');
    $table->foreignId('forma_pago_id')->constrained('forma_pagos');
    $table->decimal('total_factura', 10, 2);
    $table->decimal('iva', 10, 2);
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
