<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. Roles (usando Spatie)
        $adminRole = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'Administrador', 'guard_name' => 'web']);
        $cajeroRole = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'Cajero', 'guard_name' => 'web']);
        $vendedorRole = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'Vendedor', 'guard_name' => 'web']);

        // 2. Usuarios en español
        $admin = \App\Models\User::create([
            'name' => 'Daniela Cunurana',
            'username' => 'daniela.admin',
            'email' => 'admin@dulcecorazon.com',
            'password' => Hash::make('password123'),
            'status' => true,
        ]);
        $admin->assignRole($adminRole);

        $cajero = \App\Models\User::create([
            'name' => 'María Quispe',
            'username' => 'maria.cajero',
            'email' => 'cajero@dulcecorazon.com',
            'password' => Hash::make('password123'),
            'status' => true,
        ]);
        $cajero->assignRole($cajeroRole);

        $vendedor = \App\Models\User::create([
            'name' => 'José Mamani',
            'username' => 'jose.vendedor',
            'email' => 'vendedor@dulcecorazon.com',
            'password' => Hash::make('password123'),
            'status' => true,
        ]);
        $vendedor->assignRole($vendedorRole);

        // 3. Categorías con datos completos en español
        $categorias = [
            ['name' => 'Pasteles y Tortas', 'description' => 'Tortas de cumpleaños, bodas y celebraciones especiales', 'icon' => 'cake', 'color' => '#03645c', 'status' => true, 'active' => true],
            ['name' => 'Panadería', 'description' => 'Pan artesanal, ciabattas, baguettes y bollos', 'icon' => 'bakery_dining', 'color' => '#954912', 'status' => true, 'active' => true],
            ['name' => 'Galletas y Bocaditos', 'description' => 'Galletas decoradas, alfajores y petit fours', 'icon' => 'cookie', 'color' => '#5c5951', 'status' => true, 'active' => true],
            ['name' => 'Bebidas Calientes', 'description' => 'Café, cappuccino, chocolate caliente y tés', 'icon' => 'local_cafe', 'color' => '#753400', 'status' => true, 'active' => true],
            ['name' => 'Postres Fríos', 'description' => 'Mousses, cheesecakes, panna cotta y tiramisú', 'icon' => 'icecream', 'color' => '#116a61', 'status' => true, 'active' => true],
        ];

        $catModels = [];
        foreach ($categorias as $cat) {
            $catModels[] = \App\Models\Category::create($cat);
        }

        // 4. Productos en español con imágenes reales de Unsplash
        $productosData = [
            // Pasteles y Tortas
            ['cat' => 0, 'name' => 'Torta de Chocolate', 'desc' => 'Esponjosa torta de tres capas con ganache de chocolate belga', 'cost' => 35, 'sell' => 75, 'stock' => 8, 'img' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=400'],
            ['cat' => 0, 'name' => 'Torta de Vainilla', 'desc' => 'Clásica torta de vainilla con buttercream de fresa', 'cost' => 28, 'sell' => 60, 'stock' => 5, 'img' => 'https://images.unsplash.com/photo-1535141192574-5d4897c12636?w=400'],
            ['cat' => 0, 'name' => 'Torta Red Velvet', 'desc' => 'Suave red velvet con crema de queso Philadelphia', 'cost' => 40, 'sell' => 85, 'stock' => 4, 'img' => 'https://images.unsplash.com/photo-1586788680434-30d324b2d46f?w=400'],
            ['cat' => 0, 'name' => 'Tarta de Fresa', 'desc' => 'Base de masa sablé con crema pastelera y fresas frescas', 'cost' => 25, 'sell' => 55, 'stock' => 6, 'img' => 'https://images.unsplash.com/photo-1488477181946-6428a0291777?w=400'],

            // Panadería
            ['cat' => 1, 'name' => 'Pan de Molde Artesanal', 'desc' => 'Pan de molde esponjoso sin conservantes, horneado diariamente', 'cost' => 4, 'sell' => 9.5, 'stock' => 20, 'img' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?w=400'],
            ['cat' => 1, 'name' => 'Croissant de Mantequilla', 'desc' => 'Croissant francés hojaldrado con mantequilla de primera', 'cost' => 2.5, 'sell' => 6, 'stock' => 30, 'img' => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=400'],
            ['cat' => 1, 'name' => 'Pan de Yema', 'desc' => 'Tradicional pan de yema tachneño, suave y esponjoso', 'cost' => 1, 'sell' => 2.5, 'stock' => 50, 'img' => 'https://images.unsplash.com/photo-1549931319-a545dcf3bc73?w=400'],
            ['cat' => 1, 'name' => 'Ciabatta Italiana', 'desc' => 'Pan rústico con corteza crujiente y miga alveolada', 'cost' => 3, 'sell' => 7, 'stock' => 15, 'img' => 'https://images.unsplash.com/photo-1585478259715-1c195ae2b568?w=400'],

            // Galletas y Bocaditos
            ['cat' => 2, 'name' => 'Alfajores de Maicena', 'desc' => 'Suaves alfajores rellenos de manjar blanco y cubiertos de coco', 'cost' => 1.5, 'sell' => 3.5, 'stock' => 40, 'img' => 'https://images.unsplash.com/photo-1558961363-fa8fdf82db35?w=400'],
            ['cat' => 2, 'name' => 'Galletas de Avena', 'desc' => 'Crujientes galletas con avena, pasas y canela', 'cost' => 1, 'sell' => 2.5, 'stock' => 60, 'img' => 'https://images.unsplash.com/photo-1499636136210-6f4ee915583e?w=400'],
            ['cat' => 2, 'name' => 'Petit Fours Variados', 'desc' => 'Surtido de 12 petit fours de temporada', 'cost' => 12, 'sell' => 28, 'stock' => 10, 'img' => 'https://images.unsplash.com/photo-1618426703623-c1b335803e07?w=400'],

            // Bebidas Calientes
            ['cat' => 3, 'name' => 'Cappuccino Artesanal', 'desc' => 'Espresso doble con leche vaporizada y arte latte', 'cost' => 3, 'sell' => 8, 'stock' => 100, 'img' => 'https://images.unsplash.com/photo-1572442388796-11668a67e53d?w=400'],
            ['cat' => 3, 'name' => 'Chocolate Caliente', 'desc' => 'Chocolate a la taza con cacao puro peruano', 'cost' => 2.5, 'sell' => 7, 'stock' => 100, 'img' => 'https://images.unsplash.com/photo-1542990253-0d0f5be5f0ed?w=400'],
            ['cat' => 3, 'name' => 'Café Americano', 'desc' => 'Café de especialidad, granos de origen peruano', 'cost' => 2, 'sell' => 5.5, 'stock' => 100, 'img' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=400'],

            // Postres Fríos
            ['cat' => 4, 'name' => 'Cheesecake de Maracuyá', 'desc' => 'Cremoso cheesecake neoyorquino con coulis de maracuyá', 'cost' => 8, 'sell' => 18, 'stock' => 12, 'img' => 'https://images.unsplash.com/photo-1533134242443-d4fd215305ad?w=400'],
            ['cat' => 4, 'name' => 'Tiramisú Clásico', 'desc' => 'Tiramisú italiano con mascarpone y café espresso', 'cost' => 7, 'sell' => 16, 'stock' => 8, 'img' => 'https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?w=400'],
            ['cat' => 4, 'name' => 'Mousse de Chocolate', 'desc' => 'Mousse aireado de chocolate negro 70%', 'cost' => 5, 'sell' => 12, 'stock' => 15, 'img' => 'https://images.unsplash.com/photo-1541658016709-82535e94bc69?w=400'],
        ];

        $products = [];
        foreach ($productosData as $pData) {
            $products[] = \App\Models\Product::create([
                'category_id' => $catModels[$pData['cat']]->id,
                'name' => $pData['name'],
                'description' => $pData['desc'],
                'cost_price' => $pData['cost'],
                'selling_price' => $pData['sell'],
                'price' => $pData['sell'],
                'stock' => $pData['stock'],
                'min_stock' => 5,
                'status' => 'saludable',
                'active' => true,
                'image_path' => $pData['img'],
                'image' => $pData['img'],
            ]);
        }

        // 5. Órdenes en español - mezcla de pendientes y completadas
        $metodosPago = ['efectivo', 'tarjeta', 'yape', 'plin'];
        $clientes = ['María García', 'Carlos Quispe', 'Rosa Mamani', 'Juan Flores', 'Lucía Torres', 'Cliente General', null];
        $estadosHistorico = ['pagado', 'pagado', 'pagado', 'pagado', 'cancelado']; // mayoría pagadas

        // Crear 3 órdenes PENDIENTES para mostrar en dashboard
        for ($i = 0; $i < 3; $i++) {
            $selectedProds = array_slice($products, $i * 2, rand(1, 3));
            $totalAmount = 0;
            $totalCost = 0;

            $order = \App\Models\Order::create([
                'user_id' => $cajero->id,
                'customer_name' => $clientes[$i],
                'total_amount' => 0,
                'total_cost' => 0,
                'payment_method' => $metodosPago[array_rand($metodosPago)],
                'status' => 'pendiente',
            ]);

            foreach ($selectedProds as $product) {
                $qty = rand(1, 3);
                $subtotal = $product->selling_price * $qty;
                \App\Models\OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'unit_price' => $product->selling_price,
                    'unit_cost' => $product->cost_price,
                    'subtotal' => $subtotal,
                ]);
                $totalAmount += $subtotal;
                $totalCost += ($product->cost_price * $qty);
            }

            $order->update(['total_amount' => $totalAmount, 'total_cost' => $totalCost]);
        }

        // Crear 50 ventas históricas (últimos 30 días)
        for ($i = 0; $i < 50; $i++) {
            $daysAgo = rand(0, 30);
            
            $randKeys = array_rand($products, rand(1, 4));
            if (!is_array($randKeys)) {
                $randKeys = [$randKeys];
            }
            $selectedProds = array_intersect_key($products, array_flip($randKeys));
            
            $totalAmount = 0;
            $totalCost = 0;
            $fechaOrden = now()->subDays($daysAgo)->subHours(rand(0, 12));

            $order = \App\Models\Order::create([
                'user_id' => $cajero->id,
                'customer_name' => $clientes[array_rand($clientes)],
                'total_amount' => 0,
                'total_cost' => 0,
                'payment_method' => $metodosPago[array_rand($metodosPago)],
                'status' => $estadosHistorico[array_rand($estadosHistorico)],
                'created_at' => $fechaOrden,
                'updated_at' => $fechaOrden,
            ]);

            foreach ($selectedProds as $product) {
                $qty = rand(1, 5);
                $subtotal = $product->selling_price * $qty;
                \App\Models\OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'unit_price' => $product->selling_price,
                    'unit_cost' => $product->cost_price,
                    'subtotal' => $subtotal,
                ]);
                $totalAmount += $subtotal;
                $totalCost += ($product->cost_price * $qty);
            }

            $order->update(['total_amount' => $totalAmount, 'total_cost' => $totalCost]);
        }
    }
}
