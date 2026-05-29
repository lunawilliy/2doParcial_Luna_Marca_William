<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'activo']; // Asignación masiva [cite: 263]

    protected $casts = [
        'activo' => 'boolean', // Cast obligatorio [cite: 264]
    ];

    // Una categoría agrupa muchos productos (hasMany) [cite: 242, 265]
    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class);
    }
}