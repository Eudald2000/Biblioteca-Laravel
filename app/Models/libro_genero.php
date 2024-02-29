<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libro_genero extends Model
{
    use HasFactory;

    protected $filleable = [
        'libro_id',
        'genero_id'
    ];
}
