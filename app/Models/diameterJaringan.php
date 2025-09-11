<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diameterJaringan extends Model
{
    use HasFactory;
    protected $table = 'diameter_jaringan';
    protected $fillable = [
        'diameter',
        'data_jaringan_barus_id',
    ];

    public function dataDiameter()
    {
        return $this->belongsTo(dataDiameter::class, 'diameter');
    }
}
