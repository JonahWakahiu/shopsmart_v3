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
        Schema::create('variations', function (Blueprint $table) {
            $table->comment('Product variations');
            $table->id();
            $table->json('attributes');
            $table->boolean('default')->default(false);
            $table->text('image')->nullable();
            $table->string('sku')->unique()->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->boolean('back_orders')->default(false);
            $table->boolean('manage_stock')->default(false);
            $table->integer('stock')->nullable();
            $table->integer('low_stock_threshold')->nullable();
            $table->decimal('weight', 6, 2)->nullable();
            $table->decimal('height', 6, 2)->nullable();
            $table->decimal('width', 6, 2)->nullable();
            $table->decimal('length', 6, 2)->nullable();
            $table->json('description')->nullable();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variations');
    }
};
