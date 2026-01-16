<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        //Precios de base para calculos realiztas
        $precioCompra = $this->faker->randomFloat(2,10,500);
        $margenGanancia = $this->faker->randomElement([0.15, 0.20, 0.25, 0.30, 0.35, 0.40]);
        $precioVenta = $precioCompra * (1 + $margenGanancia);

        //Generar codigo unico
        $codigo = 'PROD' . $this->faker->unique()->numberBetween(1000, 9999);

        //Nombres de productos realistas por categoria
        $nombresElectronica = [
            'iPhone 12', 'iPhone 12 Pro', 'iPhone 12 Pro Max',
            'iPhone 13 mini', 'iPhone 13', 'iPhone 13 Pro', 
            'iPhone 13 Pro Max', 'iPhone SE 3', 'iPhone SE 4', 
            'iPhone SE 4', 'iPhone SE 5', 'iPhone 14 Plus', 
            'iPhone 14', 'iPhone 14 Pro', 'iPhone 14 Pro Max'
        ];
        
        $nombresRopa = [
            'Camiseta', 'Pantalones', 'Vestido', 'Chaqueta', 
            'Falda', 'Camisa', 'Suéter', 'Shorts', 
            'Abrigo', 'Traje de baño', 'Sudadera', 
            'Leggings', 'Blusa', 'Chaleco', 'Mono'
        ];

        $nombresHogar = [
            'Sofá', 'Mesa de comedor', 'Silla', 'Cama',
            'Lámpara de pie', 'Estantería', 'Alfombra', 'Cortinas',
            'Espejo de pared', 'Reloj de pared', 'Cuadro decorativo'
        ];        

        $nombresDeportes = [
            'Camiseta', 'Pantalones', 'Vestido', 'Chaqueta', 
            'Falda', 'Camisa', 'Suéter', 'Shorts', 
            'Abrigo', 'Traje de baño', 'Sudadera', 
            'Leggings', 'Blusa', 'Chaleco', 'Mono'
        ];

        $todosNombres = array_merge(
            $nombresElectronica, 
            $nombresRopa, 
            $nombresHogar, 
            $nombresDeportes
        );

        $nombre = $this->faker->randomElement($todosNombres) . ' ' . 
                $this->faker->randomElement(['Pro', 'Max', 'Plus', 'Elite', 'Premium', 'Standard']);

            return [
            'categoria_id' => Categoria::inRandomOrder()->first()->id ?? Categoria::factory()->create()->id,    
            'nombre' => $nombre,
            'codigo' => $codigo,
            'descripcion_corta' => $this->faker->sentence(8),
            'descripcion_larga' => $this->faker->sentence(3,true),
            'precio_compra' => $precioCompra,
            'precio_venta' => round($precioVenta, 2),
            'stock' => $this->faker->numberBetween(0, 100),
                  
        ];
    }
}
