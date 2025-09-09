<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataPenggantianPipa extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'divisi',
        'pipa_lama',
        'pipa_baru',
        'dn_lama',
        'dn_baru',
        'th_pemasangan_lama',
        'th_pemasangan_baru',
        'koordinat',
        'vol_lama',
        'vol_baru',
        'lokasi',
        'keterangan'
    ];

    public function data_divisi()
    {
        return $this->belongsTo(dataDivisi::class, 'divisi');
    }

    public function pipaLama()
    {
        return $this->belongsTo(dataPipa::class, 'pipa_lama');
    }

    public function pipaBaru()
    {
        return $this->belongsTo(dataPipa::class, 'pipa_baru');
    }

    public function diameterLama()
    {
        return $this->belongsTo(dataDiameter::class, 'dn_lama');
    }

    public function diameterBaru()
    {
        return $this->belongsTo(dataDiameter::class, 'dn_baru');
    }
}
