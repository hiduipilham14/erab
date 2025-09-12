<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class volumeRab extends Model
{
    use HasFactory;
    protected $table = 'volume_rab';
    protected $guarded = ['id'];
}
