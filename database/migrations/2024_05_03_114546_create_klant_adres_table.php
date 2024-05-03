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
        Schema::create('klant_adres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('klant_id');
            $table->string('straatnaam');
            $table->integer('straatnummer');
            $table->string('postcode');
            $table->string('stad');
            $table->string('land');
            $table->timestamps();

            $table->foreign('klant_id')->references('id')->on('klanten')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klant_adres');
    }
};
