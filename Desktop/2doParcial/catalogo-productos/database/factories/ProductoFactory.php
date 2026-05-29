<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'nombre' => $this->faker->words(3, true),
        'sku' => strtoupper($this->faker->unique()->bothify('PROD-####-????')), // SKU único 
        'precio' => $this->faker->randomFloat(2, 10, 1000), // Precios realistas >= 0 [cite: 250, 267]
        'stock' => $this->faker->numberBetween(0, 100), // Stock realista >= 0 [cite: 250, 267]
        'disponible' => true,
    ];
}
}
