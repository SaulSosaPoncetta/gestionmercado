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
        Schema::create('producto_imagens', function (Blueprint $table) {
            $table->id();
            // Crea la columna producto_id como clave foránea hacia productos.id
            // y elimina en cascada los registros relacionados al borrar un producto
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');    
            $table->string('imagen'); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_imagens');
    }
};
