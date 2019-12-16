<?php

// return the "survivor", ie: the last element of a Josephus permutation.

function josephus_survivor(int $n, int $k): int
{
    $people = range(1, $n);
    $count = count($people);

    //Loop through n-1 times in order to remain with the survivor
    while ($count > 1) {
        $victim_index = $k - 1;

        //In cases where victim index exceeds people count, loop over the items until victim index is attained
        if ($victim_index >= $count) {
            $victim_index = ($k - $count) - 1;

            while ($victim_index >= $count) {
                $victim_index -= $count;
            }
        } 
       
        //Remove the victm from the array and push the previous people to the end of the array  
        unset($people[$victim_index]);
        $rest = array_splice($people, $victim_index);
       
        $people = array_merge($rest, $people);
        $count = count($people);
    }

    return $people[0];
}

josephus_survivor(7, 3); //4
josephus_survivor(11, 19); //10
josephus_survivor(1, 300); //1
josephus_survivor(14, 2); //13
josephus_survivor(100, 1); //100