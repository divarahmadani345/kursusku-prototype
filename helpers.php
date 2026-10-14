<?php
// helpers.php
// File ini hanya berisi kumpulan FUNGSI.
// JANGAN require helpers.php di dalam file ini sendiri.

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
    return (new DateTimeImmutable($date))->format('d-m-Y');
}

function e($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function getDiscountPercent(string $participantType): int
{
    return match($participantType) {
        'mahasiswa' => 20,
        'guru'      => 15,
        default     => 0,
    };
}

function getLearningModeLabel(string $mode): string
{
    return match($mode) {
        'offline' => 'Tatap Muka',
        'online'  => 'Online',
        'hybrid'  => 'Hybrid',
        default   => 'Tidak diketahui',
    };
}

function hitungTotalBiaya(int $fee, int $peserta, int $diskonPersen, int $admin): int
{
    $subtotal = $fee * $peserta;
    $diskon = (int) ($subtotal * $diskonPersen / 100);
    return $subtotal - $diskon + $admin;
}

function findCourse(string $code, array $courses): ?array
{
    foreach ($courses as $course) {
        if ($course['code'] === $code) {
            return $course;
        }
    }
    return null;
}