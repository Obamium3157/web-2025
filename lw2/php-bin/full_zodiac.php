<?php
function GetZodiacSign(int $date): string
{
    if ($date >= 1222 || $date <= 120) {
        return "Козерог";
    } elseif ($date <= 218) {
        return "Водолей";
    } elseif ($date <= 320) {
        return "Рыбы";
    } elseif ($date <= 419) {
        return "Овен";
    } elseif ($date <= 520) {
        return "Телец";
    } elseif ($date <= 621) {
        return "Близнецы";
    } elseif ($date <= 722) {
        return "Рак";
    } elseif ($date <= 822) {
        return "Лев";
    } elseif ($date <= 922) {
        return "Дева";
    } elseif ($date <= 1023) {
        return "Весы";
    } elseif ($date <= 1122) {
        return "Скорпион";
    } elseif ($date <= 1221) {
        return "Стрелец";
    }
    return "Неизвестно";
}

function isValidDate($day, $month): bool
{
    $daysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    if ($month < 1 || $month > 12)
        return false;
    if ($day < 1 || $day > $daysInMonth[$month - 1])
        return false;

    return true;
}

function ParseDate(string $dateStr): ?array
{
    $formats = [
        ['pattern' => '/^(\d{2})\.(\d{2})\.(\d{4})$/', 'day' => 1, 'month' => 2, 'year' => 3],
        ['pattern' => '/^(\d{2})-(\d{2})-(\d{4})$/',   'day' => 1, 'month' => 2, 'year' => 3],
        ['pattern' => '/^(\d{2})\/(\d{2})\/(\d{4})$/', 'day' => 1, 'month' => 2, 'year' => 3],
        ['pattern' => '/^(\d{4})\.(\d{2})\.(\d{2})$/', 'day' => 3, 'month' => 2, 'year' => 1],
        ['pattern' => '/^(\d{4})-(\d{2})-(\d{2})$/',   'day' => 3, 'month' => 2, 'year' => 1],
        ['pattern' => '/^(\d{4})\/(\d{2})\/(\d{2})$/', 'day' => 3, 'month' => 2, 'year' => 1],
        ['pattern' => '/^(\d{2})\.(\d{2})\.(\d{2})$/', 'day' => 1, 'month' => 2, 'year' => 3],
        ['pattern' => '/^(\d{2})-(\d{2})-(\d{2})$/',   'day' => 1, 'month' => 2, 'year' => 3],
        ['pattern' => '/^(\d{2})\/(\d{2})\/(\d{2})$/', 'day' => 1, 'month' => 2, 'year' => 3],
        ['pattern' => '/^(\d{2})(\d{2})(\d{4})$/',     'day' => 1, 'month' => 2, 'year' => 3], 
    ];

    foreach ($formats as $format) {
        if (preg_match($format['pattern'], $dateStr, $matches)) {
            $day = (int)$matches[$format['day']];
            $month = (int)$matches[$format['month']];
            $year = (int)$matches[$format['year']];

            if ($year < 100) {
                $year += 2000;
            }

            if (isValidDate($day, $month)) {
                return ['day' => $day, 'month' => $month, 'year' => $year];
            }

            if (isValidDate($month, $day)) {
                return ['day' => $month, 'month' => $day, 'year' => $year];
            }

            return null;
        }
    }

    return null;
}



if (isset($_POST["date"])) {
    $dateStr = trim($_POST["date"]);
    $input = ParseDate($dateStr);

    if ($input) {
        $date = $input['month'] * 100 + $input['day'];
        echo GetZodiacSign($date);
    } else {
        echo "Ошибка: неверная или несуществующая дата";
    }
} else {
    echo "Ошибка: дата не передана";
}
