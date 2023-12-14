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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('slug');
            $table->string('quantity');
            $table->string('original_price');
            $table->string('selling_price');
            $table->string('discount')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->string('trending')->default('0');
            $table->string('image');
            $table->string('current_status')->default('available');
            $table->mediumText('small_description')->nullable();
            $table->longText('description')->nullable();
            $table->mediumText('meta_title');
            $table->mediumText('meta_keywords');
            $table->mediumText('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
