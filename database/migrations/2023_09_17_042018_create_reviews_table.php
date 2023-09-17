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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string("product_id", 100);
            $table->unsignedInteger("rating");
            $table->string("customer_id");
            $table->text("comment");

            $table->foreign("product_id")->references("id")->on("products");
            $table->foreign("customer_id")->references("id")->on("customers");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
