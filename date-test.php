<?php
// date-test.php
// Latihan fungsi tanggal & waktu di PHP

// Atur zona waktu ke WIB
date_default_timezone_set('Asia/Jakarta');

// Nama hari & bulan dalam Bahasa Indonesia
$hari  = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
$bulan = [
    1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
];

function tanggalIndonesia($timestamp)
{
    global $hari, $bulan;
    $namaHari  = $hari[date('w', $timestamp)];
    $tanggal   = date('j', $timestamp);
    $namaBulan = $bulan[(int) date('n', $timestamp)];
    $tahun     = date('Y', $timestamp);

    return "$namaHari, $tanggal $namaBulan $tahun";
}

// Waktu sekarang
$sekarang = time();

// Jadwal kursus
$tanggalMulai = '2026-11-01';
$tsMulai      = strtotime($tanggalMulai);
$sisaHari     = ceil(($tsMulai - $sekarang) / 86400);

// Tanggal selesai: 8 minggu setelah mulai
$mulai   = new DateTime($tanggalMulai);
$selesai = (clone $mulai)->modify('+8 weeks');

// Batas pendaftaran
$batasDaftar  = strtotime('2026-10-31 23:59:59');
$statusDaftar = ($sekarang <= $batasDaftar) ? 'DIBUKA' : 'DITUTUP';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Date Test</title>
</head>
<body>
    <h1>Tes Tanggal &amp; Waktu</h1>

    <h2>Waktu Sekarang</h2>
    <p>Format standar: <?= date('Y-m-d H:i:s', $sekarang) ?></p>
    <p>Format Indonesia: <?= tanggalIndonesia($sekarang) ?></p>
    <p>Jam: <?= date('H:i', $sekarang) ?> WIB</p>

    <h2>Jadwal Kursus</h2>
    <p>Mulai: <?= tanggalIndonesia($tsMulai) ?></p>
    <p>Selesai: <?= tanggalIndonesia($selesai->getTimestamp()) ?></p>
    <p>Hitung mundur: <?= $sisaHari > 0 ? $sisaHari . ' hari lagi' : 'Sudah dimulai' ?></p>

    <h2>Status Pendaftaran</h2>
    <p>Batas daftar: <?= tanggalIndonesia($batasDaftar) ?></p>
    <p>Status: <strong><?= $statusDaftar ?></strong></p>
</body>
</html>