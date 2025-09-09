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
        Schema::create('data_update_gis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('divisi_id')->constrained('data_divisis')->cascadeOnDelete();
            $table->string('kegiatan');
            $table->string('koordinat');
            $table->string('vol');
            $table->foreignId('gate_valve_gis')->constrained('data_diameters')->cascadeOnDelete();
            $table->foreignId('gate_valve_lap')->constrained('data_diameters')->cascadeOnDelete();
            $table->foreignId('pipa_gis')->constrained('data_pipas')->cascadeOnDelete();
            $table->foreignId('pipa_lap')->constrained('data_pipas')->cascadeOnDelete();
            $table->foreignId('air_valve_gis')->constrained('data_diameters')->cascadeOnDelete();
            $table->foreignId('air_valve_lap')->constrained('data_diameters')->cascadeOnDelete();
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
        Schema::dropIfExists('data_update_gis');
    }
};
