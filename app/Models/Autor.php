<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autor';
    protected $primaryKey = 'codAutor';
    public $timestamps = false;

    protected $fillable = [
        'nomAutor',
        'ape1Autor',
        'ape2Autor'
    ];
}
