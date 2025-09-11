<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DataUpdateGis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class dataUpdateGisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_update_gis')->insert([
            'tanggal' => Carbon::now()->toDateString(),
            'divisi_id' => 1, // pastikan ID ini ada di tabel data_divisis
            'kegiatan' => 'Pemasangan Pipa Baru',
            'koordinat' => '-3.654321, 128.123456',
            'vol' => '150m',
            'gate_valve_gis' => 1, // pastikan ID ini ada di data_diameters
            'gate_valve_lap' => 1,
            'pipa_gis' => 1, // pastikan ID ini ada di data_pipas
            'pipa_lap' => 1,
            'air_valve_gis' => 1,
            'air_valve_lap' => 1,
            'lokasi' => 'Jl. Sultan Babullah, Ambon',
            'keterangan' => 'Proyek tahap 1',
        ]);
    }
}
