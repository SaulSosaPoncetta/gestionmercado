<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    protected $model = Categoria::class;

    
    public function definition(): array
    {
        $nombre = $this->faker->unique()->randomElement([
            'Electronica',
            'Ropa y Moda',
            'Hogar y Jardin',
            'Deportes',
            'Juguetes',
            'Alimentos y Bebidas',
            'Belleza y Cuidado Personal',
            'Automoviles',
            'Mascotas',
            'Música',
            'Películas y Series',
            'Oficina y Papelería',
            'Software',
            'Electronica y Computadoras',
            'Bebés',
            'Libros',
            'Salud',
            'Alimentos',
            'Otros',
        ]);

        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            'descripcion' => $this->faker->optional(0.7)->sentence(15),
        ];
    }
}
