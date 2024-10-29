<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->binary('image'); // Menyimpan foto dalam format biner
            $table->decimal('latitude', 10, 8); // Koordinat latitude
            $table->decimal('longitude', 11, 8); // Koordinat longitude
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->string('notes')->nullable(); // Catatan opsional
        });
    }

    public function down()
    {
        Schema::dropIfExists('absens');
    }
};

