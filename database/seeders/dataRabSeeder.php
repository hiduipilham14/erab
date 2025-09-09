<?php

namespace Database\Seeders;

use App\Models\dataRab;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class dataRabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('data_rabs')->insert([
        //     [
        //         'tanggal'     => now()->toDateString(),
        //         'no_spk'      => 'SPK-001',
        //         'pekerjaan'   => 'Pembuatan Saluran Air',
        //         'vol'         => '10 m3',
        //         'lokasi'      => 'Jl. Pattimura, Ambon',
        //         'rab'         => 'Rp 15.000.000',
        //         'keterangan'  => 'Proyek drainase tahap awal',
        //         'bahan'       => 'Semen, pasir',
        //         'upah'        => 'Rp 3.000.000',
        //         'jumlah'      => 'Rp 18.000.000',
        //         'gis'         => 'https://maps.example.com/?q=-3.7xxxx,128.1xxxx',
        //         'file'        => 'dokumen_rab1.pdf',
        //         'file2'       => 'gambar1.png',
        //         'file3'       => 'laporan1.docx',
        //         'created_at'  => now(),
        //         'updated_at'  => now(),
        //     ],
        // ]);
        $this->isiDataRab();
    }

    private function isiDataRab() {
        $n = 100;
        $faker = Factory::create('id_ID');
        for($i = 0; $i < $n; $i++) {
             $dateTime = $faker->dateTimeBetween('-1 year', 'now');
             $tanggal = $dateTime->format('Y-m-d');
             $rab = $faker->numberBetween(3_000_000, 20_000_000);
             $upah = $faker->numberBetween(1_00_000, 5_000_000);
            dataRab::create([
                'tanggal'     => $tanggal,
                'no_spk'      => 'SPK-' . $faker->numberBetween(1,300),
                'pekerjaan'   => 'Pembuatan ' . $faker->words(2, true),
                'vol'         => $faker->numberBetween(1,20) . ' m3',
                'lokasi'      => $faker->streetAddress(),
                'rab'         => "Rp. " . number_format($rab, 0, ',', '.'),
                'keterangan'  => $faker->words(4, true),
                'bahan'       => implode(",",$faker->words('3', false)),
                'upah'        => "Rp. " . number_format($upah, 0, ',', '.'),
                'jumlah'      => "Rp. " . number_format($rab+$upah, 0, ',', '.'),
                'gis'         => 'https://maps.example.com/?q='. $faker->longitude. ',' . $faker->latitude(),
            ]);
        }
    }
}
