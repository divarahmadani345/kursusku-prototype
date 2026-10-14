<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama = $_POST['nama'] ?? '';
    $email = $_POST['email'] ?? '';
    $no_hp = $_POST['no_hp'] ?? '';
    $kursus = $_POST['kursus'] ?? '';

    if ($nama === '' || $email === '' || $no_hp === '' || $kursus === '') {
        echo "Data belum lengkap.";
        exit;
    }

    $data = [
        'nama' => $nama,
        'email' => $email,
        'no_hp' => $no_hp,
        'kursus' => $kursus
    ];

    $file = 'data-pendaftaran.php';

    $dataPendaftaran = [];

    if (file_exists($file)) {
        include $file;
    }

    $dataPendaftaran[] = $data;

    $isiFile = "<?php\n\n";
    $isiFile .= '$dataPendaftaran = ' . var_export($dataPendaftaran, true) . ";\n";

    file_put_contents($file, $isiFile);

    header('Location: data.php');
    exit;
}

echo "File process.php berhasil dijalankan.";