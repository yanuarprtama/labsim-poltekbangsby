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
        Schema::create('labs', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('nama', 255)->nullable();
            $table->string('lokasi', 255)->nullable();
            $table->string('deskripsi', 255)->nullable();
            $table->string('gambar', 255)->nullable();
            $table->string('virtualtour_url', 255)->nullable();
            $table->string('prodi_id', 255)->nullable();
            $table->string('status_ketersediaan', 255)->nullable();
            $table->string('kategori', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->string('user_id', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labs');
    }
};
