<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoFavorito extends Model
{
    protected $table = 'producto_favoritos';

    protected $fillable = [
        'usuario_id',
        'producto_id',
    ];

    // ------------------------------ relaciones entre tablas -------------------------------

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id'); //un producto_favorito pertenece a un usuario
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id'); //un producto_favorito pertenece a un producto
    }
}
