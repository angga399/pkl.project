<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDftrshalatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dftrshalats', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('type'); // Jenis Shalat: Duha, Dzuhur, Ashar
            $table->date('tanggal'); // Tanggal shalat
            $table->string('hari'); // Hari shalat
            $table->time('waktu'); // Waktu otomatis dicatat
            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dftrshalats');
    }
}
