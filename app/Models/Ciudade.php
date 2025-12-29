<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudade extends Model
{
    protected $table = 'ciudades'; // Asegúrate que tu tabla se llame así
    protected $perPage = 20;

    protected $fillable = ['codigo_ciudad', 'nombre_ciudad'];

    /**
     * Relación con clientes
     */
    public function clientes()
    {
        return $this->hasMany(\App\Models\Cliente::class, 'ciudad_id', 'id');
    }

    /**
     * Relación con proveedores
     */
    public function proveedores()
    {
        return $this->hasMany(\App\Models\Proveedore::class, 'ciudad_id', 'id');
    }
}
