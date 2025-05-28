<?php
function SumOfDigits(string $input): int
{
    $sum = 0;
    for ($i = 0; $i < strlen($input); $i++) {
        $sum += (int) $input[$i];
    }
    return $sum;
}

function GetAllLuckyTickets(string $start, string $end): array
{
    $result = [];

    $start = (int) $start;
    $end = (int) $end;

    for ($i = $start; $i <= $end; $i++) {
        $ticket = str_pad((string) $i, 6, '0', STR_PAD_LEFT);
        $first_half = substr($ticket, 0, 3);
        $second_half = substr($ticket, 3, 3);

        if (SumOfDigits($first_half) === SumOfDigits($second_half)) {
            $result[] = $ticket;
        }
    }

    return $result;
}

if (isset($_POST['tickets'])) {
    $parts = explode(' ', trim($_POST['tickets']));

    if (count($parts) === 2 && ctype_digit($parts[0]) && ctype_digit($parts[1])) {
        $start = $parts[0];
        $end = $parts[1];

        if (strlen($start) !== 6 || strlen($end) !== 6) {
            echo "Ошибка: каждый билет должен содержать ровно 6 цифр.";
            exit;
        }

        foreach (GetAllLuckyTickets($start, $end) as $ticket) {
            echo $ticket . '<br>';
        }
    } else {
        echo "Ошибка: введите два шестизначных числа через пробел.";
    }
} else {
    echo "Ошибка: данные не переданы.";
}