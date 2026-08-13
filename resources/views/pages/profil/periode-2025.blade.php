@extends('layouts.app')
@section('title', 'Pengurus Periode 2025–2028')
@section('meta_description', 'Susunan pengurus PERHUMASRI Wilayah Sulawesi Selatan Periode Aktif 2025–2028.')

@section('content')
<div class="pt-36 pb-16 bg-surface-warm min-h-screen">
    <div class="container-site">
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">
            <a href="{{ route('beranda') }}" class="hover:text-brand-orange transition-colors">Beranda</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            <a href="{{ route('profil.pengurus') }}" class="hover:text-brand-orange transition-colors">Pengurus</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            <span class="text-gray-900 font-medium">Periode 2025–2028</span>
        </div>

        <div class="mb-10" data-aos="fade-up">
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-green-50 text-green-700 text-xs font-bold uppercase tracking-wide mb-4">
                <span class="inline-block w-1.5 h-1.5 rounded-full bg-green-500"></span>
                Periode Aktif
            </div>
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight mb-2">{{ $periode->nama }}</h1>
            <p class="text-brand-orange font-semibold">{{ $periode->range }}</p>
            @if($periode->keterangan)
            <p class="text-sm text-gray-500 mt-2 max-w-xl">{{ $periode->keterangan }}</p>
            @endif
        </div>

        @php
            $inti = $periode->penguruses->whereNull('bidang')->values();
            $perBidang = $periode->penguruses->whereNotNull('bidang')->groupBy('bidang');
        @endphp

        @if($inti->isNotEmpty())
        <div class="mb-12">
            <h2 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-8 flex items-center gap-3">
                <span class="block h-px flex-1 bg-gray-200"></span>Pengurus Inti<span class="block h-px flex-1 bg-gray-200"></span>
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @foreach($inti as $i => $pg)
                @include('components.pengurus-card', ['pg' => $pg, 'delay' => $i * 60])
                @endforeach
            </div>
        </div>
        @endif

        @foreach($perBidang as $namaBidang => $anggota)
        <div class="mb-10">
            <h2 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-8 flex items-center gap-3">
                <span class="block h-px flex-1 bg-gray-200"></span>{{ $namaBidang }}<span class="block h-px flex-1 bg-gray-200"></span>
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @foreach($anggota as $i => $pg)
                @include('components.pengurus-card', ['pg' => $pg, 'delay' => $i * 60])
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
