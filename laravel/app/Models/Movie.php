<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Rating;
use App\Models\Review;

class Movie extends Model{
    use HasFactory;
protected $fillable = [ //Fillable sirve para definir datos que se pueden crear o actualizar dentro de mysq
    'titulo',
    'director',
    'año',
    'genero',
    'duracion',
    'sinopsis',
    'reparto',
    'user_id',
];


// Con models lo que conseguimos es rellenar los campos, con informacion que envie el usario ya se con un
// formulario u otra cosa. Todos los campos anteriormente han sido creado en migrations para que apareciesen
// en la base de datos


public function user(){ //Con esto vamos a crear las relaciones entre tablas
    return $this->belongsTo(User::class);
}

public function ratings(){
    return $this->hasMany(Rating::class, 'content_id');
}

public function reviews(){
    return $this->hasMany(Review::class);
}


public function updateAverageRating(){
    $average = $this->ratings()->avg('score'); // Promedio de todas las valoraciones
    $this->average_rating = $average;          // Lo guarda en la columna average_rating
    $this->save();                             // Guarda cambios en la base de datos
}

}
