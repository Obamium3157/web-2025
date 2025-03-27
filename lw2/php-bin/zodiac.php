<?php
    function GetZodiacSign(int $date) : string {
        if ($date >= 1222 || $date <= 120) {
            return "Козерог";
        } elseif (121 <= $date && $date <= 218) {
            return "Водолей";
        } elseif (219 <= $date && $date <= 320) {
            return "Рыбы";
        } elseif (321 <= $date && $date <= 419) {
            return "Овен";
        } elseif (420 <= $date && $date <= 520) {
            return "Телец";
        } elseif (521 <= $date && $date <= 621) {
            return "Близнецы";
        } elseif (622 <= $date && $date <= 722) {
            return "Рак";
        } elseif (723 <= $date && $date <= 822) {
            return "Лев";
        } elseif (823 <= $date && $date <= 922) {
            return "Дева";
        } elseif (923 <= $date && $date <= 1023) {
            return "Весы";
        } elseif (1024 <= $date && $date <= 1122) {
            return "Скорпион";    
        } elseif (1123 <= $date && $date <= 1221) {
            return "Стрелец";
        }
    }

    $parts = explode('.', $_POST["date"]);
    $day = $parts[0];
    $month = $parts[1];
    $date = "{$month}{$day}";
    echo GetZodiacSign($date);
    
?>