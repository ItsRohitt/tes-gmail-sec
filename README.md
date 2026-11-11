# Gmail Security Awareness (simulasi aman)

Aplikasi PHP + MySQL untuk simulasi edukasi keamanan. Pengunjung melihat pemberitahuan yang jelas dan harus menyetujui pencatatan sebelum sistem menyimpan waktu, kategori browser, dan kategori perangkat.

## Tidak dikumpulkan
- Password, OTP, email, nomor telepon
- Alamat IP
- Lokasi GPS
- Isi email atau data dari perangkat

## Instalasi dengan XAMPP
1. Salin folder `gmail_security_awareness` ke `C:\xampp\htdocs\`.
2. Jalankan Apache dan MySQL dari XAMPP.
3. Buka `http://localhost/phpmyadmin`.
4. Import `database/schema.sql`.
5. Pastikan pengaturan di `config.php` cocok dengan MySQL lokal kamu.
6. Buka `http://localhost/gmail_security_awareness/`.
7. Dashboard admin: `http://localhost/gmail_security_awareness/admin/login.php`.

## Password admin awal
Password awal: `ChangeThisAdmin123!`

Sebelum dipasang online, ubah hash pada `admin/settings.php`. Buat hash baru melalui terminal PHP:
`php -r "echo password_hash('PASSWORD_BARU', PASSWORD_DEFAULT), PHP_EOL;"`

Jangan gunakan password admin contoh untuk hosting publik. Gunakan HTTPS, password admin unik, batasi akses dashboard, dan tampilkan pemberitahuan privasi yang sesuai. Untuk pengujian, bagikan link hanya kepada peserta yang mengetahui atau menyetujui simulasi.

## Jalankan cepat dengan PHP built-in server
Dari folder proyek:
`php -S 127.0.0.1:8000`
Lalu buka `http://127.0.0.1:8000`. MySQL tetap harus aktif dan database sudah di-import.
