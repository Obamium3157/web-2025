<?php
    function Factorial(int $n) : int {
        return ($n == 0) ? 1 : $n * Factorial($n - 1);
    }

    echo Factorial($_POST['number']);
?>