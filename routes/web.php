<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpusUjiErrorController;
use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\PerpusAuthController;
Route::get('/', function () {
    return view('welcome');
});

// Latihan Praktik Route Sederhana (Modul 12)
Route::get('/salam', function () {
    return "Selamat Pagi! Saya sedang belajar Framework Laravel.";
});

Route::get('/info-kampus', function () {
    return "<h1>Portal Akademik Kampus</h1><p>Selamat datang di sistem informasi terpadu.</p>";
});

// Rute Prototipe Klinik Kesehatan Kampus
Route::prefix('klinik')->group(function () {
    Route::get('/', function () {
        $dataKlinik = [
            'nama_klinik' => 'Klinik Kesehatan Kampus',
            'jam_operasional' => 'Senin - Sabtu, 08.00 - 20.00 WIB',
            'kepala_klinik' => 'dr. Anita Kusuma, M.Kes.',
        ];

        return view('klinik_utama', $dataKlinik);
    });

    Route::get('/layanan', function () {
        $dataLayanan = [
            'nama_klinik' => 'Klinik Kesehatan Kampus',
            'daftar_poli' => [
                [
                    'nama' => 'Poli Umum',
                    'slug' => 'Umum',
                    'deskripsi' => 'Pemeriksaan kesehatan umum, konsultasi keluhan harian, dan surat keterangan sehat.',
                ],
                [
                    'nama' => 'Poli Gigi',
                    'slug' => 'Gigi',
                    'deskripsi' => 'Pemeriksaan kesehatan gigi dan mulut, penambalan, serta pembersihan karang gigi.',
                ],
                [
                    'nama' => 'Poli Konseling Mahasiswa',
                    'slug' => 'Konseling Mahasiswa',
                    'deskripsi' => 'Layanan konseling psikologis, manajemen stres akademik, dan kesehatan mental mahasiswa.',
                ],
            ],
        ];

        return view('klinik_layanan', $dataLayanan);
    });

    Route::get('/poli/{nama_poli?}', function ($nama_poli = null) {
        if ($nama_poli) {
            $namaBersih = str_replace('-', ' ', $nama_poli);
            $teksStatus = "Anda sedang melihat jadwal dan layanan untuk: {$namaBersih}";
        } else {
            $teksStatus = "Anda sedang melihat jadwal dan layanan untuk: Poli Umum (Default)";
        }

        return "
        <div style='font-family: Arial, sans-serif; max-width: 680px; margin: 35px auto; padding: 25px; border: 1px solid #ddd; border-radius: 8px;'>
            <div style='background: #2c3e50; padding: 12px 16px; border-radius: 6px; margin-bottom: 20px;'>
                <a href='" . url('/klinik') . "' style='color: #fff; text-decoration: none; margin-right: 15px; font-weight: bold;'>Beranda Utama</a>
                <a href='" . url('/klinik/layanan') . "' style='color: #fff; text-decoration: none; margin-right: 15px; font-weight: bold;'>Daftar Layanan</a>
                <a href='" . url('/klinik/kontak') . "' style='color: #fff; text-decoration: none; font-weight: bold;'>Kontak Darurat</a>
            </div>
            <h2>Detail Layanan Poli</h2>
            <p style='font-size: 16px;'><b>{$teksStatus}</b></p>
            <p style='color: #555;'>Jadwal Praktik: Senin - Jumat, 08.00 - 15.00 WIB</p>
            <br>
            <a href='" . url('/klinik/layanan') . "' style='color: #2c3e50; font-weight: bold;'>« Kembali ke Daftar Layanan</a>
        </div>
        ";
    });

    Route::get('/antrean/{nomor}', function ($nomor) {
        return "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 40px auto; padding: 25px; border: 1px solid #ddd; border-radius: 8px; text-align: center;'>
            <h2>Kartu Antrean Pasien</h2>
            <p style='font-size: 17px;'>Nomor Antrean Anda adalah: <b>{$nomor}</b>. Silakan menunggu panggilan di ruang tunggu.</p>
            <br>
            <a href='" . url('/klinik') . "' style='display: inline-block; padding: 8px 16px; background: #2c3e50; color: #fff; text-decoration: none; border-radius: 5px;'>Kembali ke /klinik</a>
        </div>
        ";
    })->where('nomor', '[0-9]+');

    Route::get('/kontak', function () {
        return "
        <div style='font-family: Arial, sans-serif; max-width: 650px; margin: 35px auto; padding: 25px; border: 1px solid #ddd; border-radius: 8px;'>
            <h2>Kontak Darurat Klinik Kesehatan Kampus</h2>
            <p><b>Telepon Ambulans Kampus:</b> (021) 555-0199 / 0812-3456-7890</p>
            <p><b>Email Klinik:</b> klinik.kesehatan@kampus.ac.id</p>
            <p><b>Lokasi Posko:</b> Gedung Layanan Mahasiswa Lt. 1</p>
            <br>
            <a href='" . url('/klinik') . "' style='display: inline-block; padding: 9px 16px; background: #2c3e50; color: #fff; text-decoration: none; border-radius: 5px;'>Kembali ke Halaman /klinik</a>
        </div>
        ";
    });
});

// Rute Tugas Direktori & Inventaris Laboratorium Komputer (Pertemuan 13)
Route::prefix('laboratorium')->group(function () {
    Route::get('/', [LaboratoriumController::class, 'index']);
    Route::get('/detail/{kode}', [LaboratoriumController::class, 'detail']);
    Route::get('/status/{status?}', [LaboratoriumController::class, 'statusLab']);
});

// Tugas Modul 14: Portal E-Perpustakaan Kampus
Route::prefix('perpus')->group(function () {
    Route::get('/register', [PerpusAuthController::class, 'register']);
    Route::post('/register', [PerpusAuthController::class, 'simpanRegister']);
    Route::get('/login', [PerpusAuthController::class, 'login'])->name('login');
    Route::post('/login', [PerpusAuthController::class, 'cekLogin']);

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('perpus_dashboard');
        });
        Route::post('/logout', [PerpusAuthController::class, 'logout']);

        Route::get('/kelola-buku', function () {
            return "<h1>Halaman Kelola Buku</h1><p>Halaman ini khusus untuk role Pustakawan.</p><a href='/perpus/dashboard'>Kembali ke Dashboard</a>";
        })->middleware('role:pustakawan');

        Route::get('/pinjam-buku', function () {
            return "<h1>Halaman Pinjam Buku</h1><p>Halaman ini khusus untuk role Anggota.</p><a href='/perpus/dashboard'>Kembali ke Dashboard</a>";
        })->middleware('role:anggota');
    });
});
Route::get('/perpus/katalog-api', function () {
    return view('perpus_katalog_api');
});
Route::prefix('perpus/uji-error')->group(function () {
    Route::get('/', [PerpusUjiErrorController::class, 'index']);
    Route::get('/pinjam/{id}', [PerpusUjiErrorController::class, 'cekPinjam']);
});

// Fallback Route (404 Kustom) - diletakkan di paling bawah
Route::fallback(function () {
    return "<h2 style='color:red; text-align:center; margin-top: 50px;'>
        Maaf, halaman yang Anda cari tidak ditemukan (404). <br>
        <a href='/'>Kembali ke Halaman Utama</a>
    </h2>";
});