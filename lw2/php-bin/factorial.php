<?php
function Factorial(int $n): int
{
    return ($n === 0) ? 1 : $n * Factorial($n - 1);
}

const MAX_DEPTH = 20;

if (isset($_POST['number']) && ctype_digit($_POST['number'])) {
    $n = (int) $_POST['number'];

    if ($n < 0) {
        echo "Ошибка: факториал определён только для неотрицательных чисел.";
    } elseif ($n > MAX_DEPTH) {
        echo "Ошибка: слишком большое число. Максимально допустимое значение - " . MAX_DEPTH . ".";
    } else {
        echo Factorial($n);
    }
} else {
    echo "Ошибка: введите целое неотрицательное число.";
}