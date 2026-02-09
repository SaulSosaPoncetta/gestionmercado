<?php

namespace App\Models; // Clase que hereda de la clase Model

use Illuminate\Database\Eloquent\Model; //

class DetalleOrden extends Model //
{
    protected $table = 'detalle_ordens'; // Nombre de la tabla en la base de datos

    protected $fillable = [ // Atributos que pueden ser llenados en el formulario
        'orden_id',
        'producto_id',
        'cantidad',
        'precio',
    ];

    public function orden() // Método que devuelve la orden asociada a la destalle
    {
        return $this->belongsTo(Orden::class, 'orden_id'); // Devuelve la orden asociada a la destalle
    }

    public function producto() // Método que devuelve el producto asociado a la destalle
    {
        return $this->belongsTo(Producto::class, 'producto_id'); // Devuelve el producto asociado a la destalle
    }
}
