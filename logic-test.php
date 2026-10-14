<?php
// logic-test.php
// Latihan logika (if, operator perbandingan & logika, switch, ternary) untuk KursusKu

// Data contoh peserta
$nama       = "Budi Santoso";
$umur       = 17;
$sudahBayar = true;
$kuotaSisa  = 3;
$pilihan    = "web";
$kodePromo  = null;

// 1. Operator perbandingan
$hasilSama    = ($umur == "17");   // sama nilai
$hasilIdentik = ($umur === "17");  // sama nilai & tipe
$hasilLebih   = ($umur >= 17);

// 2. Operator logika (&&, ||, !)
$cukupUmur  = $umur >= 15;
$adaKuota   = $kuotaSisa > 0;
$bolehDaftar = $cukupUmur && $adaKuota;          // keduanya harus benar
$dapatAkses  = $sudahBayar || $kodePromo !== null; // salah satu cukup
$belumBayar  = !$sudahBayar;                      // kebalikan

// 3. if - elseif - else
if ($umur < 15) {
    $kategori = "Belum memenuhi syarat umur";
} elseif ($umur <= 17) {
    $kategori = "Pelajar";
} else {
    $kategori = "Umum";
}

// 4. switch
switch ($pilihan) {
    case "web":
        $namaKursus = "Pemrograman Web Dasar";
        $biaya      = 500000;
        break;
    case "desain":
        $namaKursus = "Desain Grafis";
        $biaya      = 450000;
        break;
    case "data":
        $namaKursus = "Analisis Data";
        $biaya      = 600000;
        break;
    default:
        $namaKursus = "Kursus tidak ditemukan";
        $biaya      = 0;
}

// 5. Ternary & null coalescing
$statusBayar = $sudahBayar ? "LUNAS" : "BELUM BAYAR";
$promo       = $kodePromo ?? "Tidak ada promo";

// 6. Diskon berdasarkan kategori
$diskon = 0;
if ($kategori === "Pelajar") {
    $diskon = 20;
}
if ($kodePromo === "HEMAT10") {
    $diskon += 10;
}
$totalBayar = $biaya - ($biaya * $diskon / 100);

// Fungsi bantu supaya true/false tampil sebagai teks
function tampil($nilai)
{
    return $nilai ? "true" : "false";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Logic Test</title>
</head>
<body>
    <h1>Tes Logika</h1>

    <h2>Data Peserta</h2>
    <p>Nama: <?= $nama ?></p>
    <p>Umur: <?= $umur ?> tahun</p>
    <p>Kuota tersisa: <?= $kuotaSisa ?></p>

    <h2>1. Operator Perbandingan</h2>
    <p>$umur == "17" : <?= tampil($hasilSama) ?></p>
    <p>$umur === "17" : <?= tampil($hasilIdentik) ?></p>
    <p>$umur &gt;= 17 : <?= tampil($hasilLebih) ?></p>

    <h2>2. Operator Logika</h2>
    <p>Cukup umur &amp;&amp; ada kuota : <?= tampil($bolehDaftar) ?></p>
    <p>Sudah bayar || punya promo : <?= tampil($dapatAkses) ?></p>
    <p>!sudahBayar : <?= tampil($belumBayar) ?></p>

    <h2>3. if - elseif - else</h2>
    <p>Kategori peserta: <?= $kategori ?></p>

    <h2>4. switch</h2>
    <p>Kursus dipilih: <?= $namaKursus ?></p>
    <p>Biaya: Rp <?= number_format($biaya, 0, ',', '.') ?></p>

    <h2>5. Ternary &amp; Null Coalescing</h2>
    <p>Status pembayaran: <?= $statusBayar ?></p>
    <p>Kode promo: <?= $promo ?></p>

    <h2>6. Hasil Akhir</h2>
    <p>Diskon: <?= $diskon ?>%</p>
    <p>Total bayar: Rp <?= number_format($totalBayar, 0, ',', '.') ?></p>
    <p>
        Keputusan:
        <strong><?= $bolehDaftar ? "BOLEH DAFTAR" : "TIDAK BISA DAFTAR" ?></strong>
    </p>
</body>
</html>