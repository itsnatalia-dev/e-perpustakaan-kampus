<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Uji Error Handling & Debugging Perpustakaan</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f6f9; padding: 30px; }
        .container { max-width: 880px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        h2 { color: #2c3e50; margin-top: 0; border-bottom: 2px solid #3498db; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background: #2c3e50; color: white; }
        .btn { display: inline-block; padding: 6px 10px; background: #27ae60; color: white; text-decoration: none; border-radius: 4px; font-size: 12px; margin-right: 4px; }
        .btn-warn { background: #e67e22; }
        .btn-debug { background: #8e44ad; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Panel Uji Error Handling & Debugging Katalog Buku</h2>
        <p>Pilih skenario pengujian pada data buku di bawah ini:</p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode</th>
                    <th>Judul Buku</th>
                    <th>Stok</th>
                    <th>Aksi Uji</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bukus as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><b>{{ $item->kode_buku }}</b></td>
                        <td>{{ $item->judul_buku }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>
                            <a href="{{ url('/perpus/uji-error/pinjam/' . $item->id . '?jumlah=1') }}" class="btn">Pinjam 1 (Normal)</a>
                            <a href="{{ url('/perpus/uji-error/pinjam/' . $item->id . '?jumlah=999') }}" class="btn btn-warn">Pinjam 999 (Error)</a>
                            <a href="{{ url('/perpus/uji-error/pinjam/' . $item->id . '?debug=1') }}" class="btn btn-debug">Debug dd()</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada data buku. Tambah dulu lewat <a href="{{ url('/perpus/katalog-api') }}">/perpus/katalog-api</a>.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <p style="margin-top: 20px; font-size: 14px;">
            <b>Uji Error 404:</b>
            <a href="{{ url('/perpus/uji-error/pinjam/999999') }}">Klik di sini untuk menguji ID buku yang tidak terdaftar (999999)</a>
        </p>
    </div>
</body>
</html>