<?php
function time_ago(string|int|\DateTimeInterface $input, \DateTimeInterface|null $now = null): string
{
    // Normalize input to DateTimeImmutable
    if ($input instanceof \DateTimeInterface) {
        $dt = \DateTimeImmutable::createFromInterface($input);
    } elseif (is_int($input)) {
        $dt = (new \DateTimeImmutable())->setTimestamp($input);
    } else {
        // Accept strings like "2025-11-25 18:24:52.159 +0530"
        $dt = new \DateTimeImmutable($input);
    }

    // Normalize "now"
    $now = $now instanceof \DateTimeInterface
        ? \DateTimeImmutable::createFromInterface($now)
        : new \DateTimeImmutable('now', new \DateTimeZone(date_default_timezone_get()));

    // If identical moments
    if ($dt == $now) {
        return 'just now';
    }

    $past = $dt < $now;
    $diff = $past ? $now->diff($dt) : $dt->diff($now);

    // Determine the largest non-zero unit (weeks derived from days)
    if ($diff->y > 0) {
        $value = $diff->y;
        $unit = 'year';
    } elseif ($diff->m > 0) {
        $value = $diff->m;
        $unit = 'month';
    } elseif ($diff->d >= 7) {
        $value = intdiv($diff->d, 7);
        $unit = 'week';
    } elseif ($diff->d > 0) {
        $value = $diff->d;
        $unit = 'day';
    } elseif ($diff->h > 0) {
        $value = $diff->h;
        $unit = 'hour';
    } elseif ($diff->i > 0) {
        $value = $diff->i;
        $unit = 'minute';
    } else {
        $value = $diff->s;
        $unit = 'second';
    }

    // Friendly formatting for singular values (optional: "a week" vs "1 week")
    $textValue = $value === 1 ? '1' : (string) $value;
    $plural = $value === 1 ? '' : 's';
    $result = "{$textValue} {$unit}{$plural}";

    return $past ? "{$result} ago" : "in {$result}";
}