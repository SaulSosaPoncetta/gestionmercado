<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carritos';// nombre de la tabla en la base de datos
    protected $fillable = [ // campos que se van a llenar en la base de datos   
        'usuario_id',
        'producto_id',
        'cantidad',
    ];

    public function usuario()  // relacion uno a uno con el modelo usuario
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');  // RELACION UNO A UNO CON EL USUARIO            
    }

    public function producto()  // relacion uno a uno con el modelo producto
    {
        return $this->belongsTo(Producto::class, 'producto_id');  // RELACION UNO A UNO CON EL PRODUCTO
    }
}
