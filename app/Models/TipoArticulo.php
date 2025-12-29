<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoArticulo
 *
 * @property int $id
 * @property string $descripcion_articulo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property Articulo[] $articulos
 */
class TipoArticulo extends Model
{
    protected $perPage = 20;

    protected $fillable = [
        'descripcion_articulo'
    ];

    /**
     * Relación: Un tipo de artículo tiene muchos artículos
     */
    public function articulos()
    {
        return $this->hasMany(
            \App\Models\Articulo::class,
            'tipo_articulo_id',
            'id'
        );
    }
}
