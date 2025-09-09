<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRab extends Model
{
    use HasFactory;
    protected $table = "data_rabs";
    protected $fillable = [
        'tanggal',
        'tanggal_pelaksana',
        'no_spk',
        'pekerjaan',
        'masa_pemeliharaan',
        'penyedia',
        'vol',
        'lokasi',
        'rab',
        'keterangan',
        'honor',
        'bahan',
        'upah',
        'jumlah',
        'gis',
        'file',
        'file2',
        'file3',
    ];

}
