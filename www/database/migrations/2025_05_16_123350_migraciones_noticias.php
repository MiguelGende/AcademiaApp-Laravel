<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 255)->unique();
            $table->integer('author')->nullable();
            $table->text('content');
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 50);
            $table->string('description', 255)->nullable();
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
        });

        Schema::create('news_has_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('news_id');
            $table->unsignedBigInteger('categories_id');

            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');

            $table->primary(['news_id', 'categories_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_has_categories');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('news');
    }
};
