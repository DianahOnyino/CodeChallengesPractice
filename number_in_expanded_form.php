<?php

/**Write Number in Expanded Form
You will be given a number and you will need to return it as a string in Expanded Form. For example:
expanded_form(12); // Should return "10 + 2"
expanded_form(42); // Should return "40 + 2"
expanded_form(70304); // Should return "70000 + 300 + 4"
NOTE: All numbers will be whole numbers greater than 0.
**/

function expanded_form(int $n): string 
{
    $number_length = strlen((string)$n);
    $number_digits = array_map('intval', str_split($n));
    $result = [];

    foreach ($number_digits as $key => $digit) {
        if ($digit != 0) {
            $power = ($number_length - 1) - $key;
            $result[] = $digit * pow(10, $power);
        }
    }

    return implode(' +', $result);
}

expanded_form(70304);