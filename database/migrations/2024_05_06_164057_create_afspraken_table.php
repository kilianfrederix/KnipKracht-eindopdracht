<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfsprakenTable extends Migration
{
    public function up()
    {
        Schema::create('afspraken', function (Blueprint $table) {
            $table->id();
            $table->string('behandeling');
            $table->string('kapper');
            $table->date('datum');
            $table->time('tijd');
            $table->string('naam');
            $table->string('email');
            $table->string('telefoon');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('afspraken');
    }
}
