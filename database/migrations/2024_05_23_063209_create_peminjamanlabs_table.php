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
        Schema::create('peminjamanlabs', function (Blueprint $table) {
            $table->id();
            $table->integer('lab_id')->nullable();
            $table->string('nomor_peminjaman', 255)->nullable();
            $table->string('mata_kuliah', 255)->nullable();
            $table->dateTime('waktu_mulai', $precision = 0);
            $table->dateTime('waktu_selesai', $precision = 0);
            $table->string('course', 255)->nullable();
            $table->string('praktikum', 255)->nullable();
            $table->string('dosen_pengajar', 255)->nullable();
            $table->string('jenis_peminjaman', 255)->nullable();
            $table->string('jenis_pengguna', 255)->nullable();
            $table->string('nama_pengguna', 255)->nullable();
            $table->string('nit_pengguna', 255)->nullable();
            $table->string('email_pengguna', 255)->nullable();
            $table->integer('jumlah_peserta')->nullable();
            $table->string('keterangan', 255)->nullable();
            $table->enum('status', array('PENDING', 'DITERIMA', 'DIKEMBALIKAN', 'DITOLAK', 'KADALUWARSA'))->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamanlabs');
    }
};
