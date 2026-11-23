<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul_halaman }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 30px;
            color: #2c3e50;
        }
        .container {
            max-width: 980px;
            margin: auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        h1 {
            margin-top: 0;
            border-bottom: 3px solid #ff2d20;
            padding-bottom: 10px;
            font-size: 24px;
        }
        .filter-nav {
            margin: 18px 0;
            padding: 12px 15px;
            background: #eef2f7;
            border-radius: 8px;
        }
        .filter-nav span {
            font-weight: bold;
            margin-right: 10px;
        }
        .filter-nav a {
            text-decoration: none;
            color: #2c3e50;
            font-weight: 600;
            margin: 0 6px;
            padding: 4px 8px;
            border-radius: 5px;
        }
        .filter-nav a:hover {
            background: #dce3ec;
        }
        .info-box {
            background: #eef6ff;
            border-left: 4px solid #3498db;
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 12px 14px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        th {
            background-color: #2c3e50;
            color: #ffffff;
        }
        tr:hover {
            background-color: #f9fbfd;
        }
        .badge {
            padding: 5px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
            color: #ffffff;
            display: inline-block;
        }
        .badge-tersedia {
            background-color: #27ae60;
        }
        .badge-maintenance {
            background-color: #e74c3c;
        }
        .btn-detail {
            background-color: #3498db;
            color: #ffffff;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 13px;
            display: inline-block;
        }
        .btn-detail:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $judul_halaman }}</h1>

        <div class="filter-nav">
            <span>Filter Status:</span>
            <a href="{{ url('/laboratorium') }}">Semua Lab</a> |
            <a href="{{ url('/laboratorium/status/Tersedia') }}">Tersedia</a> |
            <a href="{{ url('/laboratorium/status/Sedang-Maintenance') }}">Maintenance</a>
        </div>

        <div class="info-box">
            Filter aktif: <b>{{ $filter_aktif }}</b> |
            Menampilkan <b>{{ count($daftar_lab) }} Ruang Laboratorium</b> dengan total akumulasi
            <b>{{ $total_pc }} Unit PC</b>.
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Lab</th>
                    <th>Nama Laboratorium</th>
                    <th>Penanggung Jawab</th>
                    <th>Kapasitas PC</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftar_lab as $lab)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><b>{{ $lab['kode_lab'] }}</b></td>
                        <td>{{ $lab['nama_lab'] }}</td>
                        <td>{{ $lab['penanggung_jawab'] }}</td>
                        <td>{{ $lab['kapasitas_pc'] }} Unit</td>
                        <td>
                            @if ($lab['status'] === 'Tersedia')
                                <span class="badge badge-tersedia">Tersedia</span>
                            @else
                                <span class="badge badge-maintenance">{{ $lab['status'] }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('/laboratorium/detail/' . $lab['kode_lab']) }}" class="btn-detail">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 20px;">
                            Tidak ada data laboratorium untuk status ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>