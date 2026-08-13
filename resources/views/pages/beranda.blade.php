@extends('layouts.app')

@section('title', 'Beranda')
@section('meta_description', 'Perhumasri Sulsel - Persatuan Hubungan Masyarakat Rumah Sakit Indonesia Provinsi Sulawesi Selatan.')

@section('content')

{{-- ============================================================
     HERO SECTION
     ============================================================ --}}
<section class="relative min-h-[90dvh] flex items-center bg-white border-b border-gray-100" aria-label="Hero">
    <div class="container-site relative pt-32 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            {{-- Left: Content --}}
            <div class="lg:col-span-7 pr-0 lg:pr-12">

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 leading-[1.1] tracking-tight mb-6" data-aos="fade-up" data-aos-delay="80">
                    Sinergi Humas Rumah Sakit <span class="text-brand-blue">Sulawesi Selatan</span>
                </h1>

                <p class="text-lg sm:text-xl text-gray-600 leading-relaxed mb-10 max-w-2xl" data-aos="fade-up" data-aos-delay="160">
                    Menyatukan visi dan standar kompetensi praktisi Hubungan Masyarakat. Bersama mengawal kualitas informasi publik dan pelayanan kesehatan di seluruh rumah sakit se-Sulawesi Selatan.
                </p>

                <div class="flex flex-wrap gap-4" data-aos="fade-up" data-aos-delay="240">
                    <a href="{{ route('profil.pengurus') }}" class="btn btn-primary px-8 py-3.5 text-base">
                        Profil Organisasi
                    </a>
                    <a href="{{ route('artikel.index') }}" class="btn btn-outline px-8 py-3.5 text-base bg-blue">
                        Kabar Terbaru
                    </a>
                </div>

                {{-- Stats --}}
                <div class="grid grid-cols-3 gap-8 mt-16 pt-8 border-t border-gray-100" data-aos="fade-up" data-aos-delay="320">
                    <div>
                        <div class="text-3xl font-bold text-gray-900 tracking-tight">50+</div>
                        <div class="text-sm font-medium text-gray-500 mt-1">Anggota Aktif</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-gray-900 tracking-tight">30+</div>
                        <div class="text-sm font-medium text-gray-500 mt-1">RS Tergabung</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-gray-900 tracking-tight">24 Kab/Kota</div>
                        <div class="text-sm font-medium text-gray-500 mt-1">Wilayah Kerja</div>
                    </div>
                </div>
            </div>

            {{-- Right: Visual (Editorial Style) --}}
            <div class="lg:col-span-5" data-aos="fade-left" data-aos-delay="200">
                <div class="aspect-[4/5] rounded-none overflow-hidden bg-gray-100 relative group">
                    <img
                        src="{{ asset('images/foto_bersama_Heros.jpg') }}"
                        alt="Kegiatan Perhumasri Sulsel"
                        class="w-full h-full object-cover mix-blend-multiply filter grayscale-[20%] transition duration-700 group-hover:grayscale-0 group-hover:scale-105"
                        loading="eager"
                    >
                    <div class="absolute inset-0 border-[12px] border-white/20 pointer-events-none mix-blend-overlay"></div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ============================================================
     TENTANG SECTION
     ============================================================ --}}
<section class="py-24 bg-surface-warm" id="tentang" aria-label="Tentang Perhumasri Sulsel">
    <div class="container-site">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            
            {{-- Content --}}
            <div class="lg:col-span-5" data-aos="fade-right">
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight mb-6">
                    Standar Baru Komunikasi Publik Kesehatan
                </h2>
                <div class="w-12 h-1 bg-brand-orange mb-8"></div>
                
                <div class="prose prose-gray prose-p:leading-relaxed text-gray-600">
                    <p>
                        Perhumasri Sulsel lahir dari urgensi standarisasi informasi di sektor kesehatan. Kami adalah organisasi profesi independen yang menghimpun para praktisi humas rumah sakit—baik pemerintah maupun swasta.
                    </p>
                    <p>
                        Fokus utama kami bukan sekadar kehumasan konvensional, melainkan advokasi kebijakan, manajemen krisis informasi, serta pengembangan kapasitas SDM yang mampu menjembatani rumah sakit dengan kebutuhan publik secara transparan.
                    </p>
                </div>
            </div>

            {{-- 4 Pillars --}}
            <div class="lg:col-span-7" data-aos="fade-left">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-12">
                    
                    {{-- Item 1 --}}
                    <div>
                        <div class="text-brand-blue mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Standar Profesi</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">Mendorong sertifikasi dan peningkatan kompetensi teknis kehumasan bagi seluruh anggota secara berkala.</p>
                    </div>

                    {{-- Item 2 --}}
                    <div>
                        <div class="text-brand-blue mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Advokasi & Jejaring</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">Membangun solidaritas dan pertukaran informasi antar RS untuk menghadapi isu kesehatan di tingkat regional.</p>
                    </div>

                    {{-- Item 3 --}}
                    <div>
                        <div class="text-brand-blue mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Manajemen Krisis</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">Merumuskan protokol mitigasi isu dan krisis komunikasi agar respons publik terukur dan satu pintu.</p>
                    </div>

                    {{-- Item 4 --}}
                    <div>
                        <div class="text-brand-blue mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Etika Pelayanan</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">Menegakkan kode etik kehumasan RS yang mengedepankan empati, akurasi data, dan hak-hak pasien.</p>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
