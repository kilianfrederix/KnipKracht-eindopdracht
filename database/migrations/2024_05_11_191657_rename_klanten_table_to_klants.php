<?php

// database/migrations/rename_klanten_table_to_klants.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameKlantenTableToKlants extends Migration
{
    public function up()
    {
        Schema::rename('klanten', 'klants');
    }

    public function down()
    {
        Schema::rename('klants', 'klanten');
    }
}
