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
        if (!Schema::hasTable('food')) {
            Schema::create('food', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->longText('ingredients');
                $table->float('price');
                $table->string('image');
                $table->unsignedInteger('category_id');
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                $table->timestamps();
            });
     }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
