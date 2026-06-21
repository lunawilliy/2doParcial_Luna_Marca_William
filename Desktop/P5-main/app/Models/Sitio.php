<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sitio extends Model
{
    protected $fillable = [
        'titulo',
        'url',
        'categoria',
        'descripcion',
        'destacado',
    ];

    protected function casts(): array
    {
        return [
            'destacado' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
