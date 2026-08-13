<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

// ── Beranda ──────────────────────────────────────────────────────
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// ── Profil ───────────────────────────────────────────────────────
Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/pengurus', [ProfilController::class, 'pengurus'])->name('pengurus');
    Route::get('/periode-pertama', [ProfilController::class, 'periodePertama'])->name('periode-pertama');
    Route::get('/periode-2022-2025', [ProfilController::class, 'periode2022'])->name('periode-2022');
    Route::get('/periode-2025-2028', [ProfilController::class, 'periode2025'])->name('periode-2025');
});

// ── Agenda ───────────────────────────────────────────────────────
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
Route::get('/agenda/{id}', [AgendaController::class, 'show'])->name('agenda.show');

// ── Liputan & Artikel ────────────────────────────────────────────
Route::prefix('artikel')->name('artikel.')->group(function () {
    Route::get('/', [ArtikelController::class, 'index'])->name('index');
    Route::get('/{artikel:slug}', [ArtikelController::class, 'show'])->name('show');
});

// ── Kontak ───────────────────────────────────────────────────────
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'send'])->name('kontak.send');
