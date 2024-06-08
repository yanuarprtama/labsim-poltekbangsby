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
        Schema::create('peminjaman_alats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_peminjaman', 225)->nullable();
            $table->string('kode_item', 225)->nullable();
            $table->string('nama_pengguna', 225)->nullable();
            $table->date('tanggal_pinjam')->nullable();
            $table->date('tanggal_kembali', 225)->nullable();
            $table->string('kondisi', 225)->nullable();
            $table->enum('status', array('DITERIMA', 'PENDING', 'DITOLAK', 'DIKEMBALIKAN'))->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_alats');
    }
};
