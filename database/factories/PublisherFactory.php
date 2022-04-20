<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publisher>
 */
class PublisherFactory extends Factory
{
    public function definition()
    {
        return [
            'title'       => $this->faker->lastName,
            'description' => $this->faker->text(100),
            'site'        => $this->faker->domainName
        ];
    }
}
