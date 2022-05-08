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

    public function coleccion()
    {
        return $this->belongsTo('App\Models\Coleccion', 'codColeccion')->get();
    }

    public function autor()
    {
        return $this->belongsTo('App\Models\Autor', 'codAutor')->get();
    }

    public function editorial()
    {
        return $this->belongsTo('App\Models\Editorial', 'codEditorial')->get();
    }
}
