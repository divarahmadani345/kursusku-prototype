<?php
// helpers.php

function rupiah(int $amount): string
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

function statusKursus(int $quota, int $registered): string
{
    return $registered >= $quota ? 'Penuh' : 'Tersedia';
}

function sisaKursi(int $quota, int $registered): int
{
    return max(0, $quota - $registered);
}

function formatTanggal(string $date): string
{
    $value = new DateTimeImmutable($date);
    return $value->format('d-m-Y');
}

function e($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

// Helper perhitungan diskon Pertemuan 6
function hitungDiskon(string $participantType, int $subtotal): array
{
    $discountPercent = 0;
    
    // Branching Diskon: mahasiswa 20%, guru 15%, umum 0%
    if ($participantType === 'mahasiswa') {
        $discountPercent = 20;
    } elseif ($participantType === 'guru') {
        $discountPercent = 15;
    } else {
        $discountPercent = 0;
    }

    $discountAmount = intdiv($subtotal * $discountPercent, 100);
    $total = $subtotal - $discountAmount;

    return [
        'percent' => $discountPercent,
        'amount' => $discountAmount,
        'total' => $total
    ];
}