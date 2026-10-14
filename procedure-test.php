<?php
// procedure-test.php
// Latihan prosedur / fungsi di PHP untuk project KursusKu

// 1. Prosedur tanpa parameter & tanpa nilai kembali (langsung mencetak)
function sapaSelamatDatang()
{
    echo "<p>Selamat datang di KursusKu!</p>";
}

// 2. Prosedur dengan parameter
function sapaPeserta($nama)
{
    echo "<p>Halo, " . htmlspecialchars($nama) . "! Selamat belajar.</p>";
}

// 3. Parameter dengan nilai default
function cetakKursus($nama, $level = "Pemula")
{
    echo "<li>$nama (Level: $level)</li>";
}

// 4. Fungsi dengan nilai kembali (return)
function hitungBiaya($harga, $diskonPersen = 0)
{
    return $harga - ($harga * $diskonPersen / 100);
}

function formatRupiah($angka)
{
    return "Rp " . number_format($angka, 0, ',', '.');
}

// 5. Fungsi dengan return boolean
function bolehDaftar($umur, $kuotaSisa)
{
    return $umur >= 15 && $kuotaSisa > 0;
}

// 6. Fungsi yang mengembalikan array
function ringkasanPeserta($nama, $umur)
{
    return [
        'nama'     => ucwords($nama),
        'umur'     => $umur,
        'kategori' => $umur <= 17 ? 'Pelajar' : 'Umum',
    ];
}

// 7. Parameter by reference (mengubah variabel asli)
function tambahKuota(&$kuota, $jumlah)
{
    $kuota += $jumlah;
}

// 8. Variabel lokal vs global
$pesan = "Variabel global";

function tesScope()
{
    $pesan = "Variabel lokal";
    return $pesan;
}

// 9. Fungsi rekursif (faktorial)
function faktorial($n)
{
    if ($n <= 1) {
        return 1;
    }
    return $n * faktorial($n - 1);
}

// Data untuk dipanggil di bawah
$harga       = 500000;
$kuota       = 3;
$ringkasan   = ringkasanPeserta("budi santoso", 17);
$kuotaAwal   = $kuota;
tambahKuota($kuota, 5);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Procedure Test</title>
</head>
<body>
    <h1>Tes Prosedur &amp; Fungsi</h1>

    <h2>1. Tanpa Parameter</h2>
    <?php sapaSelamatDatang(); ?>

    <h2>2. Dengan Parameter</h2>
    <?php sapaPeserta("Budi"); ?>

    <h2>3. Parameter Default</h2>
    <ul>
        <?php
        cetakKursus("Pemrograman Web Dasar");
        cetakKursus("Desain Grafis", "Menengah");
        ?>
    </ul>

    <h2>4. Return Value</h2>
    <p>Harga normal: <?= formatRupiah($harga) ?></p>
    <p>Diskon 20%: <?= formatRupiah(hitungBiaya($harga, 20)) ?></p>

    <h2>5. Return Boolean</h2>
    <p>Umur 17, kuota 3: <?= bolehDaftar(17, 3) ? 'Boleh daftar' : 'Tidak bisa' ?></p>
    <p>Umur 12, kuota 3: <?= bolehDaftar(12, 3) ? 'Boleh daftar' : 'Tidak bisa' ?></p>
    <p>Umur 20, kuota 0: <?= bolehDaftar(20, 0) ? 'Boleh daftar' : 'Tidak bisa' ?></p>

    <h2>6. Return Array</h2>
    <p>
        Nama: <?= $ringkasan['nama'] ?>,
        Umur: <?= $ringkasan['umur'] ?>,
        Kategori: <?= $ringkasan['kategori'] ?>
    </p>

    <h2>7. Pass by Reference</h2>
    <p>Kuota awal: <?= $kuotaAwal ?> &rarr; setelah tambahKuota(+5): <?= $kuota ?></p>

    <h2>8. Variabel Lokal vs Global</h2>
    <p>Di luar fungsi: <?= $pesan ?></p>
    <p>Di dalam fungsi: <?= tesScope() ?></p>

    <h2>9. Rekursif</h2>
    <p>5! = <?= faktorial(5) ?></p>
</body>
</html>