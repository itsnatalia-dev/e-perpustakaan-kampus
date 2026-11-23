<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>404 - Data atau Halaman Tidak Ditemukan</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f6f9; text-align: center; padding-top: 80px; color: #333; }
        .error-card { max-width: 520px; margin: auto; background: white; padding: 35px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); border-top: 5px solid #e74c3c; }
        h1 { font-size: 64px; margin: 0; color: #e74c3c; }
        h3 { margin-top: 10px; color: #2c3e50; }
        p { color: #666; line-height: 1.6; }
        .pesan-khusus { background: #fdf2e9; color: #d35400; padding: 10px; border-radius: 6px; font-weight: bold; margin: 15px 0; }
        .btn { display: inline-block; margin-top: 15px; padding: 10px 20px; background: #2c3e50; color: white; text-decoration: none; border-radius: 6px; }
    </style>
</head>
<body>
    <div class="error-card">
        <h1>404</h1>
        <h3>Oops! Data atau Halaman Tidak Ditemukan</h3>
        @if ($exception->getMessage())
            <div class="pesan-khusus">
                Detail: {{ $exception->getMessage() }}
            </div>
        @else
            <p>Alamat URL atau data yang kamu cari tidak tersedia di dalam sistem.</p>
        @endif
        <a href="{{ url('/perpus/katalog-api') }}" class="btn">« Kembali ke Katalog Perpustakaan</a>
    </div>
</body>
</html>