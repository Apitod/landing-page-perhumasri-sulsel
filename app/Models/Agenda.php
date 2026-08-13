<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'lokasi',
        'waktu_mulai',
        'waktu_selesai',
        'is_published',
    ];

    protected $casts = [
        'tanggal'       => 'date',
        'is_published'  => 'boolean',
    ];

    // ── Scopes ──────────────────────────────────────────────────
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeMendatang($query)
    {
        return $query->where('tanggal', '>=', now()->toDateString());
    }
}
