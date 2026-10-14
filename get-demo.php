<?php
// get-demo.php
// Demo method GET di PHP untuk project KursusKu
// Contoh: get-demo.php?nama=Budi&kursus=web&level=pemula

// Daftar kursus yang valid
$daftarKursus = [
    'web'    => 'Pemrograman Web Dasar',
    'desain' => 'Desain Grafis',
    'data'   => 'Analisis Data',
];

// 1. Ambil parameter dari URL (dengan nilai default jika kosong)
$nama   = isset($_GET['nama'])   ? trim($_GET['nama'])   : '';
$kursus = isset($_GET['kursus']) ? trim($_GET['kursus']) : '';
$level  = isset($_GET['level'])  ? trim($_GET['level'])  : 'pemula';
$halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;

// 2. Validasi sederhana
$error = [];
$adaInput = count($_GET) > 0;

if ($adaInput) {
    if ($nama === '') {
        $error[] = 'Parameter "nama" wajib diisi.';
    } elseif (strlen($nama) < 3) {
        $error[] = 'Nama minimal 3 karakter.';
    }

    if ($kursus === '' || !isset($daftarKursus[$kursus])) {
        $error[] = 'Parameter "kursus" harus salah satu dari: ' . implode(', ', array_keys($daftarKursus)) . '.';
    }

    if (!in_array($level, ['pemula', 'menengah', 'lanjut'])) {
        $error[] = 'Level harus pemula, menengah, atau lanjut.';
    }

    if ($halaman < 1) {
        $halaman = 1;
    }
}

$valid = $adaInput && count($error) === 0;

// 3. Fungsi bantu: mengamankan output dari XSS
function e($teks)
{
    return htmlspecialchars($teks, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET Demo</title>
    <style>
        body  { font-family: Arial, sans-serif; margin: 24px; max-width: 720px; }
        label { display: block; margin-top: 12px; }
        input, select { padding: 6px; width: 100%; max-width: 320px; }
        button { margin-top: 16px; padding: 8px 16px; }
        .error { color: #c0392b; }
        .ok    { color: #0a7d2c; }
        code   { background: #f3f3f3; padding: 2px 6px; }
    </style>
</head>
<body>
    <h1>Demo Method GET</h1>

    <h2>1. Form (method GET)</h2>
    <form action="get-demo.php" method="get">
        <label>Nama
            <input type="text" name="nama" value="<?= e($nama) ?>">
        </label>

        <label>Kursus
            <select name="kursus">
                <option value="">-- pilih kursus --</option>
                <?php foreach ($daftarKursus as $kode => $judul): ?>
                    <option value="<?= e($kode) ?>" <?= $kursus === $kode ? 'selected' : '' ?>>
                        <?= e($judul) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Level
            <select name="level">
                <?php foreach (['pemula', 'menengah', 'lanjut'] as $opsi): ?>
                    <option value="<?= $opsi ?>" <?= $level === $opsi ? 'selected' : '' ?>>
                        <?= ucfirst($opsi) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>

        <button type="submit">Kirim</button>
    </form>

    <h2>2. Hasil</h2>
    <?php if (!$adaInput): ?>
        <p>Belum ada data. Isi form di atas atau tambahkan parameter di URL.</p>
    <?php elseif (!$valid): ?>
        <ul class="error">
            <?php foreach ($error as $pesan): ?>
                <li><?= e($pesan) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="ok">
            Halo, <strong><?= e($nama) ?></strong>! Kamu memilih kursus
            <strong><?= e($daftarKursus[$kursus]) ?></strong>
            level <strong><?= e($level) ?></strong>.
        </p>
    <?php endif; ?>

    <h2>3. Isi $_GET</h2>
    <pre><?php print_r($_GET); ?></pre>

    <h2>4. Query String</h2>
    <p>URL saat ini: <code><?= e($_SERVER['REQUEST_URI']) ?></code></p>
    <p>Query string: <code><?= e($_SERVER['QUERY_STRING']) ?></code></p>

    <h2>5. Link Contoh</h2>
    <ul>
        <li><a href="get-demo.php?nama=Budi&amp;kursus=web&amp;level=pemula">Budi - Web - Pemula</a></li>
        <li><a href="get-demo.php?nama=Sari&amp;kursus=desain&amp;level=menengah">Sari - Desain - Menengah</a></li>
        <li><a href="get-demo.php?nama=Al&amp;kursus=xyz">Contoh input tidak valid</a></li>
        <li>
            <a href="<?= e('get-demo.php?' . http_build_query(['nama' => 'Dewi & Rina', 'kursus' => 'data'])) ?>">
                Nama dengan karakter khusus (http_build_query)
            </a>
        </li>
    </ul>

    <h2>6. Contoh Pagination</h2>
    <p>Halaman saat ini: <strong><?= $halaman ?></strong></p>
    <p>
        <?php if ($halaman > 1): ?>
            <a href="get-demo.php?halaman=<?= $halaman - 1 ?>">&laquo; Sebelumnya</a> |
        <?php endif; ?>
        <a href="get-demo.php?halaman=<?= $halaman + 1 ?>">Berikutnya &raquo;</a>
    </p>
</body>
</html>