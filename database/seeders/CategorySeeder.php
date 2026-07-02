<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder {
    public function run() {
        Category::create(['name' => 'Pastelería', 'description' => 'Pedidos personalizados', 'active' => true, 'icon' => 'cake', 'color' => '#954912']);
        Category::create(['name' => 'Panadería', 'description' => 'Panes recién horneados diarios', 'active' => true, 'icon' => 'bakery_dining', 'color' => '#03645c']);
        Category::create(['name' => 'Galletas & Snacks', 'description' => 'Galletería fina y empacada', 'active' => false, 'icon' => 'cookie', 'color' => '#5c5951']);
        Category::create(['name' => 'Cafetería', 'description' => 'Bebidas calientes y frías', 'active' => true, 'icon' => 'coffee', 'color' => '#116a61']);
    }
}
