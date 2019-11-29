<?php

// Next bigger number with the same digits
// Description:
// You have to create a function that takes a positive integer number and returns the 
// next bigger number formed by the same digits:

// nextBigger(12)==21
// nextBigger(513)==531
// nextBigger(2017)==2071
// If no bigger number can be composed using those digits, return -1:

// nextBigger(9)==-1
// nextBigger(111)==-1
// nextBigger(531)==-1

function nextBigger($num)
{
    $digits = array_map('intval', str_split($num));
    $last_index = count($digits) - 1;

    if (count($digits > 1) && ($digits[$last_index] > $digits[$last_index - 1])) {
        $digit_temp = $digits[$last_index - 1];

        //Swap digits
        $digits[$last_index - 1] = $digits[$last_index];
        $digits[$last_index] = $digit_temp;

        return join("", $digits);
    }

    return -1;
}

nextBigger(12); //21
nextBigger(513); //531
nextBigger(2017); //2071
nextBigger(531); //-1
nextBigger(111); //-1
nextBigger(531); //-1
