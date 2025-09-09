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
        Schema::create('data_penggantian_pipas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('divisi')->constrained('data_divisis')->cascadeOnDelete();
            $table->foreignId('pipa_lama')->constrained('data_pipas')->cascadeOnDelete();
            $table->foreignId('pipa_baru')->constrained('data_pipas')->cascadeOnDelete();
            $table->foreignId('dn_lama')->constrained('data_diameters')->cascadeOnDelete();
            $table->foreignId('dn_baru')->constrained('data_diameters')->cascadeOnDelete();
            $table->string('th_pemasangan_lama');
            $table->string('th_pemasangan_baru');
            $table->string('koordinat');
            $table->string('vol_lama');
            $table->string('vol_baru');
            $table->string('lokasi');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penggantian_pipas');
    }
};
