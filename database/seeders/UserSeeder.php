<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run() {
        $adminRole = Role::where('name', 'Administrador')->first()->id ?? null;
        
        User::create([
            'name' => 'Daniela Cunurana', 
            'email' => 'daniela@dulcecorazon.com', 
            'password' => Hash::make('password'),
            'role_id' => $adminRole, 
            'active' => true
        ]);
    }
}
