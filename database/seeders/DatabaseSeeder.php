<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ajuste;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@migestion.com.ar',
            'password' => bcrypt('123456789'),
        ]);

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

        Role::create(['name' => 'admin','guard_name' => 'web']);
        Role::create(['name' => 'administrador','guard_name' => 'web']);
        Role::create(['name' => 'vendedor','guard_name' => 'web']);
        Role::create(['name' => 'contabilidad','guard_name' => 'web']);   
        Role::create(['name' => 'operador','guard_name' => 'web']);   
    
    }
}
