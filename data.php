<?php

$dataPendaftaran = [];

if (file_exists('data-pendaftaran.php')) {
    include 'data-pendaftaran.php';
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Pendaftaran</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th {
            background: #f3f4f6;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Data Pendaftaran Kursus</h1>

    <a href="registration.php" class="btn">
        Tambah Pendaftaran
    </a>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>Kursus</th>
        </tr>

        <?php if (empty($dataPendaftaran)): ?>

            <tr>
                <td colspan="5" style="text-align: center;">
                    Belum ada data.
                </td>
            </tr>

        <?php else: ?>

            <?php foreach ($dataPendaftaran as $no => $data): ?>

                <tr>
                    <td><?= $no + 1 ?></td>

                    <td>
                        <?= htmlspecialchars($data['nama']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($data['email']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($data['no_hp']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($data['kursus']) ?>
                    </td>
                </tr>

            <?php endforeach; ?>

        <?php endif; ?>

    </table>

</div>

</body>
</html>