<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dftrshalats', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->date('tanggal');
            $table->time('duha');
            $table->time('dzuhur');
            $table->time('ashar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dftrshalats');
    }
};
