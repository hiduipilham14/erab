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
            $table->date('tanggal');
            $table->string('no_spk');
            $table->string('pekerjaan');
            $table->string('vol');
            $table->string('lokasi');
            $table->string('rab');
            $table->string('keterangan');
            $table->string('bahan');
            $table->string('upah');
            $table->string('jumlah');
            $table->string('gis');
            $table->string('file')->nullable();
            $table->string('file2')->nullable();
            $table->string('file3')->nullable();

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
