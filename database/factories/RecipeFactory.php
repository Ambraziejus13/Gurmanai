<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'number_of_servings' => $this->faker->numberBetween(1,8),
            'preparation_time' => 'maždaug valanda',
            'ingredients' => $this->faker->paragraph(),
            'instructions' => $this->faker->paragraph(),
        ];
    }
}