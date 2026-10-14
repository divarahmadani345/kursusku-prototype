<?php
require_once __DIR__ . '/helpers.php';
$siteName = 'KursusKu';
$year     = date('Y');
$data = [
    'String'  => 'KursusKu',
    'Integer' => 2026,
    'Float'   => 3.14,
    'Boolean' => true,
    'Null'    => null,
    'Array'   => ['PHP', 'MySQL'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Type Data Test - <?= htmlspecialchars($siteName) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="index.php"><span class="brand-title"><?= htmlspecialchars($siteName) ?></span></a>
        <nav>
            <a href="index.php">Beranda</a>
            <a href="loop-lab.php">Loop Lab</a>
            <a href="history.php">History</a>
            <a href="registration.php" class="btn-nav-action">Daftar</a>
        </nav>
    </div>
</header>

<main class="utility-page">
    <div class="utility-card wide-card">
        <h1>🧬 Type Data Test</h1>
        <p>Uji tipe data lanjutan (gettype, var_export).</p>

        <div class="table-container">
            <table class="cost-table compact-table">
                <thead>
                    <tr><th>Variabel</th><th>Nilai</th><th>Tipe</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key => $val): ?>
                        <tr>
                            <td><strong><?= $key ?></strong></td>
                            <td><?= is_array($val) ? implode(', ', $val) : var_export($val, true) ?></td>
                            <td><code><?= gettype($val) ?></code></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <p style="margin-top:32px;">
            <a href="index.php" class="btn-primary">← Kembali ke Beranda</a>
        </p>
    </div>
</main>

<footer class="site-footer">
    <div class="container footer-content">
        <p>&copy; <?= $year ?> <strong><?= htmlspecialchars($siteName) ?></strong> - Praktikum Pemrograman Web III.</p>
    </div>
</footer>
</body>
</html>