<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
        $cost = $this->faker->randomFloat(2, 1, 20);
        return [
            'category_id' => \App\Models\Category::factory(),
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(),
            'cost_price' => $cost,
            'selling_price' => $cost * $this->faker->randomFloat(1, 1.5, 3.0),
            'stock' => $this->faker->randomFloat(2, 0, 100),
            'min_stock' => $this->faker->randomFloat(2, 5, 20),
            'status' => $this->faker->randomElement(['saludable', 'bajo_stock', 'limite', 'sobre_stock']),
            'image_path' => null,
        ];
    }
}
