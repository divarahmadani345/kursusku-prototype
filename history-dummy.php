<?php

$siteName = 'KursusKu';

$history = [
    [
        'name' => 'Andi Saputra',
        'course' => 'Web Dasar',
        'participant' => 'Mahasiswa',
        'status' => 'Selesai'
    ],
    [
        'name' => 'Siti Rahma',
        'course' => 'PHP Dasar',
        'participant' => 'Guru',
        'status' => 'Sedang belajar'
    ],
    [
        'name' => 'Budi Santoso',
        'course' => 'Laravel Fundamental',
        'participant' => 'Umum',
        'status' => 'Terdaftar'
    ]
];

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        History Dummy - <?= htmlspecialchars($siteName) ?>
    </title>

    <link
        rel="stylesheet"
        href="/kursusku-prototype/assets/css/style.css?v=5"
    >

</head>

<body>

<header class="header">

    <div class="container">

        <h1>
            <?= htmlspecialchars($siteName) ?>
        </h1>

    </div>

</header>


<nav class="navbar">

    <div class="container">

        <a href="index.php">
            Beranda
        </a>

        <a href="index.php#kursus">
            Katalog
        </a>

        <a href="registration.php">
            Daftar Kursus
        </a>

        <a href="index.php#keunggulan">
            Keunggulan
        </a>

        <a href="index.php#kontak">
            Kontak
        </a>

    </div>

</nav>


<main>

    <section class="section">

        <div class="container">

            <h2>
                History Dummy
            </h2>

            <p>
                Contoh riwayat pendaftaran peserta KursusKu.
            </p>


            <div class="form-card">

                <table>

                    <tr>
                        <th>Nama</th>
                        <th>Kursus</th>
                        <th>Tipe Peserta</th>
                        <th>Status</th>
                    </tr>


                    <?php foreach ($history as $item): ?>

                        <tr>

                            <td>
                                <?= htmlspecialchars($item['name']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($item['course']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($item['participant']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($item['status']) ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </table>

            </div>


            <p>

                <a
                    href="registration.php"
                    class="btn-link"
                >
                    Kembali ke Pendaftaran
                </a>

            </p>

        </div>

    </section>

</main>


<footer class="footer">

    <div class="container">

        <p>
            &copy; <?= date('Y') ?> <?= htmlspecialchars($siteName) ?>
        </p>

    </div>

</footer>

</body>

</html>