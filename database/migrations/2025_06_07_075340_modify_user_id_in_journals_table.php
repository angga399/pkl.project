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
    Schema::table('journals', function (Blueprint $table) {
        // Jika kolom sudah ada tapi belum sebagai foreign key
        if (Schema::hasColumn('journals', 'user_id')) {
            $table->foreignId('user_id')
                  ->nullable()
                  ->change();
        } else {
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained()
                  ->after('id');
        }
    });
}

public function down()
{
    Schema::table('journals', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
    });
}
};
