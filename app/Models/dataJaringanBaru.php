<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class dataJaringanBaru extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'pekerjaan',
        'divisi',
        'vol',
        'koordinat',
        'lokasi',
        'jenis_pipa',
        'diameter',
        'keterangan',
    ];

    public function data_divisi()
    {
        return $this->belongsTo(dataDivisi::class, 'divisi');
    }

    public function data_pipas()
    {
        return $this->belongsTo(dataPipa::class, 'jenis_pipa');
    }

    public function data_diameters()
    {
        return $this->belongsTo(dataDiameter::class, 'diameter');
    }

}
