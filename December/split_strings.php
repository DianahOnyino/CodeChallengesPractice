<?php

/**
 * Complete the solution so that it splits the string into pairs of two characters. 
 * If the string contains an odd number of characters then it should replace the missing 
 * second character of the final pair with an underscore ('_').
 * Examples:
 * solution('abc') // should return ['ab', 'c_']
 * solution('abcdef') // should return ['ab', 'cd', 'ef']
 */

function solution($str) { 
    //Split the string into sizes of 2
    $str_array = str_split($str, 2);

    //Map the array to append the underscore if the last chunk contains oly one character
    return array_map(function($sub_array) {
        return strlen($sub_array) < 2 ? $sub_array . '_' : $sub_array;
    }, $str_array);
}

solution('');
solution('abc');
solution('abcdef');

