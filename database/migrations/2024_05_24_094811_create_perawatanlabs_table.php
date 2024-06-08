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
        Schema::create('perawatanlabs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lab', 255)->nullable();
            $table->date('tanggal')->nullable();
            $table->enum('jenis_perawatan', array('RINGAN', 'SEDANG', 'BERAT'));
            $table->string('keterangan', 255)->nullable();
            $table->string('gambar', 255)->nullable();
            $table->enum('status', array('PENDING', 'SELESAI', 'BATAL'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perawatanlabs');
    }
};
