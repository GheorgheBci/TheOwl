<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejemplar extends Model
{
    use HasFactory;

    protected $table = 'ejemplar';
    protected $primaryKey = 'isbn';
    public $timestamps = false;

    protected $fillable = [
        'nomEjemplar',
        'epilogo',
        'fecPublicacion',
        'tema',
        'codEditorial',
        'codAutor',
        'codColeccion'
    ];
}
