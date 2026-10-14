<?php
// Tentukan hak akses menggunakan Bitwise Flag
define('PERMISSION_READ', 1);   // 0001 (1)
define('PERMISSION_WRITE', 2);  // 0010 (2)
define('PERMISSION_DELETE', 4); // 0100 (4)

// Kombinasi izin yang diberikan (Hanya READ dan WRITE)
$permission = PERMISSION_READ | PERMISSION_WRITE; // Nilai: 3 (0011)

// Pengecekan apakah user memiliki hak akses DELETE
$canDelete = ($permission & PERMISSION_DELETE) !== 0; // Evaluasi: false
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uji Coba Bitwise - KursusKu</title>
    <!-- Menghubungkan ke CSS utama -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="container">
        <!-- Header / Navigasi kembali ke Index -->
        <header class="header">
            <h2><a href="index.php" class="brand">KursusKu</a> / Test Bitwise Permission</h2>
            <a href="index.php" class="btn-back">&larr; Kembali ke Landing Page</a>
        </header>

        <!-- Main Content -->
        <main class="card">
            <h3>Hasil Pengujian Izin Akses (Bitwise Test)</h3>
            <p class="subtitle">Pengujian kombinasi izin <code>READ</code> dan <code>WRITE</code> tanpa <code>DELETE</code>.</p>

            <div class="result-box">
                <div class="info-group">
                    <label>Nilai Permission Saat Ini:</label>
                    <span class="value"><?php echo $permission; ?> (READ | WRITE)</span>
                </div>

                <div class="info-group">
                    <label>Apakah Boleh Menghapus (Delete)?</label>
                    <?php if ($canDelete): ?>
                        <span class="badge badge-success">TRUE (Diizinkan)</span>
                    <?php else: ?>
                        <span class="badge badge-danger">FALSE (Tidak Diizinkan)</span>
                    <?php endif; ?>
                </div>

                <div class="debug-box">
                    <strong>Hasil Debug <code>var_dump($canDelete)</code>:</strong>
                    <pre><?php var_dump($canDelete); ?></pre>
                </div>
            </div>
        </main>
    </div>

</body>
</html>