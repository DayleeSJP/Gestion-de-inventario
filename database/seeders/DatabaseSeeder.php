<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Roles y Permisos (Spatie)
        $adminRole = \Spatie\Permission\Models\Role::create(['name' => 'Administrador']);
        $cajeroRole = \Spatie\Permission\Models\Role::create(['name' => 'Cajero']);
        $vendedorRole = \Spatie\Permission\Models\Role::create(['name' => 'Vendedor']);
        
        // 2. Usuarios
        $admin = \App\Models\User::factory()->create([
            'name' => 'Carlos López',
            'username' => 'clopez_pastelero',
            'email' => 'admin@dulcecorazon.com',
            'password' => bcrypt('password'),
            'status' => true,
        ]);
        $admin->assignRole($adminRole);

        $cajero = \App\Models\User::factory()->create([
            'name' => 'Ana Torres',
            'username' => 'atorres',
            'email' => 'cajero@dulcecorazon.com',
            'password' => bcrypt('password'),
            'status' => true,
        ]);
        $cajero->assignRole($cajeroRole);

        // 3. Categorías
        $categories = \App\Models\Category::factory(5)->create();

        // 4. Productos
        $products = collect();
        foreach ($categories as $category) {
            $products = $products->merge(
                \App\Models\Product::factory(10)->create([
                    'category_id' => $category->id
                ])
            );
        }

        // 5. Órdenes y Detalles (Ventas)
        // Crear 50 ventas falsas
        for ($i = 0; $i < 50; $i++) {
            $order = \App\Models\Order::factory()->create([
                'user_id' => $cajero->id,
            ]);

            $totalAmount = 0;
            $totalCost = 0;

            // Cada orden tiene entre 1 y 5 productos
            $itemsCount = rand(1, 5);
            $selectedProducts = $products->random($itemsCount);

            foreach ($selectedProducts as $product) {
                $quantity = rand(1, 5);
                $unitPrice = $product->selling_price;
                $unitCost = $product->cost_price;
                $subtotal = $unitPrice * $quantity;

                \App\Models\OrderItem::factory()->create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                    'unit_cost' => $unitCost,
                    'subtotal' => $subtotal,
                ]);

                $totalAmount += $subtotal;
                $totalCost += ($unitCost * $quantity);
            }

            // Actualizar los totales de la orden
            $order->update([
                'total_amount' => $totalAmount,
                'total_cost' => $totalCost,
            ]);
        }
    }
}
