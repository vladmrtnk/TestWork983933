<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookPublisherFactory extends Factory
{
    public function definition()
    {
        return [
            'publisher_id' => rand(1, 20),
            'book_id'      => rand(1, 50)
        ];
    }
}
