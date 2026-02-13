<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model // Clase que hereda de la clase Model
{
    protected $table = 'ordens'; // Nombre de la tabla en la base de datos

    protected $fillable = [ // Atributos que pueden ser llenados en el formulario
        'usuario_id',       
        'total',
        'divisa',
        'estado_pago',
        'estado_orden',
        'transaccion_id',
        'direccion_envio',
        'nota',
    ];

    public function usuario() // Método que devuelve el usuario asociado a la orden
    {
        return $this->belongsTo(User::class, 'usuario_id'); // Devuelve el usuario asociado a la orden
    }

    public function detalles() // Método que devuelve los detalles de la orden
    {
        return $this->hasMany(DetalleOrden::class, 'orden_id'); // Devuelve los detalles de la orden
    }
}
