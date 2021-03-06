<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'codUsu';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido1',
        'apellido2',
        'fecNacimiento',
        'email',
        'password',
        'idRol',
        'fec_ini_socio',
        'fec_fin_socio',
        'baja',
        'imagen_usuario',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ejemplar()
    {
        return $this->belongsToMany('App\Models\Ejemplar', 'detalle_alquiler', 'codUsu', 'isbn')->withPivot('isbn');
    }

    public function addEjemplarWishList()
    {
        return $this->belongsToMany('App\Models\Ejemplar', 'wishlist', 'codUsu', 'isbn');
    }

    public function rol()
    {
        return $this->belongsTo('App\Models\Rol', 'idRol')->get();
    }
}
