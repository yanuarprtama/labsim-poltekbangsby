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
        Schema::create('laporankerusakans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_laporan', 255)->nullable();
            $table->string('kode_item', 255)->nullable();
            $table->date('tanggal')->nullable();
            $table->enum('kategori_kerusakan', array('RINGAN', 'SEDANG', 'BERAT'))->nullable();
            $table->string('uraian', 255)->nullable();
            $table->string('gambar', 255)->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporankerusakans');
    }
};
