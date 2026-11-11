<?php
session_start();
require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' ||
    empty($_POST['consent']) || $_POST['consent'] !== 'yes' ||
    empty($_SESSION['csrf']) ||
    !hash_equals($_SESSION['csrf'], $_POST['csrf'] ?? '')) {
    http_response_code(400);
    exit('Permintaan tidak valid. Kembali ke halaman utama.');
}

$ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
$browser = 'Lainnya';
if (stripos($ua, 'Edg/') !== false) $browser = 'Edge';
elseif (stripos($ua, 'Chrome/') !== false) $browser = 'Chrome';
elseif (stripos($ua, 'Firefox/') !== false) $browser = 'Firefox';
elseif (stripos($ua, 'Safari/') !== false) $browser = 'Safari';

$device = 'Tidak diketahui';
if (preg_match('/(iphone|android|mobile)/i', $ua)) $device = 'Mobile';
elseif (preg_match('/(ipad|tablet)/i', $ua)) $device = 'Tablet';
elseif ($ua !== '') $device = 'Desktop/komputer';

try {
    $pdo = db();
    $stmt = $pdo->prepare('INSERT INTO visits (consented_at, browser, device) VALUES (NOW(), ?, ?)');
    $stmt->execute([$browser, $device]);
} catch (Throwable $e) {
    http_response_code(500);
    exit('Gagal menyimpan hasil. Periksa konfigurasi database.');
}
?>
<!doctype html>
<html lang="id"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Simulasi selesai</title><link rel="stylesheet" href="assets/style.css"></head>
<body><main class="card">
<div class="mark">✓</div><p class="eyebrow">SIMULASI SELESAI</p>
<h1>Terima kasih sudah berpartisipasi</h1>
<p>Kunjunganmu tercatat setelah persetujuan diberikan.</p>
<div class="notice"><strong>Tips:</strong> Periksa alamat situs sebelum masuk, jangan pernah membagikan password atau OTP, dan aktifkan verifikasi dua langkah.</div>
<a class="button-link" href="index.php">Kembali</a>
</main></body></html>
