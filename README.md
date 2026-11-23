# E-Perpustakaan Kampus (Proyek Laravel Mandiri)

Aplikasi web berbasis Laravel untuk pengelolaan katalog dan simulasi pengecekan peminjaman buku perpustakaan kampus, dilengkapi penanganan error (`try-catch` dan halaman 404 kustom), pencatatan log, debugging, serta pengujian fitur otomatis.

## Identitas Pembuat
- Nama: Natalia Erliana Mbopo Nuga
- NIM: 231011402228
- Program Studi: Teknik Informatika - Universitas Pamulang

## Cara Menjalankan Proyek
1. Jalankan Laragon (aktifkan layanan database / MySQL).
2. Buka terminal di folder proyek `C:\laragon\www\belajar`
3. Pastikan file `.env` sudah dikonfigurasi sesuai database lokal.
4. Jalankan perintah `php artisan migrate` jika perlu menyiapkan tabel.
5. Jalankan `php artisan serve`, lalu buka alamat `http://127.0.0.1:8000` 
6. Untuk menjalankan pengujian otomatis, ketik `php artisan test`