<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class autor extends Model
{
    use HasFactory;

    protected $filleable = [
        'nombre'
    ];

    
    public function libro()
    {
        return $this->belongsTo(libro::class);
    }

}
