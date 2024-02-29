<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libro extends Model
{
    use HasFactory;

    protected $filleable = [
        'titulo',
        'autor_id',
        'editorial_id',
        'ano_publicacion',
        'ISBN',
        'disponible',
        'precio'
    ];

    public function autor()
    {
        return $this->hasOne(autor::class);
    }

    public function editorial()
    {
        return $this->hasOne(editorial::class);
    }

    public function generos()
    {
        return $this->belongsToMany(genero::class);
    }

    public function prestamos()
    {
        return $this->hasMany(prestamo::class);
    }

    public function resenas()
    {
        return $this->hasMany(resena::class);
    }

}
