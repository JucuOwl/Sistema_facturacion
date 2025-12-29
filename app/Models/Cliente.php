<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $perPage = 20;

    protected $fillable = [
        'documento',
        'tipo_documento_id',
        'nombres',
        'apellidos',
        'direccion',
        'ciudad_id',
        'telefono'
    ];

    // ✅ CIUDAD (CORRECTO)
    public function ciudad()
    {
        return $this->belongsTo(\App\Models\Ciudade::class, 'ciudad_id', 'id');
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(\App\Models\TipoDocumento::class, 'tipo_documento_id', 'id');
    }

    public function facturas()
    {
        return $this->hasMany(\App\Models\Factura::class, 'cliente_id', 'id');
    }

    public function pedidos()
    {
        return $this->hasMany(\App\Models\Pedido::class, 'cliente_id', 'id');
    }

    public function comprobantes()
    {
        return $this->hasMany(\App\Models\Comprobante::class, 'cliente_id', 'id');
    }

    public function ordenServicios()
    {
        return $this->hasMany(\App\Models\OrdenServicio::class, 'cliente_id', 'id');
    }
}
