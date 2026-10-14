<?php

declare(strict_types=1);

require __DIR__ . '/helpers.php';

$forItems = [];
for ($i = 1; $i <= 3; $i++) {
    $forItems[] = "Paket ke-$i";
}

$whileItems = [];
$i = 1;
while ($i <= 3) {
    $whileItems[] = "While ke-$i";
    $i++;
}

$doWhileItems = [];
$i = 1;
do {
    $doWhileItems[] = "Percobaan ke-$i";
    $i++;
} while ($i <= 3);
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loop Lab - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="utility-page">
<main class="utility-card">
    <span class="eyebrow">MILESTONE 6 · LOOPING</span>
    <h1>Loop Lab</h1>
    <div class="feature-grid">
        <article class="feature-card"><h2>for</h2><p><?= implode('<br>', array_map('e', $forItems)) ?></p></article>
        <article class="feature-card"><h2>while</h2><p><?= implode('<br>', array_map('e', $whileItems)) ?></p></article>
        <article class="feature-card"><h2>do-while</h2><p><?= implode('<br>', array_map('e', $doWhileItems)) ?></p></article>
    </div>
    <p><a class="button" href="register.php">Kembali</a></p>
</main>
</body>
</html>