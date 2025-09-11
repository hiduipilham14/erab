<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class dataDiameter extends Model
{
    use HasFactory;
    protected $fillable = ['nama','deskripsi'];

    public function dataupdategis(): HasMany
    {
        return $this->HasMany(dataUpdateGis::class);
    }
    public function datajaringanbaru(): HasMany
    {
        return $this->HasMany(dataJaringanBaru::class);
    }
        public function penggantianpipa(): HasMany
    {
        return $this->HasMany(dataPenggantianPipa::class);
    }
}
