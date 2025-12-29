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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
    $table->string('documento', 15)->unique();
    $table->foreignId('tipo_documento_id')->constrained('tipo_documentos');
    $table->string('nombres', 30);
    $table->string('apellidos', 30);
    $table->string('direccion', 20)->nullable();
    $table->foreignId('ciudad_id')->constrained('ciudades');
    $table->string('telefono', 20)->nullable();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
