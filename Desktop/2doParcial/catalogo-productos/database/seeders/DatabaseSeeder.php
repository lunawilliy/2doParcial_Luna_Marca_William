<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Producto;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear 5 categorías y para cada una crear 4 productos asociados 
        Categoria::factory(5)->create()->each(function ($categoria) {
            Producto::factory(4)->create([
                'categoria_id' => $categoria->id
            ]);
        });
    }
}