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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table -> string('titulo');
            $table->unsignedBigInteger('autor_id')->nullable();
            $table->unsignedBigInteger('editorial_id')->nullable();
            $table -> foreign('autor_id')->references('id')->on('autors')->onDelete('set null');
            $table -> foreign('editorial_id')->references('id')->on('editorials')->onDelete('set null');
            $table -> text('sinopsis');
            $table -> date('ano_publicacion');
            $table -> string('isbn');
            $table -> boolean('disponible');
            $table -> double('precio');
            $table -> string('imagen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
