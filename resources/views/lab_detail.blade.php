<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail {{ $lab['nama_lab'] }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 40px;
            color: #2c3e50;
        }
        .card {
            max-width: 640px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #ff2d20;
            margin-top: 0;
            border-bottom: 2px solid #eeeeee;
            padding-bottom: 10px;
        }
        .row {
            margin-bottom: 12px;
            line-height: 1.6;
        }
        .label {
            font-weight: bold;
            width: 175px;
            display: inline-block;
            color: #555555;
        }
        .badge {
            padding: 4px 10px;
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
        .fasilitas-box {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 6px;
            border: 1px solid #e9ecef;
            margin-top: 15px;
            line-height: 1.6;
        }
        .btn-kembali {
            display: inline-block;
            margin-top: 22px;
            background: #2c3e50;
            color: #ffffff;
            padding: 9px 16px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-kembali:hover {
            background: #1a252f;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Detail Inventaris Laboratorium</h2>

        <div class="row"><span class="label">Kode Lab</span>: <b>{{ $lab['kode_lab'] }}</b></div>
        <div class="row"><span class="label">Nama Laboratorium</span>: {{ $lab['nama_lab'] }}</div>
        <div class="row"><span class="label">Penanggung Jawab</span>: {{ $lab['penanggung_jawab'] }}</div>
        <div class="row"><span class="label">Kapasitas PC</span>: {{ $lab['kapasitas_pc'] }} Unit</div>
        <div class="row">
            <span class="label">Status</span>:
            @if ($lab['status'] === 'Tersedia')
                <span class="badge badge-tersedia">Tersedia</span>
            @else
                <span class="badge badge-maintenance">{{ $lab['status'] }}</span>
            @endif
        </div>

        <div class="fasilitas-box">
            <b>Fasilitas Ruangan:</b><br>
            {{ $lab['fasilitas'] }}
        </div>

        <a href="{{ url('/laboratorium') }}" class="btn-kembali">« Kembali ke Direktori Laboratorium</a>
    </div>
</body>
</html>