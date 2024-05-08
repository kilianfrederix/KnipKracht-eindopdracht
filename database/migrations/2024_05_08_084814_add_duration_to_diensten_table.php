<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDurationToDienstenTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('diensten', function (Blueprint $table) {
            $table->integer('duration')->nullable(); // Toegevoegde kolom voor tijdsduur in minuten
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('diensten', function (Blueprint $table) {
            $table->dropColumn('duration'); // Verwijder de toegevoegde kolom als de migratie wordt teruggedraaid
        });
    }
}
