<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('journal_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('journal_id')->constrained()->onDelete('cascade'); // Menyimpan ID jurnal yang terkait
            $table->string('action'); // Menyimpan jenis aksi (created, updated, deleted)
            $table->text('changes')->nullable(); // Menyimpan perubahan yang dilakukan (bisa dalam format JSON)
            $table->timestamps(); // Menyimpan waktu pembuatan dan pembaruan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journal_histories');
    }
};