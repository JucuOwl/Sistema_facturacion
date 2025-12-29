<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* ===============================
     | RELACIONES – SISTEMA FACTURACIÓN
     =============================== */

    // Un usuario puede registrar muchos clientes
    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'user_id');
    }

    // Un usuario puede registrar muchos proveedores
    public function proveedores()
    {
        return $this->hasMany(Proveedor::class, 'user_id');
    }

    // Un usuario puede crear muchas facturas
    public function facturas()
    {
        return $this->hasMany(Factura::class, 'user_id');
    }

    // Un usuario puede registrar devoluciones
    public function devoluciones()
    {
        return $this->hasMany(Devolucion::class, 'user_id');
    }
}
