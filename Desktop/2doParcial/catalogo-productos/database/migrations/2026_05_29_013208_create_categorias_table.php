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
    Schema::create('categorias', function (Blueprint $table) {
        $table->bigIncrements('id'); // Llave primaria [cite: 248]
        $table->string('nombre', 100)->unique(); // Obligatorio, único [cite: 248]
        $table->text('descripcion')->nullable(); // Opcional [cite: 248]
        $table->boolean('activo')->default(true); // Por defecto true [cite: 248]
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
