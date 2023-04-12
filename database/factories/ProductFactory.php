<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            // 'image' => fake()->sentence(),
            'price' => fake()->numberBetween(1, 1000),
            'price_cost' => fake()->numberBetween(1, 1000),
            'quantity' => fake()->numberBetween(1,100),
            'description' => fake()->sentence(),
            'category_id' => fake()->numberBetween(1,5),
            'sold' => fake()->numberBetween(0,20),
            'views' => fake()->numberBetween(0,20),
        ];
    }
}
