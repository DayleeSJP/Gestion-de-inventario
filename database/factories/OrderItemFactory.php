<?php

namespace Database\Factories;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => \App\Models\Order::factory(),
            'product_id' => \App\Models\Product::factory(),
            'quantity' => $this->faker->randomFloat(2, 1, 10),
            'unit_price' => 0, // Calculated later based on product
            'unit_cost' => 0, // Calculated later based on product
            'subtotal' => 0, // Calculated later
        ];
    }
}
