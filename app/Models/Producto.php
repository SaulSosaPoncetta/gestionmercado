<?php

namespace App\Models;

use App\Models\ProductoImagen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model // modelo de producto
{
    /** @use HasFactory<\Database\Factories\ProductoFactory> */
    use HasFactory;

    protected $fillable = [
        'categoria_id',
        'nombre',
        'codigo',
        'descripcion_corta',
        'descripcion_larga',
        'precio_compra',
        'precio_venta',
        'stock',
    ];

    // ------------------------------ relaciones entre tablas -------------------------------
    public function categoria()
    {
        return $this->belongsTo(Categoria::class); //un producto pertenece a una categoria
    }

    public function imagenes()
    {
        return $this->hasMany(ProductoImagen::class); //un producto puede tener muchas imagenes
    }   

    public function favoritos()
    {
        return $this->hasMany(ProductoFavorito::class, 'producto_id'); //un producto puede tener muchos producto_favoritos
    }

    public function carritos()
    {
        return $this->hasMany(Carrito::class, 'producto_id'); //un producto puede tener muchos carritos
    }

    public function detallesOrden()
    {
        return $this->hasMany(DetalleOrden::class, 'producto_id'); //un producto puede tener muchas ordenes
    }
}
