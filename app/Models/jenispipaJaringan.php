<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenispipaJaringan extends Model
{
    use HasFactory;
    protected $table = 'jenispipa_jaringan';
    protected $fillable = [
        'jenis_pipa',
        'data_jaringan_barus_id',
    ];
}
