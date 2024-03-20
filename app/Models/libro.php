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
        'isbn',
        'disponible',
        'precio',
        'imagen',
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id');
    }

    public function editorial()
    {
        return $this->belongsTo(Editorial::class, 'editorial_id');
    }

    public function generos()
    {
        return $this->belongsToMany(genero::class);
    }

    public function ventas()
    {
        return $this->hasMany(venta::class);
    }

    public function resenas()
    {
        return $this->hasMany(resena::class);
    }

}
