<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDienstAndKapperToBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->foreignId('dienst_id')->constrained('diensten')->onDelete('cascade');
            $table->foreignId('kapper_id')->constrained('kappers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['dienst_id']);
            $table->dropForeign(['kapper_id']);
            $table->dropColumn(['dienst_id', 'kapper_id']);
        });
    }
}
