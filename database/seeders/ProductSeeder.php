<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

class ProductSeeder extends Seeder {
    public function run() {
        $panaderia = Category::where('name', 'Panadería')->first()->id ?? null;
        $pasteleria = Category::where('name', 'Pastelería')->first()->id ?? null;
        
        Product::create(['name' => 'Croissant de Mantequilla', 'category_id' => $panaderia, 'price' => 4.50, 'stock' => 42, 'active' => true, 'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAJP9GCzXMD1h0hfbMi22V0flENG-g3su1egnuvyOslrrA7SXlQ4DXBYRRoxqHRYznbLKOJ6fzSZ50JDGOqz7QDsFVHvbu_i_1QrLR-GtS8YpgZRvkLhUK-9x5nPDzsZa2lfDYflq6Z8OjZEcJyIUS9UgipJYpF8zAhsFeOyYCHH1O8GqkPYYzJI7n0acNqTRyLtJjdVoDHLp3F-xPDpru0_8HoiJno0tWlIG6c4dn-SVq7L8EuLr2lfDccw2JCsrlYiuXm2NNZUVk']);
        Product::create(['name' => 'Tarta de Fresas', 'category_id' => $pasteleria, 'price' => 12.00, 'stock' => 5, 'active' => true, 'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCSJhra_t33SIEIKnBeGq4a1DqHifecL31pJYoyBh8mFWRCW8ny5D57Pqm1iF5jQybNkpw-wezZ2ZLENbfHHENaLpaweAsN5LdxV4o26w9Yd26YnvZqGRoLAURGXh0Uikeca5mbawaGHbgc5GfkWsSlE2ZnVcm7hwrImSgWfhkD78YDrzlyu1LDUsYQI5bgIbvNLTRTnrdmOlF2h3dLvGZlCRfTjQtqYVd-XIn2Q5fT5BI7qfyHXTP5z_T8MjYWZgfrk2ZGCEFwmuU']);
        Product::create(['name' => 'Pan de Chocolate', 'category_id' => $panaderia, 'price' => 5.50, 'stock' => 18, 'active' => true, 'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAInWOWYgS1Xit4nLnvkAXFKqGiSVIksvk3cIUNbTNbzNO-FGNeNs2RuCtDWZf0mJUYGUMbRjQI88YM10W608HNWl87mLyg9te_XDnGutvE-qxx3Wb9auSZYuhvPLO63xGf6mPHihcdDRRilu9X4znUa75TmgTMtbzc7B1JTJqqrV3R6ng9JxinIpskBkp284Xb8_c7aCSWtv5C0_CCjXRJLwEqc_ug9KHmfqOLyQ-CBMygtB8ayAO7rHU3vka2wCo7MVOQuojEHag']);
    }
}
