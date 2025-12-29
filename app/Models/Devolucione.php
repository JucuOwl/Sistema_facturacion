<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Devolucione
 *
 * @property $id
 * @property $detalle_factura_id
 * @property $motivo
 * @property $fecha_devolucion
 * @property $cantidad
 * @property $created_at
 * @property $updated_at
 *
 * @property DetalleFactura $detalleFactura
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Devolucione extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['detalle_factura_id', 'motivo', 'fecha_devolucion', 'cantidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function detalleFactura()
    {
        return $this->belongsTo(\App\Models\DetalleFactura::class, 'detalle_factura_id', 'id');
    }
    
}
