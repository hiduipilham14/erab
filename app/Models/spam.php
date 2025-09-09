<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spam extends Model
{
    use HasFactory;
    protected $table = 'spam';
    protected $guarded = [' id' ];

    public function getTanggalAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }
}
