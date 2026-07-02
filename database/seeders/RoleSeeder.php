<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder {
    public function run() {
        Role::create(['name' => 'Administrador', 'description' => 'Acceso total a todas las funciones del sistema.', 'color' => 'bg-primary']);
        Role::create(['name' => 'Vendedor', 'description' => 'Gestión de ventas y visualización de productos.', 'color' => 'bg-secondary']);
        Role::create(['name' => 'Maestro Pastelero', 'description' => 'Gestión de inventario de insumos y recetas.', 'color' => 'bg-tertiary']);
        Role::create(['name' => 'Cajero', 'description' => 'Apertura y cierre de caja, cobro de ventas.', 'color' => 'bg-primary-fixed-dim']);
    }
}
