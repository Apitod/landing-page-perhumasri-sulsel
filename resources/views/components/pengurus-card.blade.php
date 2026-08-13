{{--
    Pengurus Card Component
    Props: $pg (Pengurus model), $delay (int, AOS delay ms)
--}}
@php $delay = $delay ?? 0; @endphp
<div class="group text-center" data-aos="fade-up" data-aos-delay="{{ $delay }}">

    {{-- Avatar --}}
    <div class="relative mx-auto mb-4 w-20 h-20 sm:w-24 sm:h-24">
        <div class="w-full h-full rounded-full overflow-hidden bg-brand-blue/10 ring-2 ring-white shadow-md transition-all duration-300 group-hover:ring-brand-orange/30 group-hover:shadow-lg">
            @if($pg->foto)
                <img
                    src="{{ Storage::url($pg->foto) }}"
                    alt="Foto {{ $pg->nama }}"
                    class="w-full h-full object-cover"
                    loading="lazy"
                >
            @else
                {{-- Placeholder: initials avatar --}}
                @php
                    $parts = explode(' ', $pg->nama);
                    $initials = strtoupper(substr($parts[0], 0, 1) . (isset($parts[1]) ? substr($parts[1], 0, 1) : ''));
                @endphp
                <div class="w-full h-full flex items-center justify-center bg-brand-blue text-white font-bold text-lg">
                    {{ $initials }}
                </div>
            @endif
        </div>

        {{-- Role indicator for inti positions --}}
        @if(in_array(strtolower($pg->jabatan), ['ketua', 'wakil ketua', 'sekretaris', 'bendahara']))
        <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-brand-orange rounded-full border-2 border-white flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="white"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        </div>
        @endif
    </div>

    {{-- Info --}}
    <div class="px-1">
        <p class="font-bold text-sm text-gray-900 leading-snug mb-1 group-hover:text-brand-blue transition-colors">
            {{ $pg->nama }}
        </p>
        <p class="text-xs font-semibold text-brand-orange uppercase tracking-wide">
            {{ $pg->jabatan }}
        </p>
        @if($pg->instansi)
        <p class="text-xs text-gray-400 mt-1 leading-snug">{{ $pg->instansi }}</p>
        @endif
    </div>

</div>
