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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('order_by');
            $table->string('email');
            $table->string('phone');
            $table->string('address1');
            $table->string('address2');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            $table->string('status')->default('placed');
            $table->string('tracking_no');
            $table->string('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
