<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisPipaRab extends Model
{
    use HasFactory;
    protected $table = 'jenispipa_rab';
    protected $guarded = ['id'];

    public function dataPipa()
    {
        return $this->belongsTo(dataPipa::class, 'jenis_pipa');
    }
}
