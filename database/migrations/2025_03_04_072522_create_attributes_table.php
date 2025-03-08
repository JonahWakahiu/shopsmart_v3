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
        Schema::create('attributes', function (Blueprint $table) {
            $table->comment('Product attributes');
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->enum('watch_type', ['label', 'color', 'image'])->nullable();
            $table->enum('watch_shape', ['square', 'rounded-corner', 'circle'])->nullable();
            $table->integer('watch_size')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};
