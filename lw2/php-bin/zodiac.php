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

    if ($month < 1 || $month > 12) {
        return false;
    }

    if ($day < 1 || $day > $daysInMonth[$month - 1]) {
        return false;
    }

    return true;
}

if (isset($_POST["date"])) {
    $dateStr = trim($_POST["date"]);
    if (preg_match('/^(\d{2})\.(\d{2})\.(\d{4})$/', $dateStr, $matches)) {
        $day = (int) $matches[1];
        $month = (int) $matches[2];

        if (isValidDate($day, $month)) {
            $dateNum = $month * 100 + $day;
            echo GetZodiacSign($dateNum);
        } else {
            echo "Ошибка: недопустимая дата";
        }
    } else {
        echo "Ошибка: введите дату в формате ДД.ММ.ГГГГ";
    }
} else {
    echo "Ошибка: дата не передана";
}