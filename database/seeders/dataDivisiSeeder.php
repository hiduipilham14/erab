<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class dataDivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_divisis')->insert([
            [
                'nama' => 'Test',
                'deskripsi' => 'Test',
            ],
        ]);
    }
}
