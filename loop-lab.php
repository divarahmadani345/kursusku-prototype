<?php
// Loop Lab - KursusKu
$judulHalaman = "Loop Lab - KursusKu";
$jumlahIterasi = 5;
$diskonPerIterasi = 2; // persen
$jumlahKelompok = 5;
$jumlahGelombang = 5;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($judulHalaman) ?></title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #1f2937;
        }
        header {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 28px 0;
        }
        .brand {
            font-size: 28px;
            font-weight: bold;
            color: #3730a3;
            text-decoration: none;
        }
        nav a {
            margin-left: 24px;
            color: #1f2937;
            font-weight: 600;
            text-decoration: none;
        }
        nav a:hover { color: #3730a3; }
        nav a.active { color: #3730a3; }

        .hero { padding: 56px 0 32px; }
        .eyebrow {
            color: #3730a3;
            font-weight: bold;
            font-size: 18px;
            margin: 0 0 8px;
        }
        h1 {
            margin: 0;
            font-size: 48px;
            line-height: 1.15;
            color: #1f2937;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            margin: 32px 0 64px;
            overflow: hidden;
        }
        .grid-single {
            grid-template-columns: 1fr;
            width: 50%;
            margin-top: 0;
        }
        .card { padding: 40px 44px; }
        .card + .card { border-left: 1px solid #e5e7eb; }
        .card h2 {
            margin: 0 0 24px;
            font-size: 24px;
        }
        .card p {
            margin: 0 0 20px;
            color: #4b5563;
            font-size: 15px;
        }
        .card ul {
            margin: 0;
            padding-left: 28px;
            line-height: 1.9;
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .navbar { flex-direction: column; gap: 16px; }
            nav a { margin: 0 12px; }
            h1 { font-size: 32px; }
            .grid, .grid-single { grid-template-columns: 1fr; }
            .grid-single { width: 100%; }
            .card + .card { border-left: none; border-top: 1px solid #e5e7eb; }
        }
    </style>
</head>
<body>

<header>
    <div class="container navbar">
        <a class="brand" href="index.php">KursusKu</a>
        <nav>
            <a href="index.php">Beranda</a>
            <a href="daftar.php">Daftar</a>
            <a href="riwayat.php">Riwayat</a>
            <a href="loop-lab.php" class="active">Loop Lab</a>
        </nav>
    </div>
</header>

<main class="container">
    <section class="hero">
        <p class="eyebrow">Laboratorium Perulangan</p>
        <h1>Komparasi Structure Looping PHP</h1>
    </section>

    <section class="grid">
        <!-- 1. FOR -->
        <article class="card">
            <h2>1. Perulangan FOR</h2>
            <p>Digunakan ketika jumlah iterasi sudah pasti.</p>
            <ul>
                <?php for ($i = 1; $i <= $jumlahIterasi; $i++): ?>
                    <li>Iterasi ke-<?= $i ?>: Diskon Tambahan <?= $i * $diskonPerIterasi ?>%</li>
                <?php endfor; ?>
            </ul>
        </article>

        <!-- 2. WHILE -->
        <article class="card">
            <h2>2. Perulangan WHILE</h2>
            <p>Mengecek kondisi di awal sebelum eksekusi.</p>
            <ul>
                <?php
                $kelompok = 1;
                while ($kelompok <= $jumlahKelompok):
                ?>
                    <li>Sesi Mentoring Kelompok <?= $kelompok ?></li>
                <?php
                    $kelompok++;
                endwhile;
                ?>
            </ul>
        </article>
    </section>

    <!-- 3. DO-WHILE -->
    <section class="grid grid-single">
        <article class="card">
            <h2>3. Perulangan DO-WHILE</h2>
            <p>Minimal mengeksekusi blok 1 kali terlebih dahulu.</p>
            <ul>
                <?php
                $gelombang = 1;
                do {
                ?>
                    <li>Kuota Terisi Gelombang <?= $gelombang ?></li>
                <?php
                    $gelombang++;
                } while ($gelombang <= $jumlahGelombang);
                ?>
            </ul>
        </article>
    </section>
</main>

</body>
</html>