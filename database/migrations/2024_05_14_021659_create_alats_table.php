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
        Schema::create('alats', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('nama', 255)->nullable();
            $table->integer('stok')->nullable();
            $table->string('deskripsi', 255)->nullable();
            $table->string('gambar', 255)->nullable();
            $table->enum('status', array('TERSEDIA', 'TIDAK TERSEDIA'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alats');
    }
};
