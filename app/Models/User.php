<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{    
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string> // campos que se van a llenar en la base de datos
     */
    protected $fillable = [ // campos que se van a llenar en la base de datos
        'name',
        'email',
        'password',
        'estado',
    ];

 
    /**
     * The attributes that are mass assignable.
     * @var list<string>
     */
    protected $hidden = [ // campos que no se van a llenar en la base de datos
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */                                 
    protected function casts(): array // campos que se van a llenar en la base de datos
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ------------------------------ relaciones entre tablas -------------------------------
    public function productoFavoritos() 
    {
        return $this->hasMany(ProductoFavorito::class, 'usuario_id'); //un usuario puede tener muchos producto_favoritos
    }

    public function carritos()
    {
        return $this->hasMany(Carrito::class, 'usuario_id'); //un usuario puede tener muchos carritos
    }
}
