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
        Schema::create('data_jaringan_barus', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('pekerjaan');
            $table->foreignId('divisi')->constrained('data_divisis')->cascadeOnDelete();
            $table->string('vol');
            $table->string('lokasi');
            $table->foreignId('jenis_pipa')->constrained('data_pipas')->cascadeOnDelete();
            $table->foreignId('diameter')->constrained('data_diameters')->cascadeOnDelete();
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_jaringan_barus');
    }
};
