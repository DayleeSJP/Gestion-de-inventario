<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $nombres = ['Pasteles y Tortas', 'Panadería', 'Galletas y Bocaditos', 'Bebidas Calientes', 'Postres Fríos', 'Chocolates', 'Empanadas'];
        $iconos = ['cake', 'bakery_dining', 'cookie', 'local_cafe', 'icecream', 'restaurant', 'fastfood'];
        $colores = ['#03645c', '#954912', '#5c5951', '#116a61', '#ba1a1a', '#2d7d74', '#753400'];
        $idx = rand(0, count($nombres) - 1);
        return [
            'name' => $this->faker->unique()->randomElement($nombres),
            'description' => 'Categoría de productos de pastelería artesanal',
            'icon' => $iconos[$idx % count($iconos)],
            'color' => $colores[$idx % count($colores)],
            'status' => true,
            'active' => true,
        ];
    }
}
