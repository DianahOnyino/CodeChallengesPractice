<?php
/**
 * You are going to be given a word. Your job is to return the middle character of the word. 
 * If the word's length is odd, return the middle character. 
 * If the word's length is even, return the middle 2 characters.
 * #Examples:
 * Kata.getMiddle("test") should return "es"
 * Kata.getMiddle("testing") should return "t"
 * Kata.getMiddle("middle") should return "dd"
 * Kata.getMiddle("A") should return "A"
 */
function getMiddle($text) {
    $text_array = str_split($text);
    $characters_count = count($text_array);
    $quotient_count = intdiv($characters_count, 2);
    
    if($characters_count % 2 != 0) {
        return "$text_array[$quotient_count]";
    }
  
    $first_character = $quotient_count - 1;
    return "$text_array[$first_character]" . "$text_array[$quotient_count]";
}

getMiddle("testing");