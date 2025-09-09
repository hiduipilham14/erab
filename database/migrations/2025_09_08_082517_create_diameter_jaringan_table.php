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
        Schema::create('diameter_jaringan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diameter')->constrained('data_diameters')->cascadeOnDelete();
            $table->foreignId('data_jaringan_barus_id')->constrained('data_jaringan_barus')->cascadeOnDelete(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diameter_jaringan');
    }
};
