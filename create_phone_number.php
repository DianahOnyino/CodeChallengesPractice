<?php 
/**Write a function that accepts an array of 10 integers (between 0 and 9), 
 * that returns a string of those numbers in the form of a phone number.
 * */
function createPhoneNumber($numbersArray) {
    $chunked_array = array_chunk($numbersArray, 3);
    $phone_number = [];
    
    $values_out_of_range = array_filter($numbersArray, 
    function($value) {
        return $value > 9 || $value < 0;
    });

    if(count($values_out_of_range) < 1) {
        foreach ($chunked_array as $key => $value) {
        $string_array = implode('', $value);

        if ($key == 0) {
            array_push($phone_number, "($string_array) ");
        } elseif ($key == 1) {
            array_push($phone_number, $string_array);
        } elseif ($key == 2) {
            array_push($phone_number, "-$string_array");
        } else {
            array_push($phone_number, $string_array);
        }
    }

    return implode('', $phone_number);
    }
}

createPhoneNumber([1,2,3,4,5,6,7,8,9,0]); // => returns "(123) 456-7890"
