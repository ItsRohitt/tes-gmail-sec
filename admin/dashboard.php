<?php
session_start();
if (empty($_SESSION['admin'])) { header('Location: login.php'); exit; }
require __DIR__ . '/../config.php';
$rows = db()->query('SELECT id, consented_at, browser, device FROM visits ORDER BY id DESC LIMIT 200')->fetchAll();
$total = db()->query('SELECT COUNT(*) FROM visits')->fetchColumn();
?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Dashboard</title><link rel="stylesheet" href="../assets/style.css"></head>
<body><main class="wide">
<header class="top"><div><p class="eyebrow">ADMINISTRATOR</p><h1>Dashboard simulasi</h1><p class="muted">Data hanya berasal dari pengunjung yang menyetujui pencatatan.</p></div><a href="logout.php">Keluar</a></header>
<section class="stat"><span>Total persetujuan tercatat</span><strong><?= (int)$total ?></strong></section>
<div class="table-wrap"><table><thead><tr><th>ID</th><th>Waktu</th><th>Browser</th><th>Perangkat</th></tr></thead><tbody>
<?php foreach ($rows as $r): ?><tr><td><?= (int)$r['id'] ?></td><td><?= htmlspecialchars($r['consented_at']) ?></td><td><?= htmlspecialchars($r['browser']) ?></td><td><?= htmlspecialchars($r['device']) ?></td></tr><?php endforeach; ?>
<?php if (!$rows): ?><tr><td colspan="4">Belum ada data simulasi.</td></tr><?php endif; ?>
</tbody></table></div>
<p class="small">Tidak mengumpulkan IP, lokasi GPS, email, password, atau OTP.</p>
</main></body></html>
