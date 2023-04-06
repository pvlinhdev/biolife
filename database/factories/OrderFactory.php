<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code'=>fake()->isbn10(),
            'status'=>fake()->sentence(),
            'user_id'=>fake()->numberBetween(1,5),
            'receivership_id'=>fake()->numberBetween(1,5),
        ];
    }
}
