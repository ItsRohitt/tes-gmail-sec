<?php
session_start();
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simulasi Kesadaran Keamanan</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <main class="card">
    <div class="mark">🔐</div>
    <p class="eyebrow">SIMULASI KEAMANAN DIGITAL</p>
    <h1>Uji Kesadaran Phishing</h1>
    <p>Halaman ini adalah simulasi edukasi keamanan, bukan halaman login Google atau layanan email.</p>
    <div class="notice">
      <strong>Privasi:</strong> Jika kamu memilih ikut, sistem hanya mencatat waktu persetujuan,
      jenis browser, dan kategori perangkat secara umum. Jangan masukkan password, kode OTP,
      nomor telepon, atau informasi pribadi.
    </div>
    <form action="record.php" method="post">
      <input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf'] ??= bin2hex(random_bytes(32))) ?>">
      <label class="check"><input type="checkbox" name="consent" value="yes" required> Saya memahami ini simulasi dan setuju mencatat kunjungan saya.</label>
      <button type="submit">Ikut simulasi</button>
    </form>
    <p class="small">Tidak ada kredensial yang diminta atau disimpan.</p>
  </main>
</body>
</html>
