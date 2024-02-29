<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genero extends Model
{
    use HasFactory;

    protected $filleable = [
        'genero'
    ];

    public function libros()
    {
        return $this->hasMany(libro::class);
    }
}
