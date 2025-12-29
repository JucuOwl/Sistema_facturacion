<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FormaPago
 *
 * @property $id
 * @property $descripcion_formapago
 * @property $created_at
 * @property $updated_at
 *
 * @property Factura[] $facturas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class FormaPago extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['descripcion_formapago'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function facturas()
    {
        return $this->hasMany(\App\Models\Factura::class, 'id', 'forma_pago_id');
    }
    
}
