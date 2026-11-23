<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class PerpusUjiErrorController extends Controller
{
    public function index()
    {
        $bukus = Buku::orderBy('id', 'asc')->get();

        return view('perpus_uji_error', [
            'bukus' => $bukus,
        ]);
    }

    public function cekPinjam(Request $request, $id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            Log::warning("Percobaan akses ID buku tidak terdaftar: {$id}");
            abort(404, "Buku dengan ID {$id} tidak ditemukan di katalog perpustakaan.");
        }

        if ($request->query('debug') == '1') {
            dd([
                'INFO_DEBUG' => 'Memeriksa data buku sebelum simulasi pinjam',
                'id_buku' => $id,
                'data_buku' => $buku->toArray(),
            ]);
        }

        $jumlahPinjam = (int) $request->query('jumlah', 1);

        try {
            if ($jumlahPinjam <= 0) {
                throw new Exception("Jumlah pinjam harus lebih dari 0 (nilai dikirim: {$jumlahPinjam}).");
            }

            if ($buku->stok <= 0) {
                throw new Exception("Stok buku '{$buku->judul_buku}' sedang habis (stok: {$buku->stok}).");
            }

            if ($jumlahPinjam > $buku->stok) {
                throw new Exception("Jumlah pinjam ({$jumlahPinjam}) melebihi stok tersedia ({$buku->stok}).");
            }

            $sisaStok = $buku->stok - $jumlahPinjam;
            Log::info("Simulasi cek pinjam berhasil untuk buku ID {$id}", [
                'kode_buku' => $buku->kode_buku,
                'jumlah_pinjam' => $jumlahPinjam,
                'sisa_stok' => $sisaStok,
            ]);

            return view('perpus_uji_hasil', [
                'buku' => $buku,
                'jumlah_pinjam' => $jumlahPinjam,
                'sisa_stok' => $sisaStok,
                'pesan_error' => null,
            ]);
        } catch (Throwable $e) {
            Log::error("Gagal simulasi pinjam buku ID {$id}: " . $e->getMessage(), [
                'file' => $e->getFile(),
                'baris' => $e->getLine(),
            ]);

            return view('perpus_uji_hasil', [
                'buku' => $buku,
                'jumlah_pinjam' => $jumlahPinjam,
                'sisa_stok' => $buku->stok,
                'pesan_error' => $e->getMessage(),
            ]);
        }
    }
}