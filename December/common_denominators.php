<?php

/**
 * Common denominators
 * You will have a list of rationals in the form
 * { {numer_1, denom_1} , ... {numer_n, denom_n} }
 * or
 * [ [numer_1, denom_1] , ... [numer_n, denom_n] ]
 * or
 * [ (numer_1, denom_1) , ... (numer_n, denom_n) ]
 * where all numbers are positive ints.
 *
 * You have to produce a result in the form
 * (N_1, D) ... (N_n, D)
 * or
 * [ [N_1, D] ... [N_n, D] ]
 * or
 * [ (N_1', D) , ... (N_n, D) ]
 * or
 * {{N_1, D} ... {N_n, D}}
 * or
 * "(N_1, D) ... (N_n, D)"
 * depending on the language (See Example tests)
 * in which D is as small as possible and
 * N_1/D == numer_1/denom_1 ... N_n/D == numer_n,/denom_n.
 * Example:
 * convertFracs [(1, 2), (1, 3), (1, 4)] `shouldBe` [(6, 12), (4, 12), (3, 12)]
 */

function convertFrac($lst)
{
    $denominators = [];

    foreach ($lst as $fraction) {
        array_push($denominators, $fraction[1]);
    }

    $starting_numbers = $denominators;
    $sum_of_starting_numbers = array_sum($starting_numbers);
    $progressing_numbers = [];
    $common_factors = [];

    while ($sum_of_starting_numbers > count($lst)) {
        $least_value = min(
            array_filter($starting_numbers, function ($number) {
                return $number != 1;
            })
        );

        $common_factors[] = $least_value;

        foreach ($starting_numbers as $key => $number) {
            $dividend = intdiv($number, $least_value);

            if ($number % $least_value != 0) {
                $progressing_numbers[] = $number;
            } else {
                $progressing_numbers[] = $dividend == $number ? 1 : $dividend;
            }
        }

        $starting_numbers = $progressing_numbers;
        $progressing_numbers = [];
        $sum_of_starting_numbers = array_sum($starting_numbers);
    }

    $common_denominator = array_product($common_factors);

    $result = array_map(function ($fraction) use ($common_denominator) {
        $fraction[0] = ($common_denominator / $fraction[1]) * $fraction[0];
        $fraction[1] = $common_denominator;
        $fraction = "($fraction[0],$fraction[1])";
        return $fraction;
    }, $lst);

    return join('', $result);
}

convertFrac([[1, 2], [1, 3], [1, 4]]); //[[6, 12], [4, 12], [3, 12]]