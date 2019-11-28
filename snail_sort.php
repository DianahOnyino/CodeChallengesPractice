<?php
// 4kyu - Snail
// Description:
// Snail Sort
// Given an n x n array, return the array elements arranged from outermost elements to 
// the middle element, traveling clockwise.

// array = [[1,2,3],
//          [4,5,6],
//          [7,8,9]]
// snail(array) #=> [1,2,3,6,9,8,7,4,5]
// For better understanding, please follow the numbers of the next array consecutively:

// array = [[1,2,3],
//          [8,9,4],
//          [7,6,5]]
// snail(array) #=> [1,2,3,4,5,6,7,8,9]

function snail($array)
{
    $final_array = [];
    $array_items_count = count($array);

    if ($array_items_count == 1) {
        return $array[0];
    }

    while ($array_items_count > 1) {
        $first_array = $array[0];

        for ($i = 0; $i < $array_items_count; $i++) {
            array_push($final_array, $first_array[$i]);
            unset($array[0][$i]);
        }

        unset($array[0]);
        $remaining_arrays = $array_items_count - 1;

        for ($i = 1; $i <= $remaining_arrays; $i++) {
            $next_array = $array[$i];
            $outermost_element = end($next_array);
            array_push($final_array, $outermost_element);
            unset($array[$i][key($next_array)]);
        }

        $last_array = $array[$array_items_count - 1];

        for ($i = $array_items_count - 2; $i >= 0; $i--) {
            array_push($final_array, $last_array[$i]);
            unset($array[$array_items_count - 1][$i]);
        }

        unset($array[$array_items_count - 1]);
        $count = $array_items_count - 2;

        for ($i = $count; $i > 0; $i--) {
            array_push($final_array, $array[$i][0]);
            unset($array[$i][0]);
        }

        $array = array_values($array);

        for ($i = 0; $i < count($array); $i++) {
            $array[$i] = array_values($array[$i]);
        }

        $array_items_count = count($array);
    }

    if (count($array) > 0) {
        array_push($final_array, $array[0][0]);
    }

    return $final_array;
}

//Test cases and expected results
// $array = [
//     [1, 2, 3],
//     [8, 9, 4],
//     [7, 6, 5]
// ];

// $array = [
//     [1, 2, 3, 4],
//     [5, 6, 7, 8],
//     [9, 10, 11, 12],
//     [13, 14, 15, 16]
// ];

// snail($array); //[1,2,3,4,5,6,7,8,9]
// snail($array); //[1,2,3,4,8,12,16,15,14,13,9,5,6,7,11,10]
// snail([[]]); //[]