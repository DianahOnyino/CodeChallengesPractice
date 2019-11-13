<?php 
/**
 * Given the triangle of consecutive odd numbers:

 *            1
*          3     5
*      7     9    11
*  13    15    17    19
*21    23    25    27    29
*...
*Calculate the row sums of this triangle from the row index (starting at index 1) e.g.:

*rowSumOddNumbers(1); // 1
*rowSumOddNumbers(2); // 3 + 5 = 8
 */
function rowSumOddNumbers($n) {
    $sum = 0;
  
    if($n == 1) {
        return $sum+=1;
    }

    $last_number_in_row = ($n * $n) + ($n - 1);
    $previous_number_step = 2;
    $previous_number = $last_number_in_row;
    
    for($i = 0; $i < $n; $i++) {
        $previous_number_step+=2;
    
        $sum += $previous_number;
    
        $previous_number -= 2;
    }
 
  return $sum;
}

rowSumOddNumbers(13);