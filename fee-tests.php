<?php
// fee-tests.php
// Uji otomatis sederhana untuk perhitungan biaya kursus KursusKu.
// File ini berdiri sendiri (tidak butuh fee-calculator.php).

// ---------- Fungsi yang diuji ----------

// Diskon (%) berdasarkan kategori peserta
function diskonKategori($kategori)
{
    switch ($kategori) {
        case 'pelajar':
            return 20;
        case 'alumni':
            return 15;
        default:
            return 0;
    }
}

// Diskon (%) berdasarkan kode promo
function diskonPromo($kodePromo)
{
    if ($kodePromo === 'HEMAT10') {
        return 10;
    }
    if ($kodePromo === 'HEMAT25') {
        return 25;
    }
    return 0;
}

// Hitung total biaya, diskon maksimal 30%
function hitungTotalBiaya($harga, $kategori = 'umum', $kodePromo = null)
{
    if ($harga < 0) {
        return 0;
    }

    $diskon = diskonKategori($kategori) + diskonPromo($kodePromo);
    if ($diskon > 30) {
        $diskon = 30;
    }

    return $harga - ($harga * $diskon / 100);
}

// Biaya pendaftaran tambahan (admin) 2,5%, minimal 10.000
function biayaAdmin($harga)
{
    $biaya = $harga * 2.5 / 100;
    return $biaya < 10000 ? 10000 : $biaya;
}

// ---------- Daftar kasus uji ----------
// [deskripsi, hasil sebenarnya, hasil yang diharapkan]

$kasus = [
    ['Umum tanpa promo',               hitungTotalBiaya(500000),                          500000],
    ['Pelajar (diskon 20%)',           hitungTotalBiaya(500000, 'pelajar'),               400000],
    ['Alumni (diskon 15%)',            hitungTotalBiaya(500000, 'alumni'),                425000],
    ['Umum + HEMAT10',                 hitungTotalBiaya(500000, 'umum', 'HEMAT10'),       450000],
    ['Pelajar + HEMAT10 (30%)',        hitungTotalBiaya(500000, 'pelajar', 'HEMAT10'),    350000],
    ['Pelajar + HEMAT25 (maks 30%)',   hitungTotalBiaya(500000, 'pelajar', 'HEMAT25'),    350000],
    ['Kode promo tidak dikenal',       hitungTotalBiaya(500000, 'umum', 'ABCDEF'),        500000],
    ['Kategori tidak dikenal',         hitungTotalBiaya(500000, 'dosen'),                 500000],
    ['Harga 0',                        hitungTotalBiaya(0, 'pelajar'),                    0],
    ['Harga negatif',                  hitungTotalBiaya(-1000),                           0],
    ['Biaya admin harga 600.000',      biayaAdmin(600000),                                15000],
    ['Biaya admin minimal 10.000',     biayaAdmin(100000),                                10000],
];

// ---------- Hitung hasil ----------

$lulus = 0;
$hasil = [];
foreach ($kasus as $k) {
    list($deskripsi, $aktual, $harapan) = $k;
    $ok = abs($aktual - $harapan) < 0.001;
    if ($ok) {
        $lulus++;
    }
    $hasil[] = [$deskripsi, $aktual, $harapan, $ok];
}
$total = count($kasus);
$gagal = $total - $lulus;

function rp($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Fee Tests</title>
    <style>
        body  { font-family: Arial, sans-serif; margin: 24px; }
        table { border-collapse: collapse; width: 100%; max-width: 800px; }
        th, td { border: 1px solid #ccc; padding: 8px 10px; text-align: left; }
        th    { background: #f3f3f3; }
        .pass { color: #0a7d2c; font-weight: bold; }
        .fail { color: #c0392b; font-weight: bold; }
        .ringkasan { margin: 16px 0; font-size: 1.1em; }
    </style>
</head>
<body>
    <h1>Uji Perhitungan Biaya</h1>

    <p class="ringkasan">
        Total: <strong><?= $total ?></strong> &middot;
        Lulus: <strong class="pass"><?= $lulus ?></strong> &middot;
        Gagal: <strong class="<?= $gagal > 0 ? 'fail' : 'pass' ?>"><?= $gagal ?></strong>
    </p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Kasus</th>
                <th>Hasil</th>
                <th>Harapan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hasil as $i => $h): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= htmlspecialchars($h[0]) ?></td>
                    <td><?= rp($h[1]) ?></td>
                    <td><?= rp($h[2]) ?></td>
                    <td class="<?= $h[3] ? 'pass' : 'fail' ?>">
                        <?= $h[3] ? 'PASS' : 'FAIL' ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>