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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_room')->constrained('users')->references('id');
            $table->integer('status')->default(0);
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('url');
            $table->timestamps();

            $table->index('owner_room', 'users_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
