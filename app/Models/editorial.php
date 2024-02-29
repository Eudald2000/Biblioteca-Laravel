<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class editorial extends Model
{
    use HasFactory;
    
    protected $filleable = [
        'editorial'
    ];
    
    public function libro()
    {
        return $this->belongsTo(libro::class);
    }

}
