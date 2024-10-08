<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Compra extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function productos(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'compra_productos')
            ->withPivot('cantidad', 'precio');
    }
}
