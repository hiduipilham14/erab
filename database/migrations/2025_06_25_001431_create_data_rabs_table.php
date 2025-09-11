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
        Schema::create('data_rabs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_input');
            $table->date('tanggal_awal');
            $table->date('tanggal_selesai');
            
            // Data SPK
            $table->string('no_spk');
            // Data teknis pekerjaan
            $table->string('masa_pemeliharaan')->nullable();
            $table->string('penyedia_pipa')->nullable();
            // File uploads
            $table->string('file_spk')->nullable();
            $table->string('file_ded')->nullable();
            $table->string('file_rab')->nullable();
            // Data biaya
            $table->decimal('honor', 15, 2)->default(0);
            $table->decimal('rab', 15, 2)->default(0);
            $table->decimal('bahan', 15, 2)->default(0);
            $table->decimal('upah', 15, 2)->default(0);
            $table->decimal('jumlah', 15, 2)->default(0);
            // Data GIS
            $table->string('gis')->nullable();
            $table->string('pekerjaan_gis')->nullable();
            $table->string('lokasi_gis')->nullable();
            $table->text('keterangan_gis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_rabs');
    }
};
