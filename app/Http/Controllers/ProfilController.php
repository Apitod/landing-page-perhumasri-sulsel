<?php

namespace App\Http\Controllers;

use App\Models\Periode;

class ProfilController extends Controller
{
    /**
     * Halaman utama pengurus – tampilkan periode aktif (atau terbaru).
     */
    public function pengurus()
    {
        $periodes = Periode::with(['penguruses' => fn ($q) => $q->orderBy('urutan')])
            ->orderBy('tahun_mulai', 'asc')
            ->get();

        $aktif = $periodes->firstWhere('is_aktif', true) ?? $periodes->last();

        return view('pages.profil.pengurus', compact('periodes', 'aktif'));
    }

    /**
     * Periode Pertama (2021).
     */
    public function periodePertama()
    {
        $periode = Periode::with(['penguruses' => fn ($q) => $q->orderBy('urutan')])
            ->where('tahun_mulai', 2021)
            ->firstOrFail();

        return view('pages.profil.periode-pertama', compact('periode'));
    }

    /**
     * Periode 2022-2025 – belum ada datanya, tampilkan placeholder.
     */
    public function periode2022()
    {
        $periode = Periode::with(['penguruses' => fn ($q) => $q->orderBy('urutan')])
            ->where('tahun_mulai', 2022)
            ->first();

        return view('pages.profil.periode-2022', compact('periode'));
    }

    /**
     * Periode 2025-2028 (aktif).
     */
    public function periode2025()
    {
        $periode = Periode::with(['penguruses' => fn ($q) => $q->orderBy('urutan')])
            ->where('tahun_mulai', 2025)
            ->firstOrFail();

        return view('pages.profil.periode-2025', compact('periode'));
    }
}
