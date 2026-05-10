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
        Schema::create('prenda_tallas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prenda_id');
            $table->unsignedBigInteger('talla_id');
            $table->timestamps();

            $table->foreign('prenda_id')->references('id')->on('prendas')->onDelete('cascade');
            $table->foreign('talla_id')->references('id')->on('tallas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prenda_tallas');
    }
};
