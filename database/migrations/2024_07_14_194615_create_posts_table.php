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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('user_id')->constrained('users')->references('id');
            $table->foreignId('category_id')->constrained('categories')->references('id');
            $table->string('description');
            $table->string('content');
            $table->string('preview_image');
            $table->string('main_image');
            $table->timestamps();


            $table->index('user_id', 'user_id_users');
            $table->index('category_id', 'category_id_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
