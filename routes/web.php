<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\CiudadeController;
use App\Http\Controllers\FormaPagoController;
use App\Http\Controllers\TipoArticuloController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedoreController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\DetalleFacturaController;
use App\Http\Controllers\DevolucioneController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::resource('tipo-documentos', TipoDocumentoController::class);
    Route::resource('ciudades', CiudadeController::class);
    Route::resource('forma-pagos', FormaPagoController::class);
    Route::resource('tipo-articulos', TipoArticuloController::class);

    Route::resource('clientes', ClienteController::class);
    Route::resource('proveedores', ProveedoreController::class);

    Route::resource('articulos', ArticuloController::class);
    Route::resource('facturas', FacturaController::class);

    Route::resource('detalle-facturas', DetalleFacturaController::class);
    Route::resource('devoluciones', DevolucioneController::class);
});
