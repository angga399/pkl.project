<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriAbsensTable extends Migration
{
    public function up()
    {
        Schema::create('histori_absens', function (Blueprint $table) {
            $table->id();
            $table->string('tipe'); // Tipe absen, seperti 'datang' atau 'pulang'
            $table->string('hari');
            $table->date('tanggal');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->text('data_gambar'); // Gambar dalam format base64
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('histori_absens');
    }
};
