<?php
require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu';
$tagline = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$year = date('Y');

// ===============================
// DATA DASAR KURSUS & KALKULATOR
// ===============================
$courseName = 'Laravel Fundamental';
$fee = 350000;
$participantCount = 2;
$discountPercent = 10;
$adminFee = 25000;
$isActive = true;

// Subtotal
$subtotal = $fee * $participantCount;

// Diskon
$discount = intdiv($subtotal * $discountPercent, 100);

// Total akhir
$total = $subtotal - $discount + $adminFee;

// Menu navigasi (label, tautan)
$menu = [
    ['Beranda',        'index.php'],
    ['Keunggulan',     'index.php#keunggulan'],
    ['Katalog',        'index.php#katalog'],
    ['Cara Daftar',    'index.php#pendaftaran'],
    ['Loop Lab',       'loop-lab.php'],
    ['Estimasi Biaya', '#estimasi-biaya'],
];

// Kartu latihan PHP (ikon, judul, deskripsi, file tujuan)
$labs = [
    ['🔁', 'Loop Lab',         'Latihan for, while, do-while, foreach, break, continue.', 'loop-lab.php'],
    ['📜', 'History-dummy',    'Riwayat pendaftaran peserta kursus.',                     'history-dummy.php'],
    ['🔤', 'String Test',      'Latihan manipulasi string di PHP.',                       'string-test.php'],
    ['🧠', 'Logic Test',       'Latihan operator logika (AND, OR, NOT, XOR).',            'logic-test.php'],
    ['📦', 'Date Test',        'Latihan tipe data PHP.',                                  'date-test.php'],
    ['🔢', 'Bitwise Test',     'Latihan operator bitwise PHP.',                           'bitwise-test.php'],
    ['⚙️', 'Procedure Test',   'Latihan fungsi dan prosedur di PHP.',                     'procedure-test.php'],
    ['🧰', 'Test Functions',   'Uji fungsi helper (formatRupiah, dll).',                  'test-functions.php'],
    ['📊', 'Tes Matrix',       'Latihan array multidimensi.',                             'tes-matrix.php'],
    ['🧬', 'Type Data Test',   'Uji tipe data lanjutan (gettype, var_export).',           'type-data-test.php'],
    ['🕒', 'Server Time',      'Menampilkan waktu server (Asia/Jakarta).',                'server-time.php'],
    ['🕒', 'Server Time',      'Menampilkan waktu server (Asia/Jakarta).',                'server-time.php'],
    ['💰', 'Fee Tests',        'Uji perhitungan biaya kursus.',                           'fee-tests.php'],
    ['📥', 'Get Demo',         'Demo mengirim data lewat metode GET.',                    'get-demo.php'],
    ['📝', 'Register',         'Formulir pendaftaran peserta kursus.',                    'register.php'],
];

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

    <title><?= htmlspecialchars($siteName) ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="assets/css/style.css?v=<?= @filemtime(__DIR__ . '/assets/css/style.css') ?: time() ?>">

    <!-- Gaya kartu latihan: ditaruh di sini supaya tetap tampil walau style.css belum terganti -->
    <style>
        #latihan { max-width: 1120px; margin: 0 auto; padding: 36px 16px 8px; font-family: "Plus Jakarta Sans", system-ui, -apple-system, "Segoe UI", sans-serif; }
        #latihan h2 { margin: 0 0 6px; font-size: 24px; font-weight: 800; letter-spacing: -0.015em; color: #16231e; }
        #latihan .lead { margin: 0; color: #5b6b64; }
        #latihan .grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 20px; margin-top: 22px; }
        #latihan .card { display: flex; flex-direction: column; gap: 6px; min-height: 190px; padding: 24px 26px 26px; box-sizing: border-box; border-radius: 16px; border: 1px solid #d9e1dd; background: #f8faf9; color: #16231e; text-decoration: none; transition: transform .15s ease, box-shadow .15s ease, background .15s ease; }
        #latihan .card:hover { background: #ffffff; transform: translateY(-2px); box-shadow: 0 8px 22px rgba(20, 50, 40, .10); }
        #latihan .card .ico { display: block; margin-bottom: 14px; font-size: 34px; line-height: 1; text-decoration: none; }
        #latihan .card h3 { margin: 0; font-size: 18px; font-weight: 700; letter-spacing: -0.01em; text-decoration: none; color: #16231e; }
        #latihan .card p { margin: 0; font-size: 14px; color: #5b6b64; text-decoration: none; }
        
        /* Tambahan style khusus kalkulator biaya */
        .fee-card {
            background: white;
            padding: 24px;
            border-radius: 16px;
            border: 1px solid #d9e1dd;
            box-shadow: 0 4px 15px rgba(0,0,0,0.04);
        }
        .fee-course {
            background: #eaf7f3;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .fee-status {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: bold;
            background: <?= $isActive ? '#d1fae5' : '#fee2e2' ?>;
            color: <?= $isActive ? '#065f46' : '#991b1b' ?>;
        }
        .fee-total-row {
            background: #eaf7f3;
            font-weight: bold;
            font-size: 16px;
        }

        @media (max-width: 900px) { #latihan .grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        @media (max-width: 560px) { #latihan .grid { grid-template-columns: minmax(0, 1fr); } #latihan .card { min-height: 0; padding: 20px; } }
    </style>
</head>

<body>

    <header class="site-header">
        <div class="container navbar">
            <a class="brand" href="index.php">
                <span class="logo" aria-hidden="true">🎓</span>
                <?= htmlspecialchars($siteName) ?>
            </a>

            <nav aria-label="Menu utama">
                <?php foreach ($menu as [$label, $url]): ?>
                    <a href="<?= htmlspecialchars($url) ?>"><?= htmlspecialchars($label) ?></a>
                <?php endforeach; ?>
                <a class="nav-cta" href="registration.php">Daftar Kursus</a>
            </nav>
        </div>
    </header>

    <main>

        <!-- HERO -->
        <section class="container hero" id="beranda">
            <div>
                <h1><?= htmlspecialchars($siteName) ?></h1>
                <p><?= htmlspecialchars($tagline) ?></p>

                <a href="#katalog" class="cta">Lihat Katalog Kursus</a>
            </div>

            <figure class="hero-photo">
                <img src="assets/images/hero-kursus.jpg" alt="Pembelajaran kursus">
            </figure>
        </section>

        <!-- VIDEO -->
        <section class="container section" id="video">
            <h2>Video Perkenalan KursusKu</h2>

            <video controls>
                <source src="assets/video/intro-kursus.mp4" type="video/mp4">
                Browser kamu tidak mendukung video.
            </video>
        </section>

        <!-- KEUNGGULAN -->
        <section class="container section" id="keunggulan">
            <h2>Mengapa Memilih KursusKu?</h2>

            <div class="perks">
                <article>
                    <h3>Materi Terarah</h3>
                    <p>Materi pembelajaran disusun secara terstruktur dan mudah diikuti.</p>
                </article>

                <article>
                    <h3>Belajar dengan Proyek</h3>
                    <p>Peserta belajar melalui latihan dan proyek yang dapat dipraktikkan.</p>
                </article>

                <article>
                    <h3>Pendampingan Praktik</h3>
                    <p>Peserta mendapatkan arahan untuk membantu memahami praktik pembelajaran.</p>
                </article>
            </div>
        </section>

        <!-- KATALOG KURSUS -->
        <section class="container section" id="katalog">
            <h2>Katalog Kursus</h2>

            <div class="table-wrap">
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
                            <?php
                            $status = statusKursus($course['quota'], $course['registered']);
                            $statusClass = strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $status), '-'));
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($course['code']) ?></td>
                                <td><?= htmlspecialchars($course['name']) ?></td>
                                <td><?= rupiah($course['fee']) ?></td>
                                <td><?= $course['quota'] ?></td>
                                <td><?= $course['registered'] ?></td>
                                <td><?= sisaKursi($course['quota'], $course['registered']) ?></td>
                                <td><span class="badge badge-<?= htmlspecialchars($statusClass) ?>"><?= htmlspecialchars($status) ?></span></td>
                                <td><?= formatTanggal($course['start_date']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- ESTIMASI BIAYA (KALKULATOR) -->
        <section class="container section" id="estimasi-biaya">
            <h2>Kalkulator Estimasi Biaya</h2>
            <p style="color: #5b6b64; margin-bottom: 20px;">Simulasi perhitungan biaya pelatihan untuk kursus pilihan.</p>

            <div class="fee-card">
                <div class="fee-course">
                    <div>
                        <strong>Kursus:</strong> <?= htmlspecialchars($courseName) ?>
                    </div>
                    <span class="fee-status">
                        <?= $isActive ? 'Aktif' : 'Nonaktif' ?>
                    </span>
                </div>

                <div class="table-wrap">
                    <table>
                        <tr>
                            <th>Komponen</th>
                            <th>Nilai</th>
                        </tr>
                        <tr>
                            <td>Biaya per peserta</td>
                            <td>Rp <?= number_format($fee, 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah peserta</td>
                            <td><?= $participantCount ?> orang</td>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td>Diskon (<?= $discountPercent ?>%)</td>
                            <td>- Rp <?= number_format($discount, 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td>Biaya admin</td>
                            <td>Rp <?= number_format($adminFee, 0, ',', '.') ?></td>
                        </tr>
                        <tr class="fee-total-row">
                            <td>Total akhir</td>
                            <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>

        <!-- LANGKAH PENDAFTARAN -->
        <section class="container section" id="pendaftaran">
            <h2>Langkah Pendaftaran</h2>

            <ol class="steps">
                <li>Pilih kursus yang ingin diikuti.</li>
                <li>Periksa biaya, kuota, dan tanggal mulai kursus.</li>
                <li>Lakukan pendaftaran sesuai informasi yang tersedia.</li>
                <li>Tunggu konfirmasi dari KursusKu.</li>
            </ol>
        </section>

        <!-- KONTAK -->
        <section class="container section" id="kontak">
            <h2>Kontak</h2>

            <p>Email: info@kursusku.test</p>
            <p>Telepon: 0812-3456-7890</p>

            <p><a class="text-link" href="server-time.php">Lihat waktu server</a></p>
        </section>

        <!-- LATIHAN PHP -->
        <section class="container section" id="latihan">
            <h2>Latihan PHP</h2>
            <p class="lead">Kumpulan file latihan untuk memperdalam materi PHP.</p>

            <div class="grid">
                <?php foreach ($labs as [$icon, $title, $desc, $url]): ?>
                    <a class="card" href="<?= htmlspecialchars($url) ?>">
                        <span class="ico" aria-hidden="true"><?= $icon ?></span>
                        <h3><?= htmlspecialchars($title) ?></h3>
                        <p><?= htmlspecialchars($desc) ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>

    </main>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; <?= $year ?> KursusKu</p>
        </div>
    </footer>

</body>

</html>