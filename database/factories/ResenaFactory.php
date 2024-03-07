<?php

// ResenaFactory.php

namespace Database\Factories;

use App\Models\Resena;
use App\Models\User;
use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResenaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resena::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'libro_id' => Libro::inRandomOrder()->first()->id,
            'resena' => $this->faker->paragraphs(rand(1, 5), true),
        ];
    }
}

