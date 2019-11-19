<?php
/**Write a function
 *
 * tripledouble(num1,num2)
 * which takes numbers num1 and num2 and returns 1 if there is a straight triple of a number at any place in num1
 * and also a straight double of the same number in num2.
 *
 * If this isn't the case, return 0
 *
 * Examples
 * tripledouble(451999277, 41177722899) == 1 // num1 has straight triple 999s and
 * // num2 has straight double 99s
 *
 * tripledouble(1222345, 12345) == 0 // num1 has straight triple 2s but num2 has only a single 2
 *
 * tripledouble(12345, 12345) == 0
 *
 * tripledouble(666789, 12345667) == 1
 **/

function tripledouble($num1, $num2)
{
    $num1_digits = array_map('intval', str_split($num1));
    $num2_digits = array_map('intval', str_split($num2));

    $num1_digits_occurrences = array_count_values($num1_digits);
    $num2_digits_occurrences = array_count_values($num2_digits);

    $three_consecutive_array_items = false;
    $two_consecutive_array_items = false;

    foreach ($num1_digits_occurrences as $key => $value) {
        if ($value > 2) {
            $first_occurrence_index = array_search($key, $num1_digits);

            if ($num1_digits[$first_occurrence_index + 1] == $key
                && $num1_digits[$first_occurrence_index + 2] == $key) {
                $three_consecutive_array_items = true;
            }
        }
    }

    foreach ($num2_digits_occurrences as $key => $value) {
        if ($value > 1) {
            $first_occurrence_index = array_search($key, $num2_digits);

            if ($num2_digits[$first_occurrence_index + 1] == $key) {
                $two_consecutive_array_items = true;
            }
        }
    }

    return ($three_consecutive_array_items && $two_consecutive_array_items) ? 1 : 0;
}

tripledouble(66677789, 123456677);
