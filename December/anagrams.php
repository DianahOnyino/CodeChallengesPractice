<?php

/**
 * What is an anagram? Well, two words are anagrams of each other if they both contain the same letters. For example:
 * 'abba' & 'baab' == true
 * 'abba' & 'bbaa' == true
 * 'abba' & 'abbba' == false
 * 'abba' & 'abca' == false
 * Write a function that will find all the anagrams of a word from a list. 
 * You will be given two inputs a word and an array with words. 
 * You should return an array of all the anagrams or an empty array if there are none. 
 * For example:
 * anagrams('abba', ['aabb', 'abcd', 'bbaa', 'dada']) => ['aabb', 'bbaa']
 * anagrams('racer', ['crazer', 'carer', 'racar', 'caers', 'racer']) => ['carer', 'racer']
 * anagrams('laser', ['lazing', 'lazy',  'lacer']) => []
 */

function anagrams(string $word, array $words): array {
    $word_array = str_split($word);
    sort($word_array);

    //Convert the the words to array and sort the characters alphabetically
    $result =  array_filter($words, function($word_to_check) use($word_array) {
        $word_to_check_array = str_split($word_to_check);
        sort($word_to_check_array);

        //The word to check is an anagram if the two arrays are equal
        return $word_array == $word_to_check_array;
    });

    return array_values($result);  
}

anagrams('abba', ['aabb', 'abcd', 'bbaa', 'dada']); // => ['aabb', 'bbaa']
anagrams('racer', ['crazer', 'carer', 'racar', 'caers', 'racer']); // => ['carer', 'racer']
anagrams('laser', ['lazing', 'lazy',  'lacer']); // => []