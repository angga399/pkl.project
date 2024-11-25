<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDftrshalatsTable extends Migration
{
    public function up()
    {
        Schema::create('dftrshalats', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Duha, Dzuhur, Ashar
            $table->date('tanggal');
            $table->string('hari');
            $table->time('waktu'); // Waktu otomatis dicatat
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('dftrshalat');
    }
}
