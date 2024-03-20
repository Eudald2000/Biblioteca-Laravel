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
        $isbnList = ['9780140623275', '9788499086401', '9788491814082', '9788420649247', '9788491050527', '9788492050527', '9788497646942', '9788420674379', '9788483465693'];
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'libro_id' => Libro::inRandomOrder()->first()->id,
            'resena' => $this->faker->paragraphs(rand(1, 5), true),
            'isbn' => $isbnList[array_rand($isbnList)],
        ];
    }
}

