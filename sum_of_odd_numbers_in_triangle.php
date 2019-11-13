<?php 
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