<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengurus extends Model
{
    protected $fillable = [
        'periode_id',
        'nama',
        'jabatan',
        'bidang',
        'foto',
        'instansi',
        'urutan',
    ];

    protected $casts = [
        'urutan' => 'integer',
    ];

    public function periode(): BelongsTo
    {
        return $this->belongsTo(Periode::class);
    }
}
