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
        Schema::create('daftarhdrs', function (Blueprint $table) {
           $table->id();
            $table->string('hari'); // Stores the day
            $table->string('tanggal'); // Stores the date
            $table->decimal('latitude', 10, 8)->nullable(); // Stores latitude
            $table->decimal('longitude', 11, 8)->nullable(); // Stores longitude
            $table->text('dataGambar'); // Stores the photo data as base64
            $table->string('jenisAbsen')->default('default_value');
            $table->string('tipe');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftarhdrs');
        Schema::table('daftarhdr', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
