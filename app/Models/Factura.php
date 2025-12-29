<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Factura
 *
 * @property $id
 * @property $num_factura
 * @property $cliente_id
 * @property $nombre_empleado
 * @property $fecha_facturacion
 * @property $forma_pago_id
 * @property $total_factura
 * @property $iva
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property FormaPago $formaPago
 * @property DetalleFactura[] $detalleFacturas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Factura extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
 protected $fillable = [
    'num_factura',
    'cliente_id',
    'nombre_empleado',
    'fecha_facturacion',
    'forma_pago_id',
    'total_factura',
    'iva',

];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'cliente_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function formaPago()
    {
        return $this->belongsTo(\App\Models\FormaPago::class, 'forma_pago_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleFacturas()
    {
        return $this->hasMany(\App\Models\DetalleFactura::class, 'id', 'factura_id');
    }
    public function factura()
{
    return $this->belongsTo(Factura::class);
}

public function articulo()
{
    return $this->belongsTo(Articulo::class);
}

    
}
