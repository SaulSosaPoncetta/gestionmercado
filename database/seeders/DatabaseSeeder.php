<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ajuste;
use App\Models\Role;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call(RoleSeeder::class);

        // User::factory(10)->create();
        Role::firstOrCreate(['name' => 'SUPER ADMIN','guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'ADMINISTRADOR','guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'VENDEDOR','guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'CONTABILIDAD','guard_name' => 'web']);   
        Role::firstOrCreate(['name' => 'OPERADOR','guard_name' => 'web']); 
        Role::firstOrCreate(['name' => 'CLIENTE','guard_name' => 'web']);

        User::firstOrCreate([
            'name' => 'Saul Sosa',
            'email' => 'admin@migestion.com.ar',
            'password' => bcrypt('123456789'),
        ])->assignRole('SUPER ADMIN');

                User::firstOrCreate([
            'name' => 'Timoteo Sosa',
            'email' => 'shsp1975servicios@gmail.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('CLIENTE');

        Ajuste::firstOrCreate([
            'nombre' => 'Eloisa',
            'descripcion' => 'Tienda Artesanal',
            'sucursal' => 'Olavarria',
            'direccion' => 'Hornos 3178',
            'telefono' => '2284-214010',   
            'email' => 'eloisa@migestion.com.ar',
            'moneda' => 'ARS',
            'pagina_web' => 'https://www.eloisa.com.ar',
        ]);

        Categoria::factory(15)->create();
        Producto::factory(50)->create();


  
    
    }
}
