<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleFactura
 *
 * @property $id
 * @property $factura_id
 * @property $articulo_id
 * @property $cantidad
 * @property $total
 * @property $created_at
 * @property $updated_at
 *
 * @property Articulo $articulo
 * @property Factura $factura
 * @property Devolucione[] $devoluciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetalleFactura extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['factura_id', 'articulo_id', 'cantidad', 'total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function articulo()
    {
        return $this->belongsTo(\App\Models\Articulo::class, 'articulo_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function factura()
    {
        return $this->belongsTo(\App\Models\Factura::class, 'factura_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devoluciones()
    {
        return $this->hasMany(\App\Models\Devolucione::class, 'id', 'detalle_factura_id');
    }
    
    
}
