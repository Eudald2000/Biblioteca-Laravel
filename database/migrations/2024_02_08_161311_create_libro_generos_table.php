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
        Schema::create('libro_generos', function (Blueprint $table) {
            // $table->id();
            $table -> unsignedBigInteger('libro_id');
            $table -> foreign('libro_id')->references('id')->on('libros')->onDelete('cascade');
            $table -> unsignedBigInteger('genero_id');
            $table -> foreign('genero_id')->references('id')->on('generos')->onDelete('cascade');
            $table->primary(['libro_id', 'genero_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libro_generos');
    }
};
