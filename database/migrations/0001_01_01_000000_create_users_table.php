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
            $table->foreignId('periode_id')->nullable();
            $table->foreignId('angkatan_id')->nullable();
            $table->foreignId('fakultas_id')->nullable();
            $table->foreignId('prodi_id')->nullable();
            $table->foreignId('skema_id')->nullable();
            $table->foreignId('status_id')->nullable()->default('1');
            $table->string('nama');
            $table->string('nim')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('no_mhs')->unique()->nullable();
            $table->string('no_ortu')->nullable();
            $table->string('alasan')->nullable();
            // $table->string('skema')->nullable();
            // $table->enum('skema', ['kip', 'bbp']);
            // $table->string('fakultas')->nullable();
            // $table->string('angkatan')->nullable();
            // $table->string('prodi')->nullable();
            $table->enum('jenis_kelamin', ['lk', 'pr'])->nullable();
            $table->string('alamat')->nullable();
            $table->enum('role', ['mahasiswa', 'admin'])->default('mahasiswa');
            $table->enum('status', ['Mahasiswa Aktif', 'Diberhentikan', 'Alumni'])->default('Mahasiswa Aktif');
            $table->boolean('is_active')->default(false);
            // $table->string('alamat')->nullable();
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
