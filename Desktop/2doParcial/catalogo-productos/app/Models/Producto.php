<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['categoria_id', 'nombre', 'sku', 'precio', 'stock', 'disponible']; // Asignación masiva [cite: 263]

    protected $casts = [
        'precio' => 'decimal:2', // Cast obligatorio [cite: 264]
        'stock' => 'integer',
        'disponible' => 'boolean', // Cast obligatorio [cite: 264]
    ];

    // Un producto pertenece a una sola categoría (belongsTo) [cite: 243, 265]
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}