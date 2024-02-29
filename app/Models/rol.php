<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    use HasFactory;

    protected $filleable = [
        'rol'
    ];


    public function users()
	{
        //User::where('rol', $this->id)
		return $this->belongsTo(User::class);
	}
}
