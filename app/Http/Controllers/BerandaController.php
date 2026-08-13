<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Agenda;
use App\Models\Periode;

class BerandaController extends Controller
{
    public function index()
    {
        $artikelTerbaru = Artikel::published()
            ->latest('published_at')
            ->limit(3)
            ->get();

        // Tampilkan agenda mendatang, jika tidak ada fallback ke agenda terbaru
        $agendaMendatang = Agenda::published()
            ->mendatang()
            ->orderBy('tanggal')
            ->limit(3)
            ->get();

        if ($agendaMendatang->isEmpty()) {
            $agendaMendatang = Agenda::published()
                ->orderBy('tanggal', 'desc')
                ->limit(3)
                ->get();
        }

        // Pengurus inti dari periode aktif (untuk preview di beranda)
        $periodeAktif = Periode::with(['penguruses' => fn ($q) => $q->orderBy('urutan')->limit(6)])
            ->where('is_aktif', true)
            ->first();

        return view('pages.beranda', compact('artikelTerbaru', 'agendaMendatang', 'periodeAktif'));
    }
}
