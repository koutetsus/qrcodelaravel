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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('photo')->nullable();
            $table->timestamps();
        });


        Schema::create('absensi_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('absensi_id')->references('id')->on('absensis')->onDelete('cascade');
            $table->string('nama');
            $table->string('kelas');
            $table->enum('status', ['Hadir', 'Tidak Hadir']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
        Schema::dropIfExists('absensi_siswa');
    }
};
