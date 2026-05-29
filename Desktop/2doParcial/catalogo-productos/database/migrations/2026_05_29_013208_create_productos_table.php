<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('productos', function (Blueprint $table) {
        $table->bigIncrements('id'); // Llave primaria [cite: 250]
        // FK categorias con onDelete cascade [cite: 250, 255]
        $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade'); 
        $table->string('nombre', 150); // Obligatorio [cite: 250]
        $table->string('sku', 50)->unique(); // Obligatorio, único [cite: 250]
        $table->decimal('precio', 10, 2); // Obligatorio [cite: 250]
        $table->integer('stock'); // Obligatorio [cite: 250]
        $table->boolean('disponible')->default(true); // Por defecto true [cite: 250]
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
