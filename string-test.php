<?php
// string-test.php
// Latihan fungsi string di PHP untuk project KursusKu

$namaLengkap = "  budi santoso  ";
$email       = "Budi.Santoso@Gmail.com";
$kursus      = "Pemrograman Web Dasar dengan PHP";
$noHp        = "0812-3456-7890";

// 1. Membersihkan & mengubah huruf
$namaBersih  = trim($namaLengkap);
$namaRapi    = ucwords($namaBersih);
$emailKecil  = strtolower($email);
$kursusBesar = strtoupper($kursus);

// 2. Panjang & posisi
$panjangNama = strlen($namaBersih);
$posisiPHP   = strpos($kursus, 'PHP');

// 3. Mengambil sebagian string
$kataPertama = substr($namaRapi, 0, 4);
$domainEmail = substr(strrchr($emailKecil, '@'), 1);

// 4. Mengganti & memecah string
$noHpBersih = str_replace('-', '', $noHp);
$katakata   = explode(' ', $kursus);
$slug       = strtolower(str_replace(' ', '-', $kursus));

// 5. Menggabungkan & mengulang
$gabung = implode(' | ', $katakata);
$garis  = str_repeat('=', 20);

// 6. Cek isi string
$adaPHP     = strpos($kursus, 'PHP') !== false;
$emailValid = filter_var($emailKecil, FILTER_VALIDATE_EMAIL) !== false;
$awalan08   = substr($noHpBersih, 0, 2) === '08';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>String Test</title>
</head>
<body>
    <h1>Tes Fungsi String</h1>

    <h2>1. Mengubah Huruf</h2>
    <p>Nama asli: "<?= $namaLengkap ?>"</p>
    <p>trim(): "<?= $namaBersih ?>"</p>
    <p>ucwords(): <?= $namaRapi ?></p>
    <p>strtolower() email: <?= $emailKecil ?></p>
    <p>strtoupper() kursus: <?= $kursusBesar ?></p>

    <h2>2. Panjang &amp; Posisi</h2>
    <p>Panjang nama: <?= $panjangNama ?> karakter</p>
    <p>Posisi "PHP" di judul kursus: <?= $posisiPHP ?></p>

    <h2>3. Mengambil Sebagian String</h2>
    <p>4 huruf pertama nama: <?= $kataPertama ?></p>
    <p>Domain email: <?= $domainEmail ?></p>

    <h2>4. Mengganti &amp; Memecah</h2>
    <p>No HP asli: <?= $noHp ?></p>
    <p>No HP bersih: <?= $noHpBersih ?></p>
    <p>Jumlah kata di judul kursus: <?= count($katakata) ?></p>
    <p>Slug URL: <?= $slug ?></p>

    <h2>5. Menggabungkan</h2>
    <p><?= $gabung ?></p>
    <p><?= $garis ?></p>

    <h2>6. Pengecekan</h2>
    <p>Mengandung "PHP"? <?= $adaPHP ? 'Ya' : 'Tidak' ?></p>
    <p>Email valid? <?= $emailValid ? 'Ya' : 'Tidak' ?></p>
    <p>No HP diawali "08"? <?= $awalan08 ? 'Ya' : 'Tidak' ?></p>
</body>
</html>