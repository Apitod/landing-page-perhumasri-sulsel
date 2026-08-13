<?php

namespace Database\Seeders;

use App\Models\Periode;
use App\Models\Pengurus;
use Illuminate\Database\Seeder;

class PeriodeSeeder extends Seeder
{
    public function run(): void
    {
        // ── Periode Pertama (2021) ─────────────────────────────────────
        $p1 = Periode::create([
            'nama'          => 'Periode Pertama',
            'tahun_mulai'   => 2021,
            'tahun_selesai' => 2022,
            'is_aktif'      => false,
            'keterangan'    => 'SK Ketua Umum No. 8/KETUM/V/2021, ditetapkan 27 Mei 2021.',
        ]);

        $pengurus1 = [
            ['nama' => 'Wisnu Maulana',          'jabatan' => 'Ketua',              'bidang' => null,                              'urutan' => 1],
            ['nama' => 'Aulia Yamin',             'jabatan' => 'Wakil Ketua',        'bidang' => null,                              'urutan' => 2],
            ['nama' => 'Nurhidayat',              'jabatan' => 'Sekretaris',         'bidang' => null,                              'urutan' => 3],
            ['nama' => "Sriyanti Mas'ud",         'jabatan' => 'Wakil Sekretaris',   'bidang' => null,                              'urutan' => 4],
            ['nama' => 'A. Rian Puspitasari',     'jabatan' => 'Bendahara',          'bidang' => null,                              'urutan' => 5],
            ['nama' => 'Mirna Zuhriah Renur',     'jabatan' => 'Wakil Bendahara',    'bidang' => null,                              'urutan' => 6],
            // Bidang Humas & Advokasi
            ['nama' => 'Andriani Misdar',         'jabatan' => 'Ketua Bidang',       'bidang' => 'Bidang Humas dan Advokasi',       'urutan' => 10],
            ['nama' => 'Zainuddin',               'jabatan' => 'Anggota',            'bidang' => 'Bidang Humas dan Advokasi',       'urutan' => 11],
            ['nama' => 'Nur Amrita',              'jabatan' => 'Anggota',            'bidang' => 'Bidang Humas dan Advokasi',       'urutan' => 12],
            ["nama" => "Aldin Richard Sangka'",   'jabatan' => 'Anggota',            'bidang' => 'Bidang Humas dan Advokasi',       'urutan' => 13],
            // Bidang Hubungan Antar Lembaga
            ['nama' => 'Ismail Mappirola',        'jabatan' => 'Ketua Bidang',       'bidang' => 'Bidang Hubungan Antar Lembaga',   'urutan' => 20],
            ['nama' => 'Zakaria',                 'jabatan' => 'Anggota',            'bidang' => 'Bidang Hubungan Antar Lembaga',   'urutan' => 21],
            ['nama' => 'Maulana Hidayat',         'jabatan' => 'Anggota',            'bidang' => 'Bidang Hubungan Antar Lembaga',   'urutan' => 22],
            ['nama' => 'Gumala Rubiah',           'jabatan' => 'Anggota',            'bidang' => 'Bidang Hubungan Antar Lembaga',   'urutan' => 23],
            // Bidang Pelatihan
            ['nama' => 'Aswadi Muhammad',         'jabatan' => 'Ketua Bidang',       'bidang' => 'Bidang Pelatihan',               'urutan' => 30],
            ['nama' => 'Surachmat. S',            'jabatan' => 'Anggota',            'bidang' => 'Bidang Pelatihan',               'urutan' => 31],
            ['nama' => 'Ayu Syah Putri',          'jabatan' => 'Anggota',            'bidang' => 'Bidang Pelatihan',               'urutan' => 32],
            ['nama' => 'Fatia Anindita',          'jabatan' => 'Anggota',            'bidang' => 'Bidang Pelatihan',               'urutan' => 33],
            // Bidang Organisasi & Keanggotaan
            ['nama' => 'Yanwar Saiful',           'jabatan' => 'Ketua Bidang',       'bidang' => 'Bidang Organisasi dan Keanggotaan', 'urutan' => 40],
            ['nama' => 'Hj. Salawiah',            'jabatan' => 'Anggota',            'bidang' => 'Bidang Organisasi dan Keanggotaan', 'urutan' => 41],
            ['nama' => 'Febryan Agus Pramudyo',   'jabatan' => 'Anggota',            'bidang' => 'Bidang Organisasi dan Keanggotaan', 'urutan' => 42],
            ['nama' => 'Dian Indah Afriyani',     'jabatan' => 'Anggota',            'bidang' => 'Bidang Organisasi dan Keanggotaan', 'urutan' => 43],
        ];

        foreach ($pengurus1 as $p) {
            Pengurus::create(array_merge(['periode_id' => $p1->id], $p));
        }

        // ── Periode 2025 – 2028 ─────────────────────────────────────────
        $p2 = Periode::create([
            'nama'          => 'Periode 2025–2028',
            'tahun_mulai'   => 2025,
            'tahun_selesai' => 2028,
            'is_aktif'      => true,
            'keterangan'    => 'SK Ketua Umum No. 5/KETUM/VII/2025, ditetapkan 23 Juli 2025. Dilantik hasil Musywil Sulsel 11 Mei 2025.',
        ]);

        $pengurus2 = [
            ['nama' => 'Wisnu Maulana',              'jabatan' => 'Ketua',             'bidang' => null,                                   'urutan' => 1],
            ['nama' => 'Aulia Yamin',                'jabatan' => 'Wakil Ketua',       'bidang' => null,                                   'urutan' => 2],
            ['nama' => 'Nurhidayat',                 'jabatan' => 'Sekretaris',        'bidang' => null,                                   'urutan' => 3],
            ['nama' => 'Wawan Satriawan',            'jabatan' => 'Wakil Sekretaris',  'bidang' => null,                                   'urutan' => 4],
            ['nama' => 'Fathin Nurqalbi Eka Putri',  'jabatan' => 'Bendahara',         'bidang' => null,                                   'urutan' => 5],
            ['nama' => 'Megawati',                   'jabatan' => 'Wakil Bendahara',   'bidang' => null,                                   'urutan' => 6],
            // Koordinator Wilayah
            ['nama' => 'Bondan Aditya',              'jabatan' => 'Koordinator Wilayah 1', 'bidang' => 'Koordinator Wilayah',             'urutan' => 10],
            ['nama' => 'Andi Widyawaty',             'jabatan' => 'Koordinator Wilayah 2', 'bidang' => 'Koordinator Wilayah',             'urutan' => 11],
            ['nama' => 'Suparta',                    'jabatan' => 'Koordinator Wilayah 3', 'bidang' => 'Koordinator Wilayah',             'urutan' => 12],
            ["nama" => "Aldin Richard Sangka'",      'jabatan' => 'Koordinator Wilayah 4', 'bidang' => 'Koordinator Wilayah',             'urutan' => 13],
            ['nama' => 'Endang Susilowati',          'jabatan' => 'Koordinator Wilayah 5', 'bidang' => 'Koordinator Wilayah',             'urutan' => 14],
            // Bidang Pelatihan & Kompetensi
            ['nama' => 'Rima Kusumah Dewi',          'jabatan' => 'Koordinator',       'bidang' => 'Bidang Pelatihan dan Kompetensi',      'urutan' => 20],
            ['nama' => 'Nur Amrita',                 'jabatan' => 'Anggota',           'bidang' => 'Bidang Pelatihan dan Kompetensi',      'urutan' => 21],
            ['nama' => 'Aisyah Indrayanti',          'jabatan' => 'Anggota',           'bidang' => 'Bidang Pelatihan dan Kompetensi',      'urutan' => 22],
            ['nama' => 'Zaenal Paharuddin',          'jabatan' => 'Anggota',           'bidang' => 'Bidang Pelatihan dan Kompetensi',      'urutan' => 23],
            ['nama' => 'Nurfardiansyah Burhanuddin', 'jabatan' => 'Anggota',           'bidang' => 'Bidang Pelatihan dan Kompetensi',      'urutan' => 24],
            // Bidang Organisasi & Keanggotaan
            ['nama' => 'Sapril',                     'jabatan' => 'Koordinator',       'bidang' => 'Bidang Organisasi dan Keanggotaan',    'urutan' => 30],
            ['nama' => 'Sudarseh',                   'jabatan' => 'Anggota',           'bidang' => 'Bidang Organisasi dan Keanggotaan',    'urutan' => 31],
            ['nama' => 'Muh. Arsyad',                'jabatan' => 'Anggota',           'bidang' => 'Bidang Organisasi dan Keanggotaan',    'urutan' => 32],
            ['nama' => 'Ismail Mappirola',           'jabatan' => 'Anggota',           'bidang' => 'Bidang Organisasi dan Keanggotaan',    'urutan' => 33],
            ['nama' => 'Muh. Takwa',                 'jabatan' => 'Anggota',           'bidang' => 'Bidang Organisasi dan Keanggotaan',    'urutan' => 34],
            // Bidang Hubungan Masyarakat & Publikasi
            ['nama' => 'Muh. Nasir',                 'jabatan' => 'Koordinator',       'bidang' => 'Bidang Hubungan Masyarakat dan Publikasi', 'urutan' => 40],
            ['nama' => 'Zakaria',                    'jabatan' => 'Anggota',           'bidang' => 'Bidang Hubungan Masyarakat dan Publikasi', 'urutan' => 41],
            ['nama' => 'Munawir',                    'jabatan' => 'Anggota',           'bidang' => 'Bidang Hubungan Masyarakat dan Publikasi', 'urutan' => 42],
            ['nama' => 'Faiqah Ilham',               'jabatan' => 'Anggota',           'bidang' => 'Bidang Hubungan Masyarakat dan Publikasi', 'urutan' => 43],
            ['nama' => 'Rizal Rumpa',                'jabatan' => 'Anggota',           'bidang' => 'Bidang Hubungan Masyarakat dan Publikasi', 'urutan' => 44],
        ];

        foreach ($pengurus2 as $p) {
            Pengurus::create(array_merge(['periode_id' => $p2->id], $p));
        }
    }
}
