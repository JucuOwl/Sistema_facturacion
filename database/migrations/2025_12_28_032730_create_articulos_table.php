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
        Schema::create('articulos', function (Blueprint $table) {
             $table->id();
    $table->string('descripcion', 30);
    $table->integer('precio_venta');
    $table->integer('precio_costo');
    $table->integer('stock');
    $table->foreignId('tipo_articulo_id')->constrained('tipo_articulos');
    $table->foreignId('proveedor_id')->constrained('proveedores');
    $table->date('fecha_ingreso');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
