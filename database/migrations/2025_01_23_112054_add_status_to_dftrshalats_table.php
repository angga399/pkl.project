<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToDftrshalatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dftrshalats', function (Blueprint $table) {
            $table->string('status')->default('Menunggu'); // Menambahkan kolom status
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dftrshalats', function (Blueprint $table) {
            $table->dropColumn('status'); // Menghapus kolom status jika migrasi dibatalkan
        });
    }
}