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
        Schema::create('jenispipa_jaringan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_pipa')->constrained('data_pipas')->cascadeOnDelete();
            $table->foreignId('data_jaringan_barus_id')->constrained('data_jaringan_barus')->cascadeOnDelete();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenispipa_jaringan');
    }
};
