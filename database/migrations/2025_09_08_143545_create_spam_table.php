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
        Schema::create('spam', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->text('lokasi');
            $table->string('koordinat');
            $table->text('kondisi_existing');
            $table->text('permasalahan');
            $table->text('tindak_lanjut');
            $table->string('file_existing')->nullable();
            $table->string('file_permasalahan')->nullable();
            $table->string('file_tindak_lanjut')->nullable();
            $table->string('file_spam')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spam');
    }
};
