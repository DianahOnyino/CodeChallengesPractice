<?php

/**
 * The marketing team is spending way too much time typing in hashtags.
 * Let's help them with our own Hashtag Generator!
 * Here's the deal:
 * It must start with a hashtag (#).
 * All words must have their first letter capitalized.
 * If the final result is longer than 140 chars it must return false.
 * If the input or the result is an empty string it must return false.
 * Examples
 * " Hello there thanks for trying my Kata"  =>  "#HelloThereThanksForTryingMyKata"
 * "    Hello     World   "                  =>  "#HelloWorld"
 * ""                                        =>  false
 */

function generateHashtag($str) {
    if (trim($str) === '') {
        return false;
    }

    //Split the string and convert the first letter of each word to uppercase
    $str_array = array_map(function($word) {
        return ucfirst($word);
    }, explode(' ', $str));

    $final_string = implode($str_array);
    $result = "#$final_string";

    //Return false if the lenth exeeds the give limit otherwise retun the hashtag
    return strlen($result) > 140 ? false : $result;
}

generateHashtag('Codewars is nice');
generateHashtag('Codewars');
generateHashtag('');
generateHashtag(str_repeat(' ', 200));
generateHashtag('Codewars      ');
generateHashtag('Code' . str_repeat(' ', 140) . 'wars');
generateHashtag('Looooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooong Cat');
generateHashtag(str_repeat("a", 139));
generateHashtag(str_repeat("a", 140));