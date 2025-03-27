<?php
    function SumOfDigits(int $input) : int {
        $input = (string)$input;
        $res = 0;
        for ($i = 0; $i < strlen($input); $i++) { 
            $res += (int)$input[$i];
        }

        return $res;
    }

    function GetAllLuckyTickets(array $tickets) : array {
        $result = [];
        for ($i = $tickets[0]; $i <= $tickets[1]; $i++) { 
            $first_half = substr((string)$i, 0, 3);
            $second_half = substr((string)$i, 3, 3);
            if (SumOfDigits($first_half) == SumOfDigits($second_half)) {
                array_push($result, $i);
            }
        }
        
        return $result;
    }

    $tickets = explode(' ', $_POST['tickets']);
    // echo SumOfDigits($tickets[0]);
    foreach (GetAllLuckyTickets($tickets) as $key => $value) {
        echo $value . '</br>';
    }
?>