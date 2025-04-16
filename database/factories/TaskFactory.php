<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     // did the php create factory command and got this shell and then put everything in with the return. then you need to go to the database seeder file
    public function definition()
    {
        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'long_description' => fake()->paragraph(7, true),
            'completed' => fake()->boolean
        ];
    }
}
