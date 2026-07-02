<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
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
            'user_id' => \App\Models\User::factory(),
            'customer_name' => $this->faker->optional(0.7)->name(), // 70% chance of having a customer name, 30% generic
            'total_amount' => 0, // Calculated later
            'total_cost' => 0, // Calculated later
            'payment_method' => $this->faker->randomElement(['efectivo', 'tarjeta', 'yape', 'plin']),
            'status' => $this->faker->randomElement(['pendiente', 'pagado', 'cancelado']),
            'notes' => $this->faker->optional(0.2)->sentence(),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
