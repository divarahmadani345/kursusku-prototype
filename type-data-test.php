<?php
// type-data-test.php
// Latihan tipe data di PHP untuk project KursusKu

// 1. Tipe data dasar (scalar)
$nama       = "Budi Santoso";   // string
$umur       = 17;               // integer
$biaya      = 500000.50;        // float (double)
$sudahBayar = true;             // boolean
$kodePromo  = null;             // null

// 2. Tipe data majemuk
$kursus = ["Web", "Desain", "Data"];            // array indexed
$peserta = [                                    // array asosiatif
    'nama'  => 'Budi Santoso',
    'umur'  => 17,
    'aktif' => true,
];

// 3. Object
class Kursus
{
    public $judul = "Pemrograman Web Dasar";
    public $durasi = 8; // minggu
}
$objKursus = new Kursus();

// 4. Casting (konversi tipe)
$teksAngka   = "123abc";
$keInt       = (int) $teksAngka;        // 123
$keFloat     = (float) "45.75";         // 45.75
$keString    = (string) 2026;           // "2026"
$keBool      = (bool) "";               // false (string kosong)
$keArray     = (array) "satu";          // ["satu"]

// 5. Pengecekan tipe
$cekInt    = is_int($umur);
$cekString = is_string($nama);
$cekFloat  = is_float($biaya);
$cekBool   = is_bool($sudahBayar);
$cekNull   = is_null($kodePromo);
$cekArray  = is_array($kursus);
$cekNumber = is_numeric("12.5");        // true
$cekNumber2 = is_numeric("12abc");      // false

// 6. Type juggling (PHP mengubah tipe otomatis)
$jumlah = "10" + 5;        // 15 (int)
$gabung = "10" . 5;        // "105" (string)
$bandingLonggar = (0 == "a");   // false di PHP 8, true di PHP 7
$bandingKetat   = ("1" === 1);  // false

// 7. Nilai yang dianggap false
$nilaiFalse = [0, 0.0, "", "0", [], null, false];

// Fungsi bantu untuk menampilkan nilai + tipenya
function tampil($nilai)
{
    if (is_bool($nilai)) {
        return $nilai ? 'true' : 'false';
    }
    if (is_null($nilai)) {
        return 'null';
    }
    if (is_array($nilai)) {
        return json_encode($nilai);
    }
    if (is_object($nilai)) {
        return 'object ' . get_class($nilai);
    }
    return (string) $nilai;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Type Data Test</title>
</head>
<body>
    <h1>Tes Tipe Data</h1>

    <h2>1. Tipe Dasar</h2>
    <p>$nama = <?= tampil($nama) ?> &rarr; <?= gettype($nama) ?></p>
    <p>$umur = <?= tampil($umur) ?> &rarr; <?= gettype($umur) ?></p>
    <p>$biaya = <?= tampil($biaya) ?> &rarr; <?= gettype($biaya) ?></p>
    <p>$sudahBayar = <?= tampil($sudahBayar) ?> &rarr; <?= gettype($sudahBayar) ?></p>
    <p>$kodePromo = <?= tampil($kodePromo) ?> &rarr; <?= gettype($kodePromo) ?></p>

    <h2>2. Array</h2>
    <p>$kursus = <?= tampil($kursus) ?> &rarr; <?= gettype($kursus) ?></p>
    <p>$peserta = <?= tampil($peserta) ?> &rarr; <?= gettype($peserta) ?></p>
    <p>Elemen pertama kursus: <?= $kursus[0] ?></p>
    <p>Nama peserta: <?= $peserta['nama'] ?></p>

    <h2>3. Object</h2>
    <p>$objKursus &rarr; <?= gettype($objKursus) ?> (<?= get_class($objKursus) ?>)</p>
    <p>Judul: <?= $objKursus->judul ?>, Durasi: <?= $objKursus->durasi ?> minggu</p>

    <h2>4. Casting</h2>
    <p>(int) "<?= $teksAngka ?>" = <?= $keInt ?></p>
    <p>(float) "45.75" = <?= $keFloat ?></p>
    <p>(string) 2026 = "<?= $keString ?>" (<?= gettype($keString) ?>)</p>
    <p>(bool) "" = <?= tampil($keBool) ?></p>
    <p>(array) "satu" = <?= tampil($keArray) ?></p>

    <h2>5. Pengecekan Tipe</h2>
    <p>is_int($umur): <?= tampil($cekInt) ?></p>
    <p>is_string($nama): <?= tampil($cekString) ?></p>
    <p>is_float($biaya): <?= tampil($cekFloat) ?></p>
    <p>is_bool($sudahBayar): <?= tampil($cekBool) ?></p>
    <p>is_null($kodePromo): <?= tampil($cekNull) ?></p>
    <p>is_array($kursus): <?= tampil($cekArray) ?></p>
    <p>is_numeric("12.5"): <?= tampil($cekNumber) ?></p>
    <p>is_numeric("12abc"): <?= tampil($cekNumber2) ?></p>

    <h2>6. Type Juggling</h2>
    <p>"10" + 5 = <?= $jumlah ?> (<?= gettype($jumlah) ?>)</p>
    <p>"10" . 5 = <?= $gabung ?> (<?= gettype($gabung) ?>)</p>
    <p>0 == "a" : <?= tampil($bandingLonggar) ?></p>
    <p>"1" === 1 : <?= tampil($bandingKetat) ?></p>

    <h2>7. Nilai yang Dianggap False</h2>
    <ul>
        <?php foreach ($nilaiFalse as $nilai): ?>
            <li>
                <?= var_export($nilai, true) ?>
                &rarr; <?= $nilai ? 'true' : 'false' ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>8. var_dump</h2>
    <pre><?php var_dump($peserta); ?></pre>
</body>
</html>