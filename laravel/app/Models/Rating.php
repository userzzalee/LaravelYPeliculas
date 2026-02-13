<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'user_id',
        'content_id',
        'score',
    ];

    public function movie(){   // Nota: content_id corresponde a la película
        return $this->belongsTo(Movie::class, 'content_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
