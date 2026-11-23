<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Simulasi Pinjam Buku</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f6f9; padding: 40px; }
        .card { max-width: 560px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        h2 { margin-top: 0; color: #2c3e50; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        .alert-error { background: #f8d7da; color: #721c24; border-left: 5px solid #dc3545; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .alert-sukses { background: #d4edda; color: #155724; border-left: 5px solid #28a745; padding: 15px; border-radius: 5px; margin-top: 15px; }
        .btn { display: inline-block; margin-top: 20px; padding: 8px 16px; background: #2c3e50; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Hasil Simulasi Pengecekan Stok Buku</h2>

        @if ($pesan_error)
            <div class="alert-error">
                <b>Peringatan Sistem (Tertangkap Blok Try-Catch):</b><br>
                {{ $pesan_error }}
            </div>
        @endif

        <p><b>Kode Buku:</b> {{ $buku->kode_buku }}</p>
        <p><b>Judul Buku:</b> {{ $buku->judul_buku }}</p>
        <p><b>Penulis:</b> {{ $buku->penulis }}</p>
        <p><b>Stok Saat Ini:</b> {{ $buku->stok }}</p>
        <p><b>Jumlah Pinjam Diuji:</b> {{ $jumlah_pinjam }}</p>

        @if (!$pesan_error)
            <div class="alert-sukses">
                <b>Simulasi Berhasil!</b><br>
                Perkiraan Sisa Stok: <b>{{ $sisa_stok }}</b>
            </div>
        @endif

        <a href="{{ url('/perpus/uji-error') }}" class="btn">« Kembali ke Panel Uji</a>
    </div>
</body>
</html>