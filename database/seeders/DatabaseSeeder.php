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
        // User::factory(10)->create();
        Role::create(['name' => 'super admin','guard_name' => 'web']);
        Role::create(['name' => 'administrador','guard_name' => 'web']);
        Role::create(['name' => 'vendedor','guard_name' => 'web']);
        Role::create(['name' => 'contabilidad','guard_name' => 'web']);   
        Role::create(['name' => 'operador','guard_name' => 'web']); 
        Role::create(['name' => 'cliente','guard_name' => 'web']);

        User::create([
            'name' => 'Saul Sosa',
            'email' => 'admin@migestion.com.ar',
            'password' => bcrypt('123456789'),
        ])->assignRole('super admin');

        Ajuste::create([
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
