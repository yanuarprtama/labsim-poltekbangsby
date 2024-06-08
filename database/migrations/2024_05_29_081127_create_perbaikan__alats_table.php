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
        Schema::create('perbaikan_alats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_laporan', 255)->nullable();
            $table->string('kode_item', 255)->nullable();
            $table->date('tanggal_perbaikan')->nullable();
            $table->enum('kategori', array('RINGAN', 'SEDANG', 'BERAT'))->nullable();
            $table->string('penyebab', 255)->nullable();
            $table->string('tindakan_perbaikan', 255)->nullable();
            $table->string('kode_hambatan', 255)->nullable();
            $table->string('gambar', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perbaikan__alats');
    }
};
