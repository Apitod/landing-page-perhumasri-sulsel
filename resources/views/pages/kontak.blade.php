@extends('layouts.app')
@section('title', 'Kontak')
@section('meta_description', 'Hubungi Perhumasri Sulawesi Selatan untuk informasi lebih lanjut.')

@section('content')
<div class="pt-28 pb-16">
    <div class="container-site max-w-2xl">
        <div class="text-center mb-12">
            <span class="eyebrow mb-3">Hubungi Kami</span>
            <h1 class="section-heading mt-3">Kirim Pesan</h1>
            <div class="divider mx-auto mt-4"></div>
        </div>

        @if(session('sukses'))
        <div class="bg-green-50 border border-green-200 text-green-800 rounded-xl p-4 mb-6 flex items-start gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0 mt-0.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            <p class="text-sm">{{ session('sukses') }}</p>
        </div>
        @endif

        <div class="card p-8">
            <form action="{{ route('kontak.send') }}" method="POST" class="flex flex-col gap-5">
                @csrf

                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition @error('nama') border-red-400 @enderror"
                        placeholder="Nama Anda" required>
                    @error('nama')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email <span class="text-red-500">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition @error('email') border-red-400 @enderror"
                        placeholder="email@contoh.com" required>
                    @error('email')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="subjek" class="block text-sm font-medium text-gray-700 mb-1.5">Subjek <span class="text-red-500">*</span></label>
                    <input type="text" id="subjek" name="subjek" value="{{ old('subjek') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition @error('subjek') border-red-400 @enderror"
                        placeholder="Subjek pesan" required>
                    @error('subjek')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="pesan" class="block text-sm font-medium text-gray-700 mb-1.5">Pesan <span class="text-red-500">*</span></label>
                    <textarea id="pesan" name="pesan" rows="5"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition resize-none @error('pesan') border-red-400 @enderror"
                        placeholder="Tulis pesan Anda..." required>{{ old('pesan') }}</textarea>
                    @error('pesan')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                </div>

                <button type="submit" class="btn btn-primary w-full justify-center">
                    Kirim Pesan
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
