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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn');
            $table->string('title');
            $table->string('author');
            $table->string('editorial');
            $table->string('edition');
            $table->string('stock');

            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id')->on('categories');

            $table->unsignedBigInteger('id_subcategory');
            $table->foreign('id_subcategory')->references('id')->on('subcategories');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
