<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $productos = [
            ['Torta de Chocolate', 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=400'],
            ['Pan Artesanal', 'https://images.unsplash.com/photo-1509440159596-0249088772ff?w=400'],
            ['Croissant de Mantequilla', 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=400'],
            ['Alfajores de Maicena', 'https://images.unsplash.com/photo-1558961363-fa8fdf82db35?w=400'],
            ['Cappuccino', 'https://images.unsplash.com/photo-1572442388796-11668a67e53d?w=400'],
            ['Cheesecake de Fresa', 'https://images.unsplash.com/photo-1533134242443-d4fd215305ad?w=400'],
            ['Tiramisú', 'https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?w=400'],
            ['Galletas de Avena', 'https://images.unsplash.com/photo-1499636136210-6f4ee915583e?w=400'],
        ];
        $p = $this->faker->randomElement($productos);
        $cost = $this->faker->randomFloat(2, 3, 25);
        $sell = $cost * $this->faker->randomFloat(1, 2, 3.5);
        return [
            'category_id' => \App\Models\Category::factory(),
            'name' => $p[0] . ' ' . $this->faker->numberBetween(1, 99),
            'description' => 'Producto artesanal de la Pastelería Dulce Corazón, hecho con ingredientes de primera calidad.',
            'cost_price' => $cost,
            'selling_price' => $sell,
            'price' => $sell,
            'stock' => $this->faker->randomFloat(2, 5, 50),
            'min_stock' => 5,
            'status' => 'saludable',
            'active' => true,
            'image_path' => $p[1],
            'image' => $p[1],
        ];
    }
}
