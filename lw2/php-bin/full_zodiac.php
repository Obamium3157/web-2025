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

    function ParseDate(string $dateStr): array {
        $formats = [
            // ДД.ММ.ГГГГ
            '/^(\d{2})\.(\d{2})\.(\d{4})$/' => ['day' => 1, 'month' => 2, 'year' => 3],
            // ДД-ММ-ГГГГ
            '/^(\d{2})-(\d{2})-(\d{4})$/' => ['day' => 1, 'month' => 2, 'year' => 3],
            // ДД/ММ/ГГГГ
            '/^(\d{2})\/(\d{2})\/(\d{4})$/' => ['day' => 1, 'month' => 2, 'year' => 3],
            // ГГГГ.ММ.ДД
            '/^(\d{4})\.(\d{2})\.(\d{2})$/' => ['day' => 3, 'month' => 2, 'year' => 1],
            // ГГГГ-ММ-ДД
            '/^(\d{4})-(\d{2})-(\d{2})$/' => ['day' => 3, 'month' => 2, 'year' => 1],
            // ГГГГ/ММ/ДД
            '/^(\d{4})\/(\d{2})\/(\d{2})$/' => ['day' => 3, 'month' => 2, 'year' => 1],
            // ДД.ММ.ГГ
            '/^(\d{2})\.(\d{2})\.(\d{2})$/' => ['day' => 1, 'month' => 2, 'year' => 3],
            // ДД-ММ-ГГ
            '/^(\d{2})-(\d{2})-(\d{2})$/' => ['day' => 1, 'month' => 2, 'year' => 3],
            // ДД/ММ/ГГ
            '/^(\d{2})\/(\d{2})\/(\d{2})$/' => ['day' => 1, 'month' => 2, 'year' => 3],
            // ДДММГГГГ
            '/^(\d{2})(\d{2})(\d{4})$/' => ['day' => 1, 'month' => 2, 'year' => 3]
        ];
    
        foreach ($formats as $pattern => $groups) {
            if (preg_match($pattern, $dateStr, $matches)) {
                $day = (int)$matches[$groups['day']];
                $month = (int)$matches[$groups['month']];
                $year = (int)$matches[$groups['year']];
                
                if ($year < 100) {
                    $year += 2000;
                }
                
                return ['day' => $day, 'month' => $month, 'year' => $year];
            }
        }
    }

    $input = ParseDate($_POST["date"]);
    $date = "{$input['day']}{$input['month']}"; 
    echo GetZodiacSign($date);
?>