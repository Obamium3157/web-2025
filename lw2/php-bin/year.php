<?php
    $year = (isset($_POST["year"])) ? $_POST["year"] : 0;
    echo ($year % 400 == 0 || ($year % 4 == 0 && $year % 100 != 0)) ? 'YES' : 'NO';
?>