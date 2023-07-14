<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
            'image' => fake()->imageUrl(640, 480),
            'name' => fake()->name,
            'description' => fake()->sentence,
            'category_id' => fake()->numberBetween($min = 1, $max = 10),
            'status' => fake()->numberBetween($min = 1, $max = 3),
            'quantity' => fake()->numberBetween($min = 1, $max = 10),
            'price' => fake()->numberBetween($min = 1000000, $max = 10000000),
            'discount_price' => fake()->numberBetween($min = 10, $max = 100),
            'selled' => fake()->numberBetween($min = 1, $max = 100)
        ];
    }
}