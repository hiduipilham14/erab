<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class dataPenggantianPipa extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_penggantian_pipas')->insert([
            [
                'tanggal' => Carbon::now()->subDays(3),
                'divisi' => 2,
                'pipa_lama' => 1,
                'pipa_baru' => 1,
                'dn_lama' => 1,
                'dn_baru' => 1,
                'th_pemasangan_lama' => '2010',
                'th_pemasangan_baru' => '2024',
                'koordinat' => '-3.7029, 128.1748',
                'vol_lama' => '150',
                'vol_baru' => '200',
                'lokasi' => 'Jln. Contoh 1',
                'keterangan' => 'Penggantian karena kebocoran',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }



}
