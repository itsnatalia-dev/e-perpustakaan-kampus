<?php

namespace App\Models;

class Laboratorium
{
    private static $daftar_lab = [
        [
            'kode_lab' => 'LAB01',
            'nama_lab' => 'Lab Pemrograman Dasar',
            'penanggung_jawab' => 'Budi Santoso, S.Kom., M.Kom.',
            'kapasitas_pc' => 40,
            'status' => 'Tersedia',
            'fasilitas' => '40 Unit PC Core i5, Proyektor, AC, White Board',
        ],
        [
            'kode_lab' => 'LAB02',
            'nama_lab' => 'Lab Jaringan Komputer',
            'penanggung_jawab' => 'Rina Wijaya, S.Kom., M.T.',
            'kapasitas_pc' => 35,
            'status' => 'Tersedia',
            'fasilitas' => '35 Unit PC, Router & Switch Cisco, Kabel LAN, Proyektor',
        ],
        [
            'kode_lab' => 'LAB03',
            'nama_lab' => 'Lab Basis Data & Rekayasa Perangkat Lunak',
            'penanggung_jawab' => 'Septa, S.Kom., M.Kom.',
            'kapasitas_pc' => 36,
            'status' => 'Sedang Maintenance',
            'fasilitas' => '36 Unit PC SSD 512GB, Server Lokal, AC',
        ],
        [
            'kode_lab' => 'LAB04',
            'nama_lab' => 'Lab Multimedia & Desain',
            'penanggung_jawab' => 'Dian Pratama, M.Ds.',
            'kapasitas_pc' => 30,
            'status' => 'Tersedia',
            'fasilitas' => '30 Unit PC Grafis, Pen Tablet, Speaker Monitor, AC',
        ],
        [
            'kode_lab' => 'LAB05',
            'nama_lab' => 'Lab Kecerdasan Buatan & IoT',
            'penanggung_jawab' => 'Andi Nugroho, S.T., M.Kom.',
            'kapasitas_pc' => 25,
            'status' => 'Sedang Maintenance',
            'fasilitas' => '25 Unit PC, Kit Sensor IoT, Microcontroller, Proyektor',
        ],
    ];

    // 1. Mengambil seluruh data lab
    public static function ambilSemuaLab()
    {
        return self::$daftar_lab;
    }

    // 2. Mencari satu data lab berdasarkan kode_lab
    public static function cariKodeLab($kode)
    {
        foreach (self::$daftar_lab as $lab) {
            if (strtoupper($lab['kode_lab']) === strtoupper($kode)) {
                return $lab;
            }
        }

        return null;
    }

    // 3. Memfilter daftar lab berdasarkan status ('Tersedia' atau 'Sedang Maintenance')
    public static function filterBerdasarkanStatus($status)
    {
        $hasil = [];
        $statusNormal = strtolower(trim($status));

        foreach (self::$daftar_lab as $lab) {
            if (strtolower($lab['status']) === $statusNormal) {
                $hasil[] = $lab;
            }
        }

        return $hasil;
    }
}