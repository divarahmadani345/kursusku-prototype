<?php
declare(strict_types=1);

require __DIR__ . '/helpers.php';

// ===== Operator Aritmatika =====
$a = 10;
$b = 3;

// ===== Soal No. 22: Perbandingan Identik =====
$fee = 350000;
$isSame = ($fee === 350000);  // true
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Operator Test - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        :root {
            --brand: #0f766e;
            --brand-dark: #0b5f55;
            --surface: #ffffff;
            --soft: #eef8f5;
            --text: #16332c;
            --muted: #4b635d;
            --line: #d1e7dd;
        }
        * { box-sizing: border-box; }
        body {
            background: linear-gradient(180deg, #eaf7f2 0%, #ffffff 100%);
            min-height: 100vh;
            margin: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
        }
        .site-header { background: var(--brand); padding: 0.9rem 0; }
        .site-header .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 0.75rem;
        }
        .site-header .brand { color: #fff; font-weight: 800; font-size: 1.2rem; text-decoration: none; }
        .site-header nav a { color: #d1f2e4; text-decoration: none; margin-left: 1.2rem; font-size: 0.9rem; }
        .site-header nav a:hover { color: #fff; }
        .site-header nav a.btn-nav { background: #fff; color: var(--brand-dark); padding: 0.4rem 1rem; border-radius: 0.5rem; font-weight: 700; }
        .test-card {
            max-width: 680px;
            margin: 4rem auto;
            background: var(--surface);
            border-radius: 1.25rem;
            padding: 2.5rem;
            box-shadow: 0 15px 40px -10px rgba(15, 118, 110, 0.15);
            position: relative;
            overflow: hidden;
        }
        .test-card::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 60%;
            height: 4px;
            background: var(--brand);
        }
        .test-header { display: flex; align-items: center; gap: 0.6rem; margin-bottom: 0.5rem; }
        .test-header .icon { font-size: 1.6rem; color: var(--brand-dark); }
        .test-header h1 { margin: 0; font-size: 1.8rem; color: var(--text); font-weight: 800; }
        .test-subtitle { color: var(--muted); font-size: 0.95rem; margin: 0 0 1.75rem; }
        .test-values { font-weight: 700; color: var(--text); font-size: 1.05rem; margin-bottom: 1rem; }
        hr { border: none; border-top: 1px solid var(--line); margin: 1rem 0 1.5rem; }
        .badge-grid { display: flex; flex-wrap: wrap; gap: 0.6rem; margin-bottom: 2rem; }
        .badge-result {
            background: var(--soft);
            color: var(--brand-dark);
            font-family: monospace;
            font-size: 0.85rem;
            font-weight: 700;
            padding: 0.5rem 0.9rem;
            border-radius: 999px;
            border: 1px solid var(--line);
        }
        .btn-back { display: inline-block; background: var(--brand); color: #fff; text-decoration: none; padding: 0.75rem 1.5rem; border-radius: 0.6rem; font-weight: 700; font-size: 0.95rem; }
        .btn-back:hover { background: var(--brand-dark); }
        .site-footer { text-align: center; padding: 1.5rem 0; background: #0b1f1c; color: #9cb8b0; font-size: 0.85rem; margin-top: 4rem; }
    </style>
</head>
<body>

<header class="site-header">
    <div class="container">
        <a href="index.php" class="brand">KursusKu</a>
        <nav>
            <a href="index.php">Beranda</a>
            <a href="loop-lab.php">Loop Lab</a>
            <a href="history-dummy.php">History</a>
            <a href="register.php" class="btn-nav">Daftar</a>
        </nav>
    </div>
</header>

<main>
    <div class="test-card">
        <div class="test-header">
            <span class="icon">➕</span>
            <h1>Operator Test</h1>
        </div>
        <p class="test-subtitle">Latihan operator aritmatika & perbandingan PHP.</p>

        <p class="test-values">Nilai: a = <?= $a ?>, b = <?= $b ?></p>

        <hr>

        <div class="badge-grid">
            <span class="badge-result">a + b = <?= $a + $b ?></span>
            <span class="badge-result">a - b = <?= $a - $b ?></span>
            <span class="badge-result">a × b = <?= $a * $b ?></span>
            <span class="badge-result">a ÷ b = <?= $a / $b ?></span>
            <span class="badge-result">a % b = <?= $a % $b ?></span>
            <span class="badge-result">a ** b = <?= $a ** $b ?></span>
        </div>

        <hr>
        <p class="test-values">Perbandingan Identik (===): fee = <?= $fee ?></p>
        <div class="badge-grid">
            <span class="badge-result">$fee === 350000 = <?php var_dump($isSame); ?></span>
        </div>

        <a href="index.php" class="btn-back">← Kembali ke Beranda</a>
    </div>
</main>

<footer class="site-footer">
    <p>&copy; <?= date('Y') ?> KursusKu - Praktikum Pemrograman Web III.</p>
</footer>

</body>
</html>