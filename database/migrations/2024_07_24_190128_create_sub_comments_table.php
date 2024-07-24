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
        Schema::create('sub_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('comments')->references('post_id');
            $table->foreignId('comment_id')->constrained('comments')->references('id');
            $table->string('message');
            $table->foreignId('user_id')->constrained('users')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_comments');
    }
};
