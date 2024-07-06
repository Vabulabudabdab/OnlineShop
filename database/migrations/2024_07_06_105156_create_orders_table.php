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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product')->constrained('products')->references('id');
            $table->foreignId('user')->constrained('users')->references('id');
            $table->foreignId('status')->constrained('payment_status')->references('id');
            $table->timestamps();

            $table->index('user', 'user_users_idx');
            $table->index('product', 'product_products_idx');
            $table->index('status', 'status_payment_status_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
