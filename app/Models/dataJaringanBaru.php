<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany; // Tambahkan import ini

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

    public function data_divisi(): BelongsTo
    {
        return $this->belongsTo(dataDivisi::class, 'divisi');
    }

    public function jenisPipaJaringan(): HasMany
    {
        return $this->hasMany(jenispipaJaringan::class, 'data_jaringan_barus_id');
    }

    public function diameterJaringan(): HasMany
    {
        return $this->hasMany(diameterJaringan::class, 'data_jaringan_barus_id');
    }

    public function volumeJaringan(): HasMany
    {
        return $this->hasMany(volumeJaringan::class, 'data_jaringan_barus_id');
    }
}
