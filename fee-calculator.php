<?php

// ===============================
// DATA DASAR KURSUS
// ===============================

$courseName = 'Laravel Fundamental';

$fee = 350000;

$participantCount = 2;

$discountPercent = 10;

$adminFee = 25000;

$isActive = true;


// ===============================
// PROSES PERHITUNGAN
// ===============================

// Subtotal
$subtotal = $fee * $participantCount;

// Diskon
$discount = intdiv(
    $subtotal * $discountPercent,
    100
);

// Total akhir
$total = $subtotal - $discount + $adminFee;

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Kalkulator Biaya - KursusKu</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7f6;
            margin: 0;
            padding: 40px 20px;
            color: #16332c;
        }

        .card {
            max-width: 720px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        h1 {
            margin-top: 0;
            color: #0f766e;
        }

        .course {
            background: #eaf7f3;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f1f5f4;
        }

        .total {
            background: #eaf7f3;
            font-weight: bold;
            font-size: 18px;
        }

        .back {
            display: inline-block;
            margin-top: 25px;
            text-decoration: none;
            color: #0f766e;
            font-weight: bold;
        }

        .back:hover {
            text-decoration: underline;
        }

    </style>

</head>

<body>

<main class="card">

    <h1>
        Kalkulator Estimasi Biaya
    </h1>

    <div class="course">

        <strong>Kursus:</strong>

        <?= $courseName ?>

    </div>

    <table>

        <tr>
            <th>Komponen</th>
            <th>Nilai</th>
        </tr>

        <tr>

            <td>
                Biaya per peserta
            </td>

            <td>
                Rp <?= number_format($fee, 0, ',', '.') ?>
            </td>

        </tr>

        <tr>

            <td>
                Jumlah peserta
            </td>

            <td>
                <?= $participantCount ?>
            </td>

        </tr>

        <tr>

            <td>
                Subtotal
            </td>

            <td>
                Rp <?= number_format($subtotal, 0, ',', '.') ?>
            </td>

        </tr>

        <tr>

            <td>
                Diskon (<?= $discountPercent ?>%)
            </td>

            <td>
                - Rp <?= number_format($discount, 0, ',', '.') ?>
            </td>

        </tr>

        <tr>

            <td>
                Biaya admin
            </td>

            <td>
                Rp <?= number_format($adminFee, 0, ',', '.') ?>
            </td>

        </tr>

        <tr class="total">

            <td>
                Total akhir
            </td>

            <td>
                Rp <?= number_format($total, 0, ',', '.') ?>
            </td>

        </tr>

    </table>

    <a href="index.php" class="back">
        ← Kembali ke Beranda KursusKu
    </a>

</main>

</body>

</html>