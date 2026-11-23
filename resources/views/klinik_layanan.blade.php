<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Layanan Poli - {{ $nama_klinik }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 30px;
            color: #2c3e50;
        }
        .container {
            max-width: 720px;
            margin: auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }
        nav {
            background: #2c3e50;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 22px;
        }
        nav a {
            color: #ffffff;
            text-decoration: none;
            margin-right: 16px;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .poli-card {
            border: 1px solid #e1e8ed;
            border-radius: 8px;
            padding: 15px 18px;
            margin-bottom: 14px;
            background-color: #fafbfd;
        }
        .poli-card h3 {
            margin: 0 0 6px 0;
            color: #1f6feb;
        }
        .poli-card p {
            margin: 0 0 10px 0;
            font-size: 14px;
            color: #4a5568;
        }
        .btn-detail {
            display: inline-block;
            background: #2c3e50;
            color: #ffffff;
            padding: 7px 14px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-detail:hover {
            background: #1a252f;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <a href="{{ url('/klinik') }}">Beranda Utama</a>
            <a href="{{ url('/klinik/layanan') }}">Daftar Layanan</a>
            <a href="{{ url('/klinik/kontak') }}">Kontak Darurat</a>
        </nav>

        <h2>Daftar Layanan Poli - {{ $nama_klinik }}</h2>
        <p>Pilih salah satu poli di bawah ini untuk melihat jadwal dan layanan:</p>

        @foreach ($daftar_poli as $poli)
            <div class="poli-card">
                <h3>{{ $poli['nama'] }}</h3>
                <p>{{ $poli['deskripsi'] }}</p>
                <a class="btn-detail" href="{{ url('/klinik/poli/' . $poli['slug']) }}">
                    Lihat Jadwal & Layanan
                </a>
            </div>
        @endforeach
    </div>
</body>
</html>