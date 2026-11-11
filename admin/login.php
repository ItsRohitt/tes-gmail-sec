<?php
session_start();
require __DIR__ . '/../config.php';
require __DIR__ . '/settings.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (password_verify($_POST['password'] ?? '', ADMIN_PASSWORD_HASH)) {
        session_regenerate_id(true);
        $_SESSION['admin'] = true;
        header('Location: dashboard.php'); exit;
    }
    $error = 'Password admin salah.';
}
?>
<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Admin</title><link rel="stylesheet" href="../assets/style.css"></head>
<body><main class="card"><p class="eyebrow">AREA ADMIN</p><h1>Masuk dashboard</h1>
<?php if ($error): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form method="post"><label>Password admin</label><input type="password" name="password" required autocomplete="current-password"><button type="submit">Masuk</button></form>
<p class="small">Password awal untuk instalasi lokal dijelaskan di README. Ganti sebelum dipublikasikan.</p></main></body></html>
