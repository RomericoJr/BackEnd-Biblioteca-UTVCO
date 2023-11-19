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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname_father');
            $table->string('lastname2_mother');
            $table->string('matricula');
            $table->string('phone');
            $table->string('email');
            $table->string('password');

            $table->unsignedBigInteger('id_genere');
            $table->foreign('id_genere')->references('id')->on('generes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
