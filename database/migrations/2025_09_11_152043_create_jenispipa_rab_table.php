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
        Schema::create('jenispipa_rab', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_pipa')->constrained('data_pipas')->cascadeOnDelete();
            $table->foreignId('data_rab_id')->constrained('data_rabs')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenispipa_rab');
    }
};
