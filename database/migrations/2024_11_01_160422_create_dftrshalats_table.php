<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDftrshalatsTable extends Migration
{
    public function up()
    {
        Schema::create('dftrshalat', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->date('tanggal');
            $table->time('duha');
            $table->time('dzuhur');
            $table->time('ashar');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dftrshalat');
    }
}
