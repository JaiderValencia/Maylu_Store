<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carrito_prenda', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('prenda_talla_id');
            $table->unsignedBigInteger('carrito_id');
            $table->integer('cantidad');
            $table->timestamps();
            
            $table->foreign('prenda_talla_id')->references('id')->on('prenda_tallas')->onDelete('cascade');
            $table->foreign('carrito_id')->references('id')->on('carrito')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito_prenda');
    }
};
