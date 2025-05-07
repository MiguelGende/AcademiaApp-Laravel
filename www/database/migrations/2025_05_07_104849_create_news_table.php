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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); // created_at y updated_at
            $table->string('tittle',255)->unique(); // Titulo de la noticia
            $table->text('content'); // Contenido HTML o texto largo
            $table->boolean('is_published')->default(false); // Esta publicada?
            $table->timestamp('published_at')->nullable(); // Fecha de publicacion
            $table->softDeletes(); // deleted_at (borrado logico)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
