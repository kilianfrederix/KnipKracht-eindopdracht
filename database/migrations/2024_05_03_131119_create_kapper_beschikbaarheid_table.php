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
        Schema::create('kapper_beschikbaarheid', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kapper_id');
            $table->dateTime('start_tijd');
            $table->dateTime('eind_tijd');
            $table->timestamps();

            $table->foreign('kapper_id')->references('id')->on('kappers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kapper_beschikbaarheid');
    }
};
