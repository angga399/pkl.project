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
    Schema::table('daftarhdrs', function (Blueprint $table) {
        $table->timestamp('approved_at')->nullable()->after('status');
        $table->foreignId('pembimbing_id')->nullable()->constrained('users');
    });
}
    /**
     * Reverse the migrations.
     */
   public function down()
{
    Schema::table('daftarhdrs', function (Blueprint $table) {
        $table->dropColumn(['approved_at', 'pembimbing_id']);
    });
}
};
