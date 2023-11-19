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
        Schema::create('set_asaides', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_student');
            $table->foreign('id_student')->references('id')->on('students');

            $table->unsignedBigInteger('id_book');
            $table->foreign('id_book')->references('id')->on('books');

            $table->date('date_set_asaide');

            $table->boolean('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('set_asaides');
    }
};
