<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoriaFactory extends Factory
{
    protected $model = Categoria::class;

    public function definition(): array
    {
        $nombre = fake()->unique()->randomElement([
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
            'descripcion' => fake()->optional(0.7)->sentence(15),
        ];
    }
}
