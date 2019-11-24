<?php 
/**
 * Write Number in Expanded Form - Part 2
 * This is version 2 of my 'Write Number in Exanded Form' Kata.
 * You will be given a number and you will need to return it as a string in Expanded Form. For example:
 * expandedForm(1.24); // should return '1 + 2/10 + 4/100'
 * expandedForm(7.304); // should return '7 + 3/10 + 4/1000'
 * expandedForm(0.04); // should return '4/100'
**/

function expanded_form($n) {
    $exploded_number = explode('.', (string)$n);

    $whole_number = $exploded_number[0];
    $decimals = $exploded_number[1];

    $whole_number_length = strlen((string)$whole_number);
    $whole_number_digits = array_map('intval', str_split($whole_number));

    $decimal_number_digits = array_map('intval', str_split($decimals));

    $result = [];

    foreach ($whole_number_digits as $key => $digit) {
        if ($digit != 0) {
            $power = ($whole_number_length - 1) - $key;
            $result[] = $digit * pow(10, $power);
        }
    }

    foreach ($decimal_number_digits as $key => $digit) {
        if ($digit != 0) {
            $denominator = pow(10, ($key + 1));
            $result[] = "$digit/$denominator";
        }
    }

    return implode(' + ', $result);
}

expanded_form(1.24);