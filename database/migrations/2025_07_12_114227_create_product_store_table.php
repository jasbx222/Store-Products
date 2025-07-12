<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_store', function (Blueprint $table) {
            $table->id();

            // ربط بالمنتج
            $table->foreignId('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            // ربط بالمخزن
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');

            // الكمية داخل هذا المخزن
            $table->integer('quantity');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_store');
    }
};
