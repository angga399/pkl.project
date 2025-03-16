<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('daftarhdrs', function (Blueprint $table) { // Gunakan 'daftarhdr' sesuai dengan nama tabel
            $table->id();
            $table->string('hari'); // Stores the day
            $table->string('tanggal'); // Stores the date
            $table->string('nama'); // Jenis Shalat: Duha, Dzuhur, Ashar
            $table->string('pt'); // Jenis Shalat: Duha, Dzuhur, Ashar
            $table->decimal('latitude', 10, 8)->nullable(); // Koordinat Latitude
            $table->decimal('longitude', 11, 8)->nullable(); // Koordinat Longitude
            $table->text('dataGambar'); // Stores the photo data as base64
            $table->string('jenisAbsen')->default('default_value');
            $table->string('tipe');
            $table->string('status')->default('Menunggu Persetujuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftarhdrs'); // Sesuaikan dengan nama tabel yang dibuat
    }
};
