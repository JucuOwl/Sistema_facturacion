<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';

    protected $perPage = 20;

    protected $fillable = [
        'codigo',
        'descripcion',
        'precio_venta',
        'precio_costo',
        'stock',
        'tipo_articulo_id',
        'proveedor_id',
        'fecha_ingreso',
    ];

    // 🔗 Proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedore::class, 'proveedor_id', 'id');
    }

    // 🔗 Tipo de artículo
    public function tipoArticulo()
    {
        return $this->belongsTo(TipoArticulo::class, 'tipo_articulo_id', 'id');
    }

    // 🔗 Detalles factura
    public function detalleFacturas()
    {
        return $this->hasMany(DetalleFactura::class, 'articulo_id', 'id');
    }
}
