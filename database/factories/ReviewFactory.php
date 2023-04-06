<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'level'=>fake()->numberBetween(0, 5),
            'content'=>fake()->sentence(),
            'product_id'=>fake()->numberBetween(1,5),
            'user_id'=>fake()->numberBetween(1,5),
        ];
    }
}
