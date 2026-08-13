<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Periode extends Model
{
    protected $fillable = [
        'nama',
        'tahun_mulai',
        'tahun_selesai',
        'is_aktif',
        'keterangan',
    ];

    protected $casts = [
        'is_aktif' => 'boolean',
    ];

    public function penguruses(): HasMany
    {
        return $this->hasMany(Pengurus::class)->orderBy('urutan');
    }

    public function getLabelAttribute(): string
    {
        if ($this->tahun_selesai) {
            return "{$this->nama} ({$this->tahun_mulai}–{$this->tahun_selesai})";
        }
        return "{$this->nama} ({$this->tahun_mulai})";
    }

    public function getRangeAttribute(): string
    {
        return $this->tahun_selesai
            ? "{$this->tahun_mulai} – {$this->tahun_selesai}"
            : (string) $this->tahun_mulai;
    }
}
