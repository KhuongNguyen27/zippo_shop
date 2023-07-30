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
            $table->text('image');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->text('description');
            $table->bigInteger('quantity');
            $table->float('discount')->nullable();
            $table->bigInteger('price');
            $table->tinyInteger('status')->default(0);
            $table->integer('selled')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
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
