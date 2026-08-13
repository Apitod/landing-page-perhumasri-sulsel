<footer class="bg-gray-900 text-gray-300">

    {{-- Main Footer --}}
    <div class="container-site py-14">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

            {{-- Brand col --}}
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <img src="/logo.jpg" alt="Logo Perhumasri Sulsel" class="w-10 h-10 object-contain rounded-lg">
                    <div class="leading-tight">
                        <div class="font-bold text-base text-white leading-none">Perhumasri Sulsel</div>
                        <div class="text-xs text-gray-400 font-medium">Sulawesi Selatan</div>
                    </div>
                </div>
                <p class="text-sm leading-relaxed text-gray-400 max-w-sm mb-6">
                    Persatuan Hubungan Masyarakat Rumah Sakit Indonesia Provinsi Sulawesi Selatan. Bersama membangun komunikasi kesehatan yang lebih baik.
                </p>
                <div class="flex items-center gap-3">
                    <a href="https://www.instagram.com/perhumasrisulsel?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener" aria-label="Instagram Perhumasri Sulsel" class="w-9 h-9 flex items-center justify-center rounded-full bg-white/10 text-gray-400 hover:bg-brand-orange hover:text-white transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                    </a>
                    <a href="#" aria-label="YouTube Perhumasri Sulsel" class="w-9 h-9 flex items-center justify-center rounded-full bg-white/10 text-gray-400 hover:bg-brand-orange hover:text-white transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.6C5.12 20.06 12 20.06 12 20.06s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.95A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon fill="white" points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg>
                    </a>
                </div>
            </div>

            {{-- Links col --}}
            <div>
                <h3 class="text-white font-semibold text-sm mb-4">Navigasi</h3>
                <ul class="flex flex-col gap-2.5" role="list">
                    <li><a href="{{ route('beranda') }}" class="text-sm text-gray-400 hover:text-brand-orange transition-colors">Beranda</a></li>
                    <li><a href="{{ route('profil.pengurus') }}" class="text-sm text-gray-400 hover:text-brand-orange transition-colors">Profil Pengurus</a></li>
                    <li><a href="{{ route('agenda') }}" class="text-sm text-gray-400 hover:text-brand-orange transition-colors">Agenda Kegiatan</a></li>
                    <li><a href="{{ route('artikel.index') }}" class="text-sm text-gray-400 hover:text-brand-orange transition-colors">Liputan &amp; Artikel</a></li>
                    <li><a href="{{ route('kontak') }}" class="text-sm text-gray-400 hover:text-brand-orange transition-colors">Kontak Kami</a></li>
                </ul>
            </div>

            {{-- Contact col --}}
            <div>
                <h3 class="text-white font-semibold text-sm mb-4">Kontak</h3>
                <ul class="flex flex-col gap-3" role="list">
                    <li class="flex items-start gap-2.5">
                        <svg class="shrink-0 text-brand-orange mt-0.5" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span class="text-sm text-gray-400">Makassar, Sulawesi Selatan</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="shrink-0 text-brand-orange" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        <a href="mailto:info@perhumasrisulsel.or.id" class="text-sm text-gray-400 hover:text-brand-orange transition-colors">info@perhumasrisulsel.or.id</a>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="shrink-0 text-brand-orange" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        <a href="mailto:perhumasrisulsel@gmail.com" class="text-sm text-gray-400 hover:text-brand-orange transition-colors">perhumasrisulsel@gmail.com</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Bottom bar --}}
    <div class="border-t border-white/10">
        <div class="container-site py-4 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-xs text-gray-500">
                &copy; {{ date('Y') }} Perhumasri Sulawesi Selatan. Hak cipta dilindungi.
            </p>
            <p class="text-xs text-gray-600">
                Dikembangkan untuk kemajuan komunikasi kesehatan
            </p>
        </div>
    </div>
</footer>
