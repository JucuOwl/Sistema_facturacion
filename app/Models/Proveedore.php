<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Proveedore
 *
 * @property int $id
 * @property string $no_documento
 * @property int $tipo_documento_id
 * @property string $nombre
 * @property string $apellido
 * @property string $nombre_comercial
 * @property string $direccion
 * @property int $ciudad_id
 * @property string $telefono
 */
class Proveedore extends Model
{
    protected $table = 'proveedores';

    protected $perPage = 20;

    protected $fillable = [
        'no_documento',
        'tipo_documento_id',
        'nombre',
        'apellido',
        'nombre_comercial',
        'direccion',
        'ciudad_id',
        'telefono',
    ];

    /**
     * Ciudad del proveedor
     */
    public function ciudade(): BelongsTo
    {
        return $this->belongsTo(Ciudade::class, 'ciudad_id', 'id');
    }

    /**
     * Tipo de documento del proveedor
     */
    public function tipoDocumento(): BelongsTo
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id', 'id');
    }

    /**
     * Artículos del proveedor
     */
    public function articulos(): HasMany
    {
        return $this->hasMany(Articulo::class, 'proveedor_id', 'id');
    }
}
