<?php

namespace Tests\Feature;

use App\Models\Buku;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PerpusUjiErrorTest extends TestCase
{
    use RefreshDatabase;

    public function test_halaman_panel_uji_error_dapat_diakses(): void
    {
        Buku::create([
            'kode_buku' => 'BK-101',
            'judul_buku' => 'Pemrograman Web Laravel',
            'penulis' => 'Natalia',
            'stok' => 5,
        ]);

        $response = $this->get('/perpus/uji-error');

        $response->assertStatus(200);
        $response->assertSee('Panel Uji Error Handling & Debugging Katalog Buku', false);
        $response->assertSee('Pemrograman Web Laravel');
    }

    public function test_error_handling_saat_jumlah_pinjam_melebihi_stok(): void
    {
        $buku = Buku::create([
            'kode_buku' => 'BK-102',
            'judul_buku' => 'Basis Data MySQL',
            'penulis' => 'Natalia',
            'stok' => 3,
        ]);

        $response = $this->get('/perpus/uji-error/pinjam/' . $buku->id . '?jumlah=10');

        $response->assertStatus(200);
        $response->assertSee('Jumlah pinjam (10) melebihi stok tersedia (3).');
    }

    public function test_id_buku_tidak_terdaftar_menampilkan_status_404(): void
    {
        $response = $this->get('/perpus/uji-error/pinjam/999999');

        $response->assertStatus(404);
    }
}