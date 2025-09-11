<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class volumeJaringan extends Model
{
    use HasFactory;

    protected $table = 'volume_jaringan';

    protected $fillable = [
        'volume',
        'data_jaringan_barus_id',
    ];
}
