<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWaktuColumnInDftrshalatsTable extends Migration
{
    public function up()
    {
        Schema::table('dftrshalats', function (Blueprint $table) {
            $table->time('waktu')->change();
        });
    }

    public function down()
    {
        Schema::table('dftrshalats', function (Blueprint $table) {
            $table->string('waktu')->change();
        });
    }
}

