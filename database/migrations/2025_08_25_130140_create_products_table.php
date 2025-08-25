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
            $table->string('pro_name')->unique();
            $table->unsignedBigInteger('cat_id');
            $table->string('image')->nullable();
            $table->double('price', 8, 2)->default(0.00);
            $table->integer('quantity')->default(0);
            $table->integer('discount')->default(0)->nullable();
            $table->string('description')->nullable();
            $table->foreign('cat_id')->references('id')->on('categories')->ondelete('cascade')->onUpdate('cascade');

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
