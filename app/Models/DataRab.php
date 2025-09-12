<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRab extends Model
{
    use HasFactory;
    protected $table = "data_rabs";
    protected $guarded = ['id'];

    public function jenisPipa(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(jenisPipaRab::class, 'data_rab_id');
    }

    public function diameter(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(diameterRab::class, 'data_rab_id');
    }

    public function volume(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(volumeRab::class, 'data_rab_id');
    }

}
