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
$table->foreignId('user_id')->constrained()->onDelete('cascade');
$table->string('hari');
$table->string('tanggal');
$table->string('nama');
$table->string('pt');
$table->decimal('latitude', 10, 8)->nullable();
$table->decimal('longitude', 11, 8)->nullable();
$table->text('dataGambar');
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
