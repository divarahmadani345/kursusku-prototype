<?php
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$studyProgram = trim($_POST['study_program'] ?? '');
$course = $_POST['course'] ?? '';
$participantType = $_POST['participant_type'] ?? '';
$interests = $_POST['interests'] ?? [];
$note = trim($_POST['note'] ?? '');
$learningMethod = $_POST['learning_method'] ?? '';
$packageCount = (int) ($_POST['package_count'] ?? 1);
$interestText = implode(', ', $interests);

// ini data kursus - harga
$courses = [
    'web-dasar'           => ['name' => 'Web Dasar',           'fee' => 300000],
    'php-dasar'           => ['name' => 'PHP Dasar',           'fee' => 350000],
    'php-lanjutan'        => ['name' => 'PHP Lanjutan',        'fee' => 450000],
    'laravel-fundamental' => ['name' => 'Laravel Fundamental', 'fee' => 500000],
    'mysql-dasar'         => ['name' => 'MySQL Dasar',         'fee' => 325000],
    'ui-web-dasar'        => ['name' => 'UI Web Dasar',        'fee' => 275000],
];

$courseData = $courses[$course] ?? ['name' => '-', 'fee' => 0];
$courseName = $courseData['name'];
$fee = $courseData['fee'];

// ini l SUBTOTAL = fee × jumlah paket
$subtotal = $fee * $packageCount;

// ini diskon berdasarkan dari tipe peserta
$discountPercent = 0;
if ($participantType === 'mahasiswa') {
    $discountPercent = 20;
} elseif ($participantType === 'guru') {
    $discountPercent = 15;
} else {
    $discountPercent = 0;
}

$discountAmount = $subtotal * $discountPercent / 100;
$total = $subtotal - $discountAmount;

// untuk fungsi escape
function e($value): string {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
// Mode History Dummy
if (($_GET['history'] ?? '') === 'dummy') {
    $history = [
        ['name' => 'Andi',  'course' => 'Web Dasar',   'total' => 240000],
        ['name' => 'Budi',  'course' => 'PHP Dasar',   'total' => 350000],
        ['name' => 'Citra', 'course' => 'Laravel Fundamental', 'total' => 425000],
    ];
  // Mode Loop Lab
if (($_GET['loop'] ?? '') === 'lab') {
    ?>
    <!doctype html>
    <html lang="id">
    <head>
      <meta charset="utf-8">
      <title>Loop Lab - KursusKu</title>
      <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
    <main class="container">
      <h1>Loop Lab</h1>

      <h2>Perulangan for (1 sampai 5)</h2>
      <ul>
        <?php for ($i = 1; $i <= 5; $i++): ?>
          <li>Perulangan ke-<?= $i ?></li>
        <?php endfor; ?>
      </ul>

      <h2>Perulangan foreach (daftar kursus)</h2>
      <ul>
        <?php foreach ($courses as $c): ?>
          <li><?= e($c['name']) ?> - Rp <?= number_format($c['fee'], 0, ',', '.') ?></li>
        <?php endforeach; ?>
      </ul>

      <a class="btn-link" href="registration.php">Kembali</a>
    </main>
    </body>
    </html>
    <?php
    exit; // berhenti di sini
}
    ?>
    <!doctype html>
    <html lang="id">
    <head>
      <meta charset="utf-8">
      <title>History Dummy - KursusKu</title>
      <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
    <main class="container">
      <h1>History Pendaftaran (Dummy)</h1>
      <table class="cost-table">
        <?php foreach ($history as $row): ?>
        <tr>
          <td><?= e($row['name']) ?></td>
          <td><?= e($row['course']) ?></td>
          <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
      <a class="btn-link" href="registration.php">Kembali</a>
    </main>
    </body>
    </html>
    <?php
    exit; // berhenti di sini, halaman hasil di bawah tidak ikut tampil
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hasil Pendaftaran - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="container result-page">
  <section class="alert-success">
    <h1>Pendaftaran Berhasil Diproses</h1>
    <p>Periksa kembali data latihan berikut.</p>
  </section>

  <section class="summary-card">
    <h2>Data Peserta</h2>
    <dl class="summary-list">
      <dt>Nama</dt><dd><?= e($name) ?></dd>
      <dt>Email</dt><dd><?= e($email) ?></dd>
      <dt>Nomor HP</dt><dd><?= e($phone) ?></dd>
      <dt>Program Studi</dt><dd><?= e($studyProgram) ?></dd>
      <dt>Kursus</dt><dd><?= e($courseName) ?></dd>
      <dt>Tipe Peserta</dt><dd><?= e($participantType) ?></dd>
      <dt>Metode</dt><dd><?= e($learningMethod) ?></dd>
      <dt>Jumlah Paket</dt><dd><?= e($packageCount) ?> paket</dd>
      <dt>Minat</dt><dd><?= e($interestText) ?></dd>
      <dt>Catatan</dt><dd><?= e($note ?: 'Tidak ada catatan tambahan.') ?></dd>
    </dl>
  </section>

  <section class="summary-card">
    <h2>Rincian Biaya</h2>
    <table class="cost-table">
      <tr>
        <td>Biaya satuan</td>
        <td>Rp <?= number_format($fee, 0, ',', '.') ?></td>
      </tr>
      <tr>
        <td>Subtotal (<?= $packageCount ?> paket)</td>
        <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
      </tr>
      <tr>
        <td>Diskon <?= $discountPercent ?>%</td>
        <td>-Rp <?= number_format($discountAmount, 0, ',', '.') ?></td>
      </tr>
      <tr class="total-row">
        <td><strong>TOTAL AKHIR</strong></td>
        <td><strong>Rp <?= number_format($total, 0, ',', '.') ?></strong></td>
      </tr>
    </table>
  </section>

  <section class="summary-card">
    <h2>Fasilitas</h2>
    <ul class="facility-list">
      <li>Modul digital</li>
      <li>Sertifikat penyelesaian</li>
      <li>Forum diskusi kelas</li>
    </ul>
  </section>

  <div class="action-buttons">
    <a class="btn-link" href="registration.php">Daftar Lagi</a>
    <a class="btn-link" href="index.php">Beranda</a>
  </div>
</main>
</body>
</html>