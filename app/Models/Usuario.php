<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Cambiar Model por Authenticatable
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'usuarios'; // nombre de la tabla
    protected $fillable = ['nombre', 'correo', 'clave']; // campos que se pueden asignar
    protected $hidden = ['clave']; // ocultamos la contraseña al devolver datos

    // JWTAuth necesita estos dos métodos
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    // Esto indica que la contraseña está en 'clave' y no en 'password'
    public function getAuthPassword()
    {
        return $this->clave;
    }
}
