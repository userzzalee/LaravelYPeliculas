<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory{
    public function definition(): array{
        return [
            'titulo' => $this->faker->sentence(3),
            'director' => $this->faker->name(),
            'año' => $this->faker->year(),
            'genero' => $this->faker->randomElement([
                'Accion', 'Drama', 'Comedia', 'Terror', 'Ciencia Ficción', 'Romance'
            ]),
            'duracion' => $this->faker->numberBetween(80, 180), // duración en minutos
            'sinopsis' => $this->faker->paragraph(3),
            'reparto' => $this->faker->name() . ', ' . $this->faker->name(), // ejemplo de 2 actores
            'user_id' => User::inRandomOrder()->first()->id, // o User::factory() si quieres crear usuarios automáticos
        ];
    }
}
