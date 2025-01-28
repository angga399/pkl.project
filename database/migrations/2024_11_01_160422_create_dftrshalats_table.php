<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDftrshalatsTable extends Migration
{
    public function up()
    {
        Schema::create('dftrshalats', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('jenis'); // Jenis Shalat: Duha, Dzuhur, Ashar
            $table->date('tanggal'); // Tanggal shalat
            $table->string('hari'); // Hari shalat
            $table->time('waktu'); // Waktu otomatis dicatat
            $table->timestamps(); // Created at & Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('dftrshalats');
    }

    
}
