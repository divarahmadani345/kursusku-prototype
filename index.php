<?php
require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu';
$tagline = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$year = date('Y');

$courses = [
    [
        'code' => 'WEB-01',
        'name' => 'Web Dasar',
        'fee' => 200000,
        'quota' => 30,
        'registered' => 12,
        'start_date' => '2026-09-21',
    ],
    [
        'code' => 'PHP-01',
        'name' => 'PHP Dasar',
        'fee' => 250000,
        'quota' => 30,
        'registered' => 18,
        'start_date' => '2026-09-22',
    ],
    [
        'code' => 'PHP-02',
        'name' => 'PHP Lanjutan',
        'fee' => 300000,
        'quota' => 25,
        'registered' => 24,
        'start_date' => '2026-09-24',
    ],
    [
        'code' => 'LAR-01',
        'name' => 'Laravel Fundamental',
        'fee' => 350000,
        'quota' => 25,
        'registered' => 25,
        'start_date' => '2026-09-28',
    ],
    [
        'code' => 'DB-01',
        'name' => 'MySQL Dasar',
        'fee' => 275000,
        'quota' => 20,
        'registered' => 0,
        'start_date' => '2026-10-01',
    ],
    [
        'code' => 'UI-01',
        'name' => 'UI Web Dasar',
        'fee' => 225000,
        'quota' => 35,
        'registered' => 9,
        'start_date' => '2026-10-03',
    ],
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $siteName ?></title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<main>
    <body>

<header class="site-header">
    <nav>
        <a href="#keunggulan">Keunggulan</a>
        <a href="#katalog">Katalog</a>
        <a href="#pendaftaran">Pendaftaran</a>
        <a href="#kontak">Kontak</a>
    </nav>
</header>

<main>
    <section class="hero">

    <div>
        <h1><?= $siteName ?></h1>

        <p><?= $tagline ?></p>

        <a href="#katalog" class="cta">
            Lihat Katalog Kursus
        </a>
    </div>

    <div>
        <img
            src="assets/images/hero-kursus.jpg"
            alt="Pembelajaran kursus"
        >
    </div>

</section>

<section id="video">

    <h2>Video Perkenalan KursusKu</h2>

    <video controls width="100%">
        <source src="assets/video/intro-kursus.mp4" type="video/mp4">
        Browser kamu tidak mendukung video.
    </video>

</section>


    <!-- KEUNGGULAN -->
    <section id="keunggulan">

        <h2>Mengapa Memilih KursusKu?</h2>

        <article>
            <h3>Materi Terarah</h3>
            <p>
                Materi pembelajaran disusun secara terstruktur
                dan mudah diikuti.
            </p>
        </article>

        <article>
            <h3>Belajar dengan Proyek</h3>
            <p>
                Peserta belajar melalui latihan dan proyek
                yang dapat dipraktikkan.
            </p>
        </article>

        <article>
            <h3>Pendampingan Praktik</h3>
            <p>
                Peserta mendapatkan arahan untuk membantu
                memahami praktik pembelajaran.
            </p>
        </article>

    </section>


    <!-- KATALOG KURSUS -->
    <section id="katalog">

        <h2>Katalog Kursus</h2>

        <table>

            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Kursus</th>
                    <th>Biaya</th>
                    <th>Kuota</th>
                    <th>Terdaftar</th>
                    <th>Sisa Kursi</th>
                    <th>Status</th>
                    <th>Tanggal Mulai</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($courses as $course): ?>

                    <tr>
                        <td>
                            <?= htmlspecialchars($course['code']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($course['name']) ?>
                        </td>

                        <td>
                            <?= rupiah($course['fee']) ?>
                        </td>

                        <td>
                            <?= $course['quota'] ?>
                        </td>

                        <td>
                            <?= $course['registered'] ?>
                        </td>

                        <td>
                            <?= sisaKursi(
                                $course['quota'],
                                $course['registered']
                            ) ?>
                        </td>

                        <td>
                            <?= statusKursus(
                                $course['quota'],
                                $course['registered']
                            ) ?>
                        </td>

                        <td>
                            <?= formatTanggal($course['start_date']) ?>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </section>

<section id="pendaftaran">

    <h2>Langkah Pendaftaran</h2>

    <ol>
        <li>Pilih kursus yang ingin diikuti.</li>
        <li>Periksa biaya, kuota, dan tanggal mulai kursus.</li>
        <li>Lakukan pendaftaran sesuai informasi yang tersedia.</li>
        <li>Tunggu konfirmasi dari KursusKu.</li>
    </ol>

</section>
<!-- KONTAK -->
<section id="kontak">

    <h2>Kontak</h2>

    <p>Email: info@kursusku.test</p>
    <p>Telepon: 0812-3456-7890</p>

    <p>
        <a href="server-time.php">
            Lihat waktu server
        </a>
    </p>

</section>

<footer>
    <p>&copy; <?= $year ?> KursusKu</p>
</footer>
    <p>Tahun: <?= $year ?></p>

</main>

</body>
</html>