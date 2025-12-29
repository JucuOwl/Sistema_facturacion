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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
    $table->string('no_documento', 20)->unique();
    $table->foreignId('tipo_documento_id')->constrained('tipo_documentos');
    $table->string('nombre', 20);
    $table->string('apellido', 20)->nullable();
    $table->string('nombre_comercial', 20)->nullable();
    $table->string('direccion', 20)->nullable();
    $table->foreignId('ciudad_id')->constrained('ciudades');
    $table->string('telefono', 15)->nullable();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
