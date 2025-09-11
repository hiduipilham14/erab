<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class dataUpdateGis extends Model
{
    use HasFactory;
protected $fillable = [
        'tanggal',
        'divisi_id',
        'kegiatan',
        'koordinat',
        'vol',
        'gate_valve_gis',
        'gate_valve_lap',
        'pipa_gis',
        'pipa_lap',
        'air_valve_gis',
        'air_valve_lap',
        'lokasi',
        'keterangan',
    ];

    public function divisi(): BelongsTo
    {
        return $this->belongsTo(dataDivisi::class, 'divisi_id');
    }

    // Gate Valve
    public function gateValveGis(): BelongsTo
    {
        return $this->belongsTo(dataDiameter::class, 'gate_valve_gis');
    }

    public function gateValveLap(): BelongsTo
    {
        return $this->belongsTo(dataDiameter::class, 'gate_valve_lap');
    }

    // Air Valve
    public function airValveGis(): BelongsTo
    {
        return $this->belongsTo(dataDiameter::class, 'air_valve_gis');
    }

    public function airValveLap(): BelongsTo
    {
        return $this->belongsTo(dataDiameter::class, 'air_valve_lap');
    }

    // Pipa
    public function pipaGis(): BelongsTo
    {
        return $this->belongsTo(dataPipa::class, 'pipa_gis');
    }

    public function pipaLap(): BelongsTo
    {
        return $this->belongsTo(dataPipa::class, 'pipa_lap');
    }

}
