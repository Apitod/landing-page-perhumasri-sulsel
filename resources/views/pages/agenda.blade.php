@extends('layouts.app')
@section('title', 'Agenda Kegiatan')
@section('content')
<div class="pt-28 pb-16">
    <div class="container-site">
        <h1 class="section-heading mb-2">Agenda Kegiatan</h1>
        <div class="divider mb-8"></div>
        @if($agendas->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">
            @foreach($agendas as $agenda)
            <div class="card p-5 flex items-start gap-4" data-aos="fade-up">
                <div class="bg-brand-orange rounded-xl px-3 py-2 text-center text-white shrink-0">
                    <div class="text-xl font-bold leading-none">{{ $agenda->tanggal->format('d') }}</div>
                    <div class="text-xs uppercase tracking-wide font-medium">{{ $agenda->tanggal->translatedFormat('M') }}</div>
                </div>
                <div>
                    <h2 class="font-semibold text-gray-900 leading-snug">{{ $agenda->judul }}</h2>
                    @if($agenda->lokasi)<p class="text-sm text-gray-500 mt-1">{{ $agenda->lokasi }}</p>@endif
                    @if($agenda->deskripsi)<p class="text-sm text-gray-600 mt-2">{{ $agenda->deskripsi }}</p>@endif
                </div>
            </div>
            @endforeach
        </div>
        {{ $agendas->links() }}
        @else
        <div class="text-center py-20 text-gray-400"><p class="text-sm">Belum ada agenda dijadwalkan.</p></div>
        @endif
    </div>
</div>
@endsection
