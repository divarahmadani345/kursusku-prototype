<?php
// Bitwise Test - KursusKu
$judulHalaman = "Bitwise Test - KursusKu";

// Nilai uji
$a = 12; // 00001100
$b = 10; // 00001010
$geser = 2;

// Helper: tampilkan biner 8 bit
function biner(int $n): string
{
    return sprintf('%08b', $n & 0xFF);
}

// Daftar operasi bitwise
$operasi = [
    ['nama' => 'AND',         'simbol' => '&',  'hasil' => $a & $b,       'ket' => 'Bit bernilai 1 jika kedua bit bernilai 1.'],
    ['nama' => 'OR',          'simbol' => '|',  'hasil' => $a | $b,       'ket' => 'Bit bernilai 1 jika salah satu bit bernilai 1.'],
    ['nama' => 'XOR',         'simbol' => '^',  'hasil' => $a ^ $b,       'ket' => 'Bit bernilai 1 jika kedua bit berbeda.'],
    ['nama' => 'NOT',         'simbol' => '~',  'hasil' => ~$a,           'ket' => 'Membalik semua bit dari $a.'],
    ['nama' => 'Shift Left',  'simbol' => '<<', 'hasil' => $a << $geser,  'ket' => "Menggeser bit \$a ke kiri $geser kali (dikali 2^$geser)."],
    ['nama' => 'Shift Right', 'simbol' => '>>', 'hasil' => $a >> $geser,  'ket' => "Menggeser bit \$a ke kanan $geser kali (dibagi 2^$geser)."],
];

// Contoh penerapan: hak akses dengan bit flag
const AKSES_BACA   = 1; // 001
const AKSES_TULIS  = 2; // 010
const AKSES_HAPUS  = 4; // 100

$izinPengguna = AKSES_BACA | AKSES_TULIS; // punya baca + tulis
$daftarIzin = [
    'Baca'  => AKSES_BACA,
    'Tulis' => AKSES_TULIS,
    'Hapus' => AKSES_HAPUS,
];
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
        nav a:hover, nav a.active { color: #3730a3; }

        .hero { padding: 56px 0 16px; }
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
        }

        .panel {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 36px 44px;
            margin: 32px 0 40px;
        }
        .panel h2 { margin: 0 0 12px; font-size: 24px; }
        .panel p { margin: 0 0 20px; color: #4b5563; font-size: 15px; }

        .nilai {
            display: flex;
            gap: 32px;
            flex-wrap: wrap;
            margin-bottom: 24px;
            font-size: 18px;
        }
        code, .bin {
            font-family: Consolas, "Courier New", monospace;
        }
        .bin { letter-spacing: 1px; }

        table { width: 100%; border-collapse: collapse; font-size: 16px; }
        th, td {
            text-align: left;
            padding: 12px 14px;
            border-bottom: 1px solid #e5e7eb;
        }
        th { background: #f1f5f9; font-size: 14px; }
        td.simbol { font-weight: bold; color: #3730a3; }

        .badge {
            display: inline-block;
            padding: 3px 12px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: bold;
        }
        .ya    { background: #dcfce7; color: #166534; }
        .tidak { background: #fee2e2; color: #991b1b; }

        .table-wrap { overflow-x: auto; }

        @media (max-width: 768px) {
            .navbar { flex-direction: column; gap: 16px; }
            nav a { margin: 0 12px; }
            h1 { font-size: 32px; }
            .panel { padding: 24px; }
        }
    </style>
</head>
<body>

<header>
    <div class="container navbar">
        <a class="brand" href="index.php">KursusKu</a>
        <nav>
            <a href="index.php">Beranda</a>
            <a href="registration.php">Daftar</a>
            <a href="history-dummy.php">Riwayat</a>
            <a href="loop-lab.php">Loop Lab</a>
            <a href="bitwise-test.php" class="active">Bitwise</a>
        </nav>
    </div>
</header>

<main class="container">
    <section class="hero">
        <p class="eyebrow">Laboratorium Operator</p>
        <h1>Pengujian Operator Bitwise PHP</h1>
    </section>

    <!-- 1. Operasi dasar -->
    <section class="panel">
        <h2>1. Operasi Bitwise Dasar</h2>
        <p>Dua nilai uji dibandingkan bit demi bit (ditampilkan dalam 8 bit).</p>

        <div class="nilai">
            <div>$a = <strong><?= $a ?></strong> &rarr; <span class="bin"><?= biner($a) ?></span></div>
            <div>$b = <strong><?= $b ?></strong> &rarr; <span class="bin"><?= biner($b) ?></span></div>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Operasi</th>
                        <th>Simbol</th>
                        <th>Ekspresi</th>
                        <th>Hasil (desimal)</th>
                        <th>Hasil (biner)</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($operasi as $op): ?>
                        <?php
                        $ekspresi = in_array($op['simbol'], ['<<', '>>'], true)
                            ? "\$a {$op['simbol']} $geser"
                            : ($op['simbol'] === '~' ? "~\$a" : "\$a {$op['simbol']} \$b");
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($op['nama']) ?></td>
                            <td class="simbol"><?= htmlspecialchars($op['simbol']) ?></td>
                            <td><code><?= htmlspecialchars($ekspresi) ?></code></td>
                            <td><?= $op['hasil'] ?></td>
                            <td class="bin"><?= biner($op['hasil']) ?></td>
                            <td><?= htmlspecialchars($op['ket']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- 2. Studi kasus: hak akses -->
    <section class="panel">
        <h2>2. Studi Kasus: Hak Akses dengan Bit Flag</h2>
        <p>
            Izin pengguna disimpan dalam satu angka:
            <code>$izinPengguna = AKSES_BACA | AKSES_TULIS</code>
            = <strong><?= $izinPengguna ?></strong>
            (<span class="bin"><?= sprintf('%03b', $izinPengguna) ?></span>).
            Pengecekan memakai <code>&amp;</code>.
        </p>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Izin</th>
                        <th>Nilai Flag</th>
                        <th>Biner</th>
                        <th>Dimiliki?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($daftarIzin as $nama => $flag): ?>
                        <?php $punya = ($izinPengguna & $flag) === $flag; ?>
                        <tr>
                            <td><?= htmlspecialchars($nama) ?></td>
                            <td><?= $flag ?></td>
                            <td class="bin"><?= sprintf('%03b', $flag) ?></td>
                            <td>
                                <span class="badge <?= $punya ? 'ya' : 'tidak' ?>">
                                    <?= $punya ? 'Ya' : 'Tidak' ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

</body>
</html>