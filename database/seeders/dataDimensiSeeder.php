<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class dataDimensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_diameters')->insert([
            [
                'nama' => 'Test',
                'deskripsi' => 'Test',
            ],
        ]);
    }
}
