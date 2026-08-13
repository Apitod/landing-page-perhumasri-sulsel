@extends('layouts.app')
@section('title', $artikel->judul)
@section('meta_description', Str::limit(strip_tags($artikel->konten), 160))

@section('content')
<div class="pt-28">
    <div class="container-site max-w-3xl">
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-gray-500 mb-6" aria-label="Breadcrumb">
            <a href="{{ route('beranda') }}" class="hover:text-brand-orange transition-colors">Beranda</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            <a href="{{ route('artikel.index') }}" class="hover:text-brand-orange transition-colors">Artikel</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            <span class="text-gray-900 truncate max-w-[200px]">{{ $artikel->judul }}</span>
        </nav>

        <span class="text-xs font-medium text-brand-orange bg-orange-50 px-2.5 py-1 rounded-full">{{ $artikel->kategori }}</span>

        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mt-4 mb-4 leading-tight">{{ $artikel->judul }}</h1>

        <div class="flex items-center gap-4 text-sm text-gray-500 mb-8 pb-6 border-b border-gray-100">
            @if($artikel->penulis)
            <span class="flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                {{ $artikel->penulis }}
            </span>
            @endif
            <span class="flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                {{ ($artikel->published_at ?? $artikel->created_at)->translatedFormat('d F Y') }}
            </span>
        </div>

        @if($artikel->gambar)
        <img src="{{ Storage::url($artikel->gambar) }}" alt="{{ $artikel->judul }}" class="w-full rounded-2xl mb-8 object-cover max-h-[420px]">
        @endif

        {{-- Article content --}}
        <div class="prose prose-gray max-w-none prose-headings:font-bold prose-a:text-brand-orange mb-12">
            {!! $artikel->konten !!}
        </div>

        {{-- Related --}}
        @if($related->count() > 0)
        <div class="border-t border-gray-100 pt-10 pb-16">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Artikel Terkait</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                @foreach($related as $rel)
                <a href="{{ route('artikel.show', $rel->slug) }}" class="group card p-4 block">
                    <div class="font-semibold text-sm text-gray-900 line-clamp-2 group-hover:text-brand-orange transition-colors leading-snug">{{ $rel->judul }}</div>
                    <div class="text-xs text-gray-400 mt-2">{{ $rel->created_at->diffForHumans() }}</div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
