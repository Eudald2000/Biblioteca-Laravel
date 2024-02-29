<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resena extends Model
{
    use HasFactory;

    protected $filleable = [
        'user_id',
        'libro_id',
        'resena'
    ];

    public function libro()
    {
        return $this->belongsTo(libro::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }


}
