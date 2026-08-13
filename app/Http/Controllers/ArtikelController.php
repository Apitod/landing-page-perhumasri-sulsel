<?php

namespace App\Http\Controllers;

use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::published()
            ->latest('published_at')
            ->paginate(9);

        return view('pages.artikel.index', compact('artikels'));
    }

    public function show(Artikel $artikel)
    {
        abort_unless($artikel->is_published, 404);

        $related = Artikel::published()
            ->where('id', '!=', $artikel->id)
            ->where('kategori', $artikel->kategori)
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('pages.artikel.show', compact('artikel', 'related'));
    }
}
