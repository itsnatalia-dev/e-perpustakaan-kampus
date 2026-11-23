<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Klinik Kesehatan Kampus</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; padding: 30px; }
        .card { background: white; max-width: 600px; margin: auto; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        nav { background: #2c3e50; padding: 12px; border-radius: 5px; margin-bottom: 20px; }
        nav a { color: white; margin-right: 15px; text-decoration: none; font-weight: bold; }
        h2 { color: #2c3e50; margin-top: 0; }
    </style>
</head>
<body>
    <div class="card">
        <nav>
            <a href="{{ url('/klinik') }}">Beranda Utama</a>
            <a href="{{ url('/klinik/layanan') }}">Daftar Layanan</a>
            <a href="{{ url('/klinik/kontak') }}">Kontak Darurat</a>
        </nav>
        
        <!-- Data dinamis yang dikirim dari routes/web.php -->
        <h2>Selamat Datang di {{ $nama_klinik }}</h2>
        <p><b>Jam Operasional:</b> {{ $jam_operasional }}</p>
        <p><b>Kepala Klinik:</b> {{ $kepala_klinik }}</p>
        <hr>
        <p>Silakan gunakan menu navigasi di atas untuk melihat layanan atau menghubungi darurat.</p>
    </div>
</body>
</html>