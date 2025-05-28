<?php
function digitToWord($digit) {
    $words = [
        "0" => "Ноль",
        "1" => "Один",
        "2" => "Два",
        "3" => "Три",
        "4" => "Четыре",
        "5" => "Пять",
        "6" => "Шесть",
        "7" => "Семь",
        "8" => "Восемь",
        "9" => "Девять"
    ];

    return isset($words[$digit]) ? $words[$digit] : "Не цифра";
}

$digit = isset($_POST["digit"]) ? trim($_POST["digit"]) : "";

if (preg_match('/^[0-9]$/', $digit)) {
    echo digitToWord($digit);
} else {
    echo "Ошибка: введите одну цифру от 0 до 9";
}