<?php 

/**Task:
Write a function which returns the sum of following series upto nth term(parameter).

Series: 1 + 1/4 + 1/7 + 1/10 + 1/13 + 1/16 +...
Rules:
- You need to round the answer to 2 decimal places and return it as String.
- If the given value is 0 then it should return 0.00
- You will only be given Natural Numbers as arguments.

Examples:
SeriesSum(1) => 1 = "1.00"
SeriesSum(2) => 1 + 1/4 = "1.25"
SeriesSum(5) => 1 + 1/4 + 1/7 + 1/10 + 1/13 = "1.57"
**/

function series_sum($n) {
  // Your code here
  $base_case = 1/4;
  $result = 1;
  $sequence_factor = 3;
  
  if($n == 0) {
      return "0.00";
  }
  
  if($n == 1) {
      return number_format(strval($result), 2, '.', ' ');
  }
  
  if($n == 2){
      return number_format(strval($result + $base_case), 2, '.', ' ');
  }
  
  $base_case_string = '1/4';
  $result = $result + $base_case;
   
  for($i=1; $i<=($n-2); $i++){
      $current_number_denominator = explode("/", $base_case_string)[1];
      
      $next_number_denominator = $current_number_denominator + $sequence_factor;
      $next_number = 1/$next_number_denominator;
      $next_number_string = "1/$next_number_denominator"; 
        
      $base_case_string = $next_number_string;
        
      $result = $result + $next_number;
  }
  
  return number_format(strval($result), 2, '.', ' ');
}

series_sum(5);