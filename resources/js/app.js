/**
 * app.js — Perhumasri Sulsel
 * Alpine.js + AOS (Animate On Scroll)
 */

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import intersect from '@alpinejs/intersect';
import AOS from 'aos';
import 'aos/dist/aos.css';

// ── Alpine plugins ──────────────────────────────────────────────
Alpine.plugin(collapse);
Alpine.plugin(intersect);

// ── Alpine globals ──────────────────────────────────────────────
window.Alpine = Alpine;

Alpine.start();

// ── AOS init ───────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 700,
        easing: 'ease-out-cubic',
        once: true,
        offset: 80,
        delay: 0,
    });
});

// ── Navbar scroll behavior ─────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('main-navbar');
    if (!navbar) return;

    const handleScroll = () => {
        if (window.scrollY > 20) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    };

    // Initial check
    handleScroll();
    window.addEventListener('scroll', handleScroll, { passive: true });
});
