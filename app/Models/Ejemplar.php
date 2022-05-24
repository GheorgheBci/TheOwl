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
        'isbn',
        'nomEjemplar',
        'epilogo',
        'fecPublicacion',
        'tema',
        'idioma',
        'image_book',
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

    public function usuario()
    {
        return $this->belongsToMany('App\Models\Usuario', 'detalle_alquiler', 'isbn', 'codUsu');
    }
}
