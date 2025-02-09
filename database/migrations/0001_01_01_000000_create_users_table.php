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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['siswa', 'pembimbingpkl']);
            $table->string('full_name')->nullable(); // Nama Lengkap Siswa
            $table->date('birth_date')->nullable(); // Tanggal Lahir Siswa
            $table->string('nik')->nullable(); // NIK Peserta Didik (Siswa)
            $table->string('major')->nullable(); // Jurusan Siswa
            $table->string('phone_number')->nullable(); // No Telepon Siswa atau Pembimbing
            $table->string('location_pkl')->nullable(); // Lokasi PKL Siswa

            // Kolom untuk Pembimbing PKL
            $table->string('supervisor_name')->nullable(); // Nama Lengkap Pembimbing
            $table->string('nip')->nullable(); // Nomor Induk Perusahaan (Pembimbing)
            $table->date('birth_date_pembimbing')->nullable(); // Tanggal Lahir Pembimbing
            $table->string('rank')->nullable(); // Pangkat Pembimbing
            $table->string('company_address')->nullable(); // Alamat Perusahaan Pembimbing
            
            // Kolom umum
            $table->string('email')->unique(); // Email pengguna
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
