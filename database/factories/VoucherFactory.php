<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = Carbon::now()->subDays(7);
        $endDate   = Carbon::now();
        return [
            'code' =>  Str::random(5),
            'discount' => fake()->numberBetween(0, 100),
            'quantity' => fake()->numberBetween(0, 100),
            'quantity_used' => fake()->numberBetween(0, 100),
            'time_from' => $startDate,
            'time_end' => $endDate,
        ];
    }
}
