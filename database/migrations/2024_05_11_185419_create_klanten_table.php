<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlantenTable extends Migration
{
    public function up()
    {
        Schema::create('klanten', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('email')->unique();
            $table->string('nummer');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('klanten');
    }
}
