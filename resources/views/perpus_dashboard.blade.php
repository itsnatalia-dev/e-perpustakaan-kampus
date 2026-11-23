<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Portal E-Perpustakaan Kampus</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; padding: 40px; }
        .box { max-width: 650px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        .badge { padding: 4px 10px; border-radius: 12px; color: white; font-size: 12px; font-weight: bold; text-transform: uppercase; }
        .bg-pustakawan { background: #e67e22; }
        .bg-anggota { background: #27ae60; }
        .menu-box { margin-top: 20px; padding: 15px; background: #f8f9fa; border: 1px solid #ddd; border-radius: 6px; }
        .btn { display: inline-block; padding: 8px 14px; background: #2c3e50; color: white; text-decoration: none; border-radius: 5px; margin-right: 10px; font-size: 14px; }
        .btn-logout { background: #e74c3c; color: white; border: none; padding: 9px 16px; border-radius: 5px; cursor: pointer; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p>
            Email Aktif: <b>{{ Auth::user()->email }}</b> <br>
            Status Role Kamu:
            @if (Auth::user()->role === 'pustakawan')
                <span class="badge bg-pustakawan">Pustakawan</span>
            @else
                <span class="badge bg-anggota">Anggota</span>
            @endif
        </p>

        <div class="menu-box">
            <h4>Menu Akses Portal E-Perpustakaan:</h4>
            <a href="{{ url('/perpus/kelola-buku') }}" class="btn">Kelola Buku (Pustakawan)</a>
            <a href="{{ url('/perpus/pinjam-buku') }}" class="btn">Pinjam Buku (Anggota)</a>
        </div>

        <form method="POST" action="{{ url('/perpus/logout') }}">
            @csrf
            <button type="submit" class="btn-logout">Keluar (Logout)</button>
        </form>
    </div>
</body>
</html>