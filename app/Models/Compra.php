<?php

// App\Models\Compra.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'nombre', 'apellidos', 'dni', 'direccion', 'localidad', 
        'provincia', 'email', 'telefono', 'fecha', 'total'
    ];

    // Relación con los productos
    public function productos()
    {
        return $this->belongsToMany(Product::class, 'compra_productos')
                    ->withPivot('cantidad', 'precio');
    }
}
