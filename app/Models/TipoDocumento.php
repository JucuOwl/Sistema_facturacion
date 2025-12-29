<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoDocumento
 *
 * @property $id
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente[] $clientes
 * @property Proveedore[] $proveedores
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoDocumento extends Model
{
    protected $perPage = 20;

    protected $fillable = ['descripcion'];

    /**
     * Un tipo de documento tiene muchos clientes
     */
    public function clientes()
    {
        return $this->hasMany(\App\Models\Cliente::class, 'tipo_documento_id', 'id');
    }

    /**
     * Un tipo de documento tiene muchos proveedores
     */
    public function proveedores()
    {
        return $this->hasMany(\App\Models\Proveedore::class, 'tipo_documento_id', 'id');
    }
}
