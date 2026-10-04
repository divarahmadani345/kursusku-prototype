<?php

$tests = [
    [
        'no' => 1,
        'skenario' => 'Mahasiswa + Web Dasar',
        'input' => 'Mahasiswa, Web Dasar, UI/UX + Database',
        'hasil' => 'Diskon 20%, Total Rp160.000',
        'status' => 'PASS'
    ],
    [
        'no' => 2,
        'skenario' => 'Guru + PHP Dasar',
        'input' => 'Guru, PHP Dasar, Backend',
        'hasil' => 'Diskon 15%, Total Rp212.500',
        'status' => 'PASS'
    ],
    [
        'no' => 3,
        'skenario' => 'Umum + PHP Lanjutan',
        'input' => 'Umum, PHP Lanjutan, Backend',
        'hasil' => 'Diskon 10%, Total Rp270.000',
        'status' => 'PASS'
    ],
    [
        'no' => 4,
        'skenario' => 'Mahasiswa + PHP Lanjutan',
        'input' => 'Mahasiswa, PHP Lanjutan, Backend',
        'hasil' => 'Diskon 20%, Total Rp240.000',
        'status' => 'PASS'
    ],
    [
        'no' => 5,
        'skenario' => 'Guru + PHP Lanjutan',
        'input' => 'Guru, PHP Lanjutan, Backend',
        'hasil' => 'Diskon 15%, Total Rp255.000',
        'status' => 'PASS'
    ],
    [
        'no' => 6,
        'skenario' => 'Checkbox minat lebih dari satu',
        'input' => 'UI/UX + Database',
        'hasil' => 'Semua minat tampil',
        'status' => 'PASS'
    ],
    [
        'no' => 7,
        'skenario' => 'Checkbox minat kosong',
        'input' => 'Tidak memilih minat',
        'hasil' => 'Pendaftaran tetap berhasil',
        'status' => 'PASS'
    ],
    [
        'no' => 8,
        'skenario' => 'Semua pilihan kursus',
        'input' => '6 pilihan kursus',
        'hasil' => 'Semua kursus tampil',
        'status' => 'PASS'
    ],
    [
        'no' => 9,
        'skenario' => 'History Dummy',
        'input' => 'Klik History Dummy',
        'hasil' => 'Halaman riwayat tampil',
        'status' => 'PASS'
    ],
    [
        'no' => 10,
        'skenario' => 'Loop Lab',
        'input' => 'Klik Loop Lab',
        'hasil' => 'Daftar kursus tampil dengan loop',
        'status' => 'PASS'
    ]
];

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Matrix - KursusKu</title>

    <link rel="stylesheet"
          href="/kursusku-prototype/assets/css/style.css?v=5">
</head>

<body>

<header class="header">
    <div class="container">
        <h1>KursusKu</h1>
        <p>Test Matrix Week 06</p>
    </div>
</header>

<nav class="navbar">
    <div class="container">
        <a href="index.php">Beranda</a>
        <a href="registration.php">Daftar Kursus</a>
        <a href="history-dummy.php">History Dummy</a>
        <a href="loop-lab.php">Loop Lab</a>
    </div>
</nav>

<main class="container">

    <section class="section">
        <h2>Test Matrix Week 06</h2>

        <p>
            Pengujian fitur form, pilihan kursus, tipe peserta,
            checkbox minat, diskon, total biaya, History Dummy,
            dan Loop Lab.
        </p>

        <div style="overflow-x:auto;">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Skenario Pengujian</th>
                        <th>Input</th>
                        <th>Hasil yang Diharapkan</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($tests as $test): ?>
                        <tr>
                            <td><?= e($test['no']) ?></td>
                            <td><?= e($test['skenario']) ?></td>
                            <td><?= e($test['input']) ?></td>
                            <td><?= e($test['hasil']) ?></td>
                            <td><?= e($test['status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </section>

</main>

<footer class="footer">
    <div class="container">
        <p>&copy; 2026 KursusKu</p>
    </div>
</footer>

</body>
</html>