</section>

{{-- ============================================================
     ARTIKEL TERBARU
     ============================================================ --}}
<section class="py-24 bg-white" id="artikel" aria-label="Kabar Organisasi">
    <div class="container-site">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-16">
            <div data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Kabar Organisasi</h2>
                <div class="w-12 h-1 bg-brand-orange mt-4"></div>
            </div>
            <a href="{{ route('artikel.index') }}" class="text-sm font-semibold text-brand-blue hover:text-brand-blue-dark transition-colors inline-flex items-center gap-1" data-aos="fade-up">
                Lihat Seluruh Arsip
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>

        @if(isset($artikelTerbaru) && $artikelTerbaru->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-12">
            @foreach($artikelTerbaru as $i => $artikel)
            <article class="group" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="aspect-[16/10] overflow-hidden bg-gray-100 mb-5">
                    @if($artikel->gambar)
                    <img src="{{ Storage::url($artikel->gambar) }}" alt="{{ $artikel->judul }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    @else
                    <div class="w-full h-full flex items-center justify-center text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                    </div>
                    @endif
                </div>
                <div>
                    <div class="flex items-center gap-3 text-xs font-semibold uppercase tracking-wider text-gray-500 mb-3">
                        <span class="text-brand-orange">{{ $artikel->kategori ?? 'Berita' }}</span>
                        <span>&mdash;</span>
                        <time datetime="{{ $artikel->created_at->format('Y-m-d') }}">{{ $artikel->created_at->format('d M Y') }}</time>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 leading-snug group-hover:text-brand-blue transition-colors">
                        <a href="{{ route('artikel.show', $artikel->slug) }}" class="focus:outline-none">
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            {{ $artikel->judul }}
                        </a>
                    </h3>
                    <p class="text-sm text-gray-600 line-clamp-2 leading-relaxed">
                        {{ Str::limit(strip_tags($artikel->konten), 120) }}
                    </p>
                </div>
            </article>
            @endforeach
        </div>
        @else
        <div class="border-t border-b border-gray-100 py-16 text-center text-gray-400" data-aos="fade-up">
            <p class="text-base">Arsip publikasi masih kosong.</p>
        </div>
        @endif
    </div>
</section>

{{-- ============================================================
     AGENDA SECTION
     ============================================================ --}}
<section class="py-24 bg-gray-900" id="agenda" aria-label="Jadwal Giat">
    <div class="container-site">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16">
            <div data-aos="fade-up">
                <h2 class="text-3xl font-bold text-white tracking-tight">Jadwal Giat</h2>
                <div class="w-12 h-1 bg-brand-orange mt-4"></div>
            </div>
        </div>

        @if(isset($agendaMendatang) && $agendaMendatang->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t border-gray-800 pt-8">
            @foreach($agendaMendatang as $i => $agenda)
            <div class="group flex flex-col sm:flex-row gap-6 p-6 transition hover:bg-gray-800" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="shrink-0 w-16 text-center">
                    <span class="block text-3xl font-bold text-white mb-1">{{ $agenda->tanggal->format('d') }}</span>
                    <span class="block text-xs font-semibold text-brand-orange uppercase tracking-wider">{{ $agenda->tanggal->translatedFormat('M Y') }}</span>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-white mb-2 leading-snug">{{ $agenda->judul }}</h3>
                    <div class="flex flex-col gap-1.5 text-sm text-gray-400">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                            {{ $agenda->lokasi }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-12 text-center" data-aos="fade-up">
            <a href="{{ route('agenda') }}" class="btn btn-outline text-white border-gray-700 hover:bg-white hover:text-gray-900 px-8 py-3.5">
                Lihat Kalender Lengkap
            </a>
        </div>
        @else
        <div class="border-t border-gray-800 pt-16 pb-8 text-center text-gray-500" data-aos="fade-up">
            <p>Tidak ada jadwal giat dalam waktu dekat.</p>
        </div>
        @endif
    </div>
</section>

{{-- ============================================================
     CTA SECTION
     ============================================================ --}}
<section class="py-24 bg-brand-blue" aria-label="Registrasi Anggota">
    <div class="container-site">
        <div class="max-w-3xl mx-auto text-center" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6 tracking-tight">
                Kuatkan Jejaring Humas Rumah Sakit Anda
            </h2>
            <p class="text-brand-blue-50 text-lg mb-10 leading-relaxed text-blue-100">
                Akses pelatihan eksklusif, protokol manajemen krisis standar, dan forum diskusi rutin bersama praktisi kehumasan dari 30+ institusi kesehatan di Sulawesi Selatan.
            </p>
            <a href="{{ route('kontak') }}" class="btn bg-white text-brand-blue hover:bg-gray-50 px-10 py-4 text-base font-bold shadow-lg shadow-black/10">
                Hubungi Kami!
            </a>
        </div>
    </div>
</section>

@endsection
