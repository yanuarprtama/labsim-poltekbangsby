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
        Schema::create('slider', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 255)->nullable();
            $table->string('judul', 255)->nullable();
            $table->string('deskripsi', 255)->nullable();
            $table->string('gambar', 255)->nullable();
            $table->string('url', 255)->nullable();
            $table->string('posisi', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slider');
    }
};
