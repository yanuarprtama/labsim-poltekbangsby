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
        Schema::create('prodis', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 255)->unique();
            $table->string('nama', 255)->nullable();
            $table->string('deskripsi', 255)->nullable();
            $table->string('gambar', 255)->nullable();
            $table->enum('status', array('AKTIF', 'TIDAK AKTIF'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodis');
    }
};
