<?php
function SolveRPN(string $input): int
{
    $elems = explode(' ', trim($input));
    $stack = [];

    foreach ($elems as $elem) {
        if (ctype_digit($elem)) {
            $stack[] = (int) $elem;
        } elseif (in_array($elem, ['+', '-', '*'])) {
            if (count($stack) < 2) {
                echo "Ошибка: недостаточно операндов.";
                return 0;
            }

            $b = array_pop($stack);
            $a = array_pop($stack);

            switch ($elem) {
                case '+':
                    $stack[] = $a + $b;
                    break;
                case '-':
                    $stack[] = $a - $b;
                    break;
                case '*':
                    $stack[] = $a * $b;
                    break;
            }
        } else {
            echo "Ошибка: недопустимый символ '$elem'.";
            return 0;
        }
    }

    if (count($stack) !== 1) {
        echo "Ошибка: некорректное выражение.";
        return 0;
    }

    return $stack[0];
}

if (isset($_POST['expression'])) {
    echo SolveRPN($_POST['expression']);
} else {
    echo "Ошибка: выражение не передано.";
}