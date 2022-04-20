<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    public function definition()
    {
        return [
            'title'       => $this->faker->firstName,
            'description' => $this->faker->text(100),
            'genre'       => $this->faker->lastName,
            'author_id'   => rand(1, 20)
        ];
    }
}
