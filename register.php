<?php
// register.php
// Form pendaftaran peserta KursusKu (dikirim dengan method POST)

// Daftar kursus untuk pilihan di form
$daftarKursus = [
    'web'    => 'Pemrograman Web Dasar',
    'desain' => 'Desain Grafis',
    'data'   => 'Analisis Data',
];

// Pesan error / sukses dari halaman proses (opsional, lewat URL)
// Contoh: register.php?status=sukses atau register.php?status=gagal&pesan=...
$status = isset($_GET['status']) ? $_GET['status'] : '';
$pesan  = isset($_GET['pesan'])  ? $_GET['pesan']  : '';

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
    <title>Daftar Kursus - KursusKu</title>
    <style>
        body   { font-family: Arial, sans-serif; background: #f5f7fb; margin: 0; padding: 24px; }
        .card  { background: #fff; max-width: 480px; margin: 0 auto; padding: 24px;
                 border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,.08); }
        h1     { margin-top: 0; }
        label  { display: block; margin-top: 14px; font-weight: bold; }
        input[type=text], input[type=email], input[type=tel], input[type=date], select, textarea {
            width: 100%; padding: 8px; margin-top: 6px; box-sizing: border-box;
            border: 1px solid #ccc; border-radius: 6px; font-size: 1em;
        }
        .radio-group label { display: inline-block; font-weight: normal; margin-right: 16px; }
        button { margin-top: 20px; padding: 10px 20px; border: 0; border-radius: 6px;
                 background: #2f6fed; color: #fff; font-size: 1em; cursor: pointer; }
        button:hover { background: #1f57c4; }
        .alert { padding: 10px 14px; border-radius: 6px; margin-bottom: 12px; }
        .sukses { background: #e6f6ea; color: #0a7d2c; }
        .gagal  { background: #fdeaea; color: #c0392b; }
        small  { color: #666; }
        a      { color: #2f6fed; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Daftar Kursus</h1>
        <p>Isi data di bawah ini untuk mendaftar.</p>

        <?php if ($status === 'sukses'): ?>
            <div class="alert sukses">Pendaftaran berhasil. Terima kasih!</div>
        <?php elseif ($status === 'gagal'): ?>
            <div class="alert gagal">
                Pendaftaran gagal<?= $pesan !== '' ? ': ' . e($pesan) : '.' ?>
            </div>
        <?php endif; ?>

        <form action="process-registration.php" method="post">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" required minlength="3"
                   placeholder="Contoh: Budi Santoso">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required
                   placeholder="nama@email.com">

            <label for="no_hp">No. HP</label>
            <input type="tel" id="no_hp" name="no_hp" required
                   pattern="[0-9]{10,14}" placeholder="081234567890">
            <small>Hanya angka, 10-14 digit.</small>

            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" id="tgl_lahir" name="tgl_lahir" required>

            <label>Jenis Kelamin</label>
            <div class="radio-group">
                <label><input type="radio" name="gender" value="L" required> Laki-laki</label>
                <label><input type="radio" name="gender" value="P"> Perempuan</label>
            </div>

            <label for="kursus">Pilih Kursus</label>
            <select id="kursus" name="kursus" required>
                <option value="">-- pilih kursus --</option>
                <?php foreach ($daftarKursus as $kode => $judul): ?>
                    <option value="<?= e($kode) ?>"><?= e($judul) ?></option>
                <?php endforeach; ?>
            </select>

            <label for="status_peserta">Status</label>
            <select id="status_peserta" name="status_peserta" required>
                <option value="umum">Umum</option>
                <option value="pelajar">Pelajar</option>
                <option value="alumni">Alumni</option>
            </select>

            <label for="kode_promo">Kode Promo (opsional)</label>
            <input type="text" id="kode_promo" name="kode_promo" placeholder="HEMAT10">

            <label for="catatan">Catatan (opsional)</label>
            <textarea id="catatan" name="catatan" rows="3"></textarea>

            <label>
                <input type="checkbox" name="setuju" value="1" required>
                Saya setuju dengan syarat dan ketentuan.
            </label>

            <button type="submit">Daftar Sekarang</button>
        </form>

        <p><a href="index.php">&larr; Kembali ke beranda</a></p>
    </div>
</body>
</html>