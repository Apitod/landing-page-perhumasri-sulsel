@extends('layouts.app')
@section('title', 'Liputan & Artikel')
@section('meta_description', 'Baca liputan dan artikel terbaru dari Perhumasri Sulawesi Selatan.')

@section('content')
<div class="pt-28 pb-4">
    <div class="container-site">
        <div class="mb-10">
            <span class="eyebrow mb-3">Informasi</span>
            <h1 class="section-heading mt-3">Liputan &amp; Artikel</h1>
            <div class="divider mt-4"></div>
        </div>

        @if($artikels->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            @foreach($artikels as $i => $artikel)
            <article class="card" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 80 }}">
                @if($artikel->gambar)
                <img src="{{ Storage::url($artikel->gambar) }}" alt="{{ $artikel->judul }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                </div>
                @endif
                <div class="p-5">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-xs font-medium text-brand-orange bg-orange-50 px-2.5 py-1 rounded-full">{{ $artikel->kategori }}</span>
                        <span class="text-xs text-gray-400">{{ $artikel->created_at->diffForHumans() }}</span>
                    </div>
                    <h2 class="font-semibold text-gray-900 mb-2 line-clamp-2 leading-snug">
                        <a href="{{ route('artikel.show', $artikel->slug) }}" class="hover:text-brand-orange transition-colors">{{ $artikel->judul }}</a>
                    </h2>
                    <p class="text-sm text-gray-500 line-clamp-2 leading-relaxed">{{ Str::limit(strip_tags($artikel->konten), 100) }}</p>
                    <a href="{{ route('artikel.show', $artikel->slug) }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-brand-orange mt-4">
                        Baca selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
        {{ $artikels->links() }}
        @else
        <div class="text-center py-20 text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-4 text-gray-300"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/></svg>
            <p class="text-sm">Belum ada artikel yang diterbitkan.</p>
        </div>
        @endif
    </div>
</div>
@endsection
