@extends('layouts.app')
@section('title', 'Pengurus')
@section('meta_description', 'Daftar pengurus PERHUMASRI Wilayah Sulawesi Selatan di setiap periode kepengurusan.')

@section('content')

{{-- ============================================================
     HERO SECTION
     ============================================================ --}}
<section class="relative pt-36 pb-16 bg-white border-b border-gray-100" aria-label="Profil Pengurus">
    <div class="container-site">
        <div class="max-w-3xl" data-aos="fade-up">
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-5">
                <a href="{{ route('beranda') }}" class="hover:text-brand-orange transition-colors">Beranda</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                <span class="text-gray-900 font-medium">Profil Pengurus</span>
            </div>
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 tracking-tight leading-[1.1] mb-5">
                Pengurus <span class="text-brand-blue">PERHUMASRI</span> Sulsel
            </h1>
            <p class="text-lg text-gray-600 leading-relaxed">
                Susunan pengurus wilayah Sulawesi Selatan yang menjalankan organisasi, mengembangkan kompetensi anggota, dan mengawal standar etika profesi kehumasan rumah sakit.
            </p>
        </div>
    </div>
</section>

{{-- ============================================================
     PERIODE TABS + PENGURUS GRID
     ============================================================ --}}
<div x-data="pengurusApp()" class="bg-surface-warm min-h-[60vh]">

    {{-- Tab Navigation --}}
    <div class="sticky top-[72px] z-30 bg-white border-b border-gray-100 shadow-sm" aria-label="Navigasi periode">
        <div class="container-site">
            <div class="flex items-center gap-1 overflow-x-auto py-1 scrollbar-none" role="tablist" aria-label="Periode kepengurusan">
                @foreach($periodes as $p)
                <button
                    role="tab"
                    :aria-selected="aktifId === {{ $p->id }}"
                    @click="aktifId = {{ $p->id }}"
                    class="shrink-0 px-5 py-3 text-sm font-semibold rounded-none border-b-2 transition-all duration-200 whitespace-nowrap focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-orange"
                    :class="aktifId === {{ $p->id }}
                        ? 'border-brand-orange text-brand-orange'
                        : 'border-transparent text-gray-500 hover:text-gray-800'"
                >
                    {{ $p->nama }}
                    @if($p->is_aktif)
                    <span class="ml-1.5 inline-flex items-center px-1.5 py-0.5 rounded-full text-[10px] font-bold bg-green-100 text-green-700">Aktif</span>
                    @endif
                </button>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Content per periode --}}
    @foreach($periodes as $periode)
    <div
        x-show="aktifId === {{ $periode->id }}"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        class="container-site py-16"
        role="tabpanel"
        aria-label="Pengurus {{ $periode->nama }}"
    >

        {{-- Periode header --}}
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-12" data-aos="fade-up">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight">{{ $periode->nama }}</h2>
                <p class="text-brand-orange font-semibold mt-1">{{ $periode->range }}</p>
                @if($periode->keterangan)
                <p class="text-sm text-gray-500 mt-2 max-w-xl">{{ $periode->keterangan }}</p>
                @endif
            </div>
            <div class="text-sm text-gray-500">
                {{ $periode->penguruses->count() }} orang pengurus
            </div>
        </div>

        @php
            // Inti pengurus (tanpa bidang)
            $inti = $periode->penguruses->whereNull('bidang')->values();
            // Kelompokkan per bidang
            $perBidang = $periode->penguruses->whereNotNull('bidang')->groupBy('bidang');
        @endphp

        {{-- ── Pengurus Inti ── --}}
        @if($inti->isNotEmpty())
        <div class="mb-14" data-aos="fade-up">
            <h3 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-8 flex items-center gap-3">
                <span class="block h-px flex-1 bg-gray-200"></span>
                Pengurus Inti
                <span class="block h-px flex-1 bg-gray-200"></span>
            </h3>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @foreach($inti as $i => $pg)
                @include('components.pengurus-card', ['pg' => $pg, 'delay' => $i * 60])
                @endforeach
            </div>
        </div>
        @endif

        {{-- ── Per Bidang ── --}}
        @foreach($perBidang as $namaBidang => $anggota)
        <div class="mb-12" data-aos="fade-up">
            <h3 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-8 flex items-center gap-3">
                <span class="block h-px flex-1 bg-gray-200"></span>
                {{ $namaBidang }}
                <span class="block h-px flex-1 bg-gray-200"></span>
            </h3>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @foreach($anggota as $i => $pg)
                @include('components.pengurus-card', ['pg' => $pg, 'delay' => $i * 60])
                @endforeach
            </div>
        </div>
        @endforeach

        @if($periode->penguruses->isEmpty())
        <div class="text-center py-20 text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 text-gray-300" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            <p class="text-base font-medium text-gray-500">Data pengurus belum dimasukkan.</p>
            <p class="text-sm mt-1">Silakan tambahkan melalui panel admin.</p>
        </div>
        @endif

    </div>
    @endforeach

</div>

@push('scripts')
<script>
function pengurusApp() {
    return {
        aktifId: {{ $aktif?->id ?? ($periodes->first()?->id ?? 0) }},
    };
}
</script>
@endpush

@endsection
