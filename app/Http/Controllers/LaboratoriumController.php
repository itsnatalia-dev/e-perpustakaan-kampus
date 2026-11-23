<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;

class LaboratoriumController extends Controller
{
    // 1. Halaman utama direktori & total unit PC (/laboratorium)
    public function index()
    {
        $daftarLab = Laboratorium::ambilSemuaLab();

        $totalPc = 0;
        foreach ($daftarLab as $lab) {
            $totalPc += $lab['kapasitas_pc'];
        }

        return view('lab_index', [
            'judul_halaman' => 'Direktori & Inventaris Laboratorium Komputer',
            'daftar_lab' => $daftarLab,
            'total_pc' => $totalPc,
            'filter_aktif' => 'Semua Lab',
        ]);
    }

    // 2. Halaman detail satu lab (/laboratorium/detail/{kode})
    public function detail($kode)
    {
        $lab = Laboratorium::cariKodeLab($kode);

        if (!$lab) {
            abort(404, 'Data laboratorium tidak ditemukan.');
        }

        return view('lab_detail', [
            'lab' => $lab,
        ]);
    }

    // 3. Halaman filter status lab (/laboratorium/status/{status?})
    public function statusLab($status = 'Tersedia')
    {
        $statusBersih = str_replace('-', ' ', $status);
        $daftarLab = Laboratorium::filterBerdasarkanStatus($statusBersih);

        $totalPc = 0;
        foreach ($daftarLab as $lab) {
            $totalPc += $lab['kapasitas_pc'];
        }

        return view('lab_index', [
            'judul_halaman' => 'Direktori & Inventaris Laboratorium Komputer',
            'daftar_lab' => $daftarLab,
            'total_pc' => $totalPc,
            'filter_aktif' => $statusBersih,
        ]);
    }
}