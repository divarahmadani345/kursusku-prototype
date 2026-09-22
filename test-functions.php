<?php

require_once __DIR__ . '/helpers.php';

function test(string $name, bool $condition): void
{
    echo ($condition ? 'PASS' : 'FAIL') . ' - ' . $name . '<br>';
}

test(
    'rupiah format',
    rupiah(150000) === 'Rp 150.000'
);

test(
    'status tersedia',
    statusKursus(30, 12) === 'Tersedia'
);

test(
    'status penuh',
    statusKursus(25, 25) === 'Penuh'
);

test(
    'sisa kursi',
    sisaKursi(30, 12) === 18
);

test(
    'sisa kursi tidak negatif',
    sisaKursi(10, 15) === 0
);

test(
    'format tanggal',
    formatTanggal('2026-09-21') === '21-09-2026'
);