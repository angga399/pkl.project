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
      // database/migrations/xxxx_create_companies_table.php
Schema::create('companies', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('address');
    $table->string('phone');
    $table->timestamps();
});


// Tambahkan company_id ke users
Schema::table('users', function (Blueprint $table) {
    $table->foreignId('company_id')->nullable()->constrained();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');

    }

    
};
