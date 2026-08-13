{{--
    Navbar - Perhumasri Sulsel
    Fixed, scrolled effect, mobile hamburger dengan Alpine.js
--}}
<header id="main-navbar" class="navbar" x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 20">

    {{-- Topbar --}}
    <div class="topbar hidden md:block">
        <div class="container-site flex items-center justify-between">
            <div class="flex items-center gap-4">
                <span class="flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                    info@perhumasrisulsel.or.id
                </span>
            </div>
            <div class="flex items-center gap-3">
                <a href="https://www.instagram.com/perhumasrisulsel?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener" aria-label="Instagram Perhumasri Sulsel" class="opacity-80 hover:opacity-100 transition-opacity">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                </a>
            </div>
        </div>
    </div>

    {{-- Main Nav --}}
    <nav
        class="transition-all duration-300"
        :class="scrolled ? 'bg-white shadow-sm' : 'bg-white/80 backdrop-blur-md'"
        aria-label="Navigasi utama"
    >
        <div class="container-site flex items-center justify-between" style="height: 4.5rem;">

            {{-- Logo --}}
            <a href="{{ route('beranda') }}" class="flex items-center gap-3 shrink-0">
                <img src="/logo.jpg" alt="Logo Perhumasri Sulsel" class="w-10 h-10 object-contain rounded-lg">
                <div class="leading-tight">
                    <div class="font-bold text-base text-gray-900 leading-none">Perhumasri</div>
                    <div class="text-xs text-gray-500 font-medium">Sulawesi Selatan</div>
                </div>
            </a>

            {{-- Desktop Menu --}}
            <ul class="hidden lg:flex items-center gap-1" role="list">
                <li>
                    <a href="{{ route('beranda') }}"
                       class="px-4 py-2 rounded-full text-sm font-medium text-gray-700 hover:text-brand-orange hover:bg-orange-50 transition-all duration-200 {{ request()->routeIs('beranda') ? 'text-brand-orange bg-orange-50' : '' }}"
                    >Beranda</a>
                </li>

                {{-- Profil dropdown --}}
                <li class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button
                        @click="open = !open"
                        class="px-4 py-2 rounded-full text-sm font-medium text-gray-700 hover:text-brand-orange hover:bg-orange-50 transition-all duration-200 flex items-center gap-1 {{ request()->routeIs('profil.*') ? 'text-brand-orange bg-orange-50' : '' }}"
                        aria-haspopup="true"
                        :aria-expanded="open"
                    >
                        Profil
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-200" :class="open ? 'rotate-180' : ''" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>

                    <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-1"
                        class="absolute top-full left-0 mt-2 w-52 bg-white rounded-2xl shadow-lg border border-gray-100 py-2 z-10"
                        role="menu"
                    >
                        <a href="{{ route('profil.pengurus') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:text-brand-orange hover:bg-orange-50 transition-colors" role="menuitem">Pengurus</a>
                        <a href="{{ route('profil.periode-pertama') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:text-brand-orange hover:bg-orange-50 transition-colors" role="menuitem">Periode Pertama</a>
                        <a href="{{ route('profil.periode-2022') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:text-brand-orange hover:bg-orange-50 transition-colors" role="menuitem">Periode 2022-2025</a>
                        <a href="{{ route('profil.periode-2025') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:text-brand-orange hover:bg-orange-50 transition-colors" role="menuitem">Periode 2025-2028</a>
                    </div>
                </li>

                <li>
                    <a href="{{ route('agenda') }}"
                       class="px-4 py-2 rounded-full text-sm font-medium text-gray-700 hover:text-brand-orange hover:bg-orange-50 transition-all duration-200 {{ request()->routeIs('agenda*') ? 'text-brand-orange bg-orange-50' : '' }}"
                    >Agenda</a>
                </li>

                <li>
                    <a href="{{ route('artikel.index') }}"
                       class="px-4 py-2 rounded-full text-sm font-medium text-gray-700 hover:text-brand-orange hover:bg-orange-50 transition-all duration-200 {{ request()->routeIs('artikel*') ? 'text-brand-orange bg-orange-50' : '' }}"
                    >Liputan &amp; Artikel</a>
                </li>

                <li>
                    <a href="{{ route('kontak') }}"
                       class="px-4 py-2 rounded-full text-sm font-medium text-gray-700 hover:text-brand-orange hover:bg-orange-50 transition-all duration-200 {{ request()->routeIs('kontak') ? 'text-brand-orange bg-orange-50' : '' }}"
                    >Kontak</a>
                </li>
            </ul>

            {{-- Desktop CTA --}}
            <div class="hidden lg:flex items-center gap-3">
                <a href="{{ route('kontak') }}" class="btn btn-primary text-sm px-5 py-2.5">
                    Hubungi Kami
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>

            {{-- Mobile Hamburger --}}
            <button
                @click="open = !open"
                class="lg:hidden w-10 h-10 flex items-center justify-center rounded-xl text-gray-700 hover:bg-gray-100 transition-colors"
                :aria-label="open ? 'Tutup menu' : 'Buka menu'"
                :aria-expanded="open"
            >
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div
            x-show="open"
            x-collapse
            class="lg:hidden border-t border-gray-100 bg-white"
        >
            <div class="container-site py-4 flex flex-col gap-1">
                <a href="{{ route('beranda') }}" @click="open = false" class="px-4 py-3 rounded-xl text-sm font-medium text-gray-700 hover:text-brand-orange hover:bg-orange-50 transition-colors {{ request()->routeIs('beranda') ? 'text-brand-orange bg-orange-50' : '' }}">Beranda</a>

                {{-- Profil accordion mobile --}}
                <div x-data="{ subOpen: false }">
                    <button @click="subOpen = !subOpen" class="w-full flex items-center justify-between px-4 py-3 rounded-xl text-sm font-medium text-gray-700 hover:text-brand-orange hover:bg-orange-50 transition-colors">
                        Profil
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-200" :class="subOpen ? 'rotate-180' : ''" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>
                    <div x-show="subOpen" x-collapse class="pl-4 flex flex-col gap-0.5">
                        <a href="{{ route('profil.pengurus') }}" @click="open = false" class="px-4 py-2.5 rounded-xl text-sm text-gray-600 hover:text-brand-orange hover:bg-orange-50 transition-colors">Pengurus</a>
                        <a href="{{ route('profil.periode-pertama') }}" @click="open = false" class="px-4 py-2.5 rounded-xl text-sm text-gray-600 hover:text-brand-orange hover:bg-orange-50 transition-colors">Periode Pertama</a>
                        <a href="{{ route('profil.periode-2022') }}" @click="open = false" class="px-4 py-2.5 rounded-xl text-sm text-gray-600 hover:text-brand-orange hover:bg-orange-50 transition-colors">Periode 2022-2025</a>
                        <a href="{{ route('profil.periode-2025') }}" @click="open = false" class="px-4 py-2.5 rounded-xl text-sm text-gray-600 hover:text-brand-orange hover:bg-orange-50 transition-colors">Periode 2025-2028</a>
                    </div>
                </div>

                <a href="{{ route('agenda') }}" @click="open = false" class="px-4 py-3 rounded-xl text-sm font-medium text-gray-700 hover:text-brand-orange hover:bg-orange-50 transition-colors {{ request()->routeIs('agenda*') ? 'text-brand-orange bg-orange-50' : '' }}">Agenda</a>
                <a href="{{ route('artikel.index') }}" @click="open = false" class="px-4 py-3 rounded-xl text-sm font-medium text-gray-700 hover:text-brand-orange hover:bg-orange-50 transition-colors {{ request()->routeIs('artikel*') ? 'text-brand-orange bg-orange-50' : '' }}">Liputan &amp; Artikel</a>
                <a href="{{ route('kontak') }}" @click="open = false" class="px-4 py-3 rounded-xl text-sm font-medium text-gray-700 hover:text-brand-orange hover:bg-orange-50 transition-colors {{ request()->routeIs('kontak') ? 'text-brand-orange bg-orange-50' : '' }}">Kontak</a>

                <div class="pt-2 border-t border-gray-100 mt-2">
                    <a href="{{ route('kontak') }}" @click="open = false" class="btn btn-primary w-full justify-center">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
