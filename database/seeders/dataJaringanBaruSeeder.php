<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class dataJaringanBaruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_jaringan_barus')->insert([
            [
                'tanggal' => Carbon::parse('2025-06-20'),
                'pekerjaan' => 'Perbaikan Pipa Bocor',
                'divisi' => 2,
                'vol' => '50 meter',
                'lokasi' => 'Jl. Pattimura',
                'jenis_pipa' => 1,
                'diameter' => 1,
                'keterangan' => 'Terdapat kebocoran besar',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
