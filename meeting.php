<?php

/**
 * John has invited some friends. His list is:
 * s = "Fred:Corwill;Wilfred:Corwill;Barney:Tornbull;Betty:Tornbull;Bjon:Tornbull;Raphael:Corwill;Alfred:Corwill";
 *
 * Could you make a program that
 * makes this string uppercase
 * gives it sorted in alphabetical order by last name.
 * When the last names are the same, sort them by first name.
 * Last name and first name of a guest come in the result between parentheses separated by a comma.
 * So the result of function meeting(s) will be:
 *
 * "(CORWILL, ALFRED)(CORWILL, FRED)(CORWILL, RAPHAEL)(CORWILL, WILFRED)(TORNBULL, BARNEY)(TORNBULL, BETTY)(TORNBULL, BJON)"
 *
 * It can happen that in two distinct families with the same family name two people have the same first name too.
 */

function meeting($s)
{
    $exploded_string = explode(';', strtoupper($s));

    $exploded_string = array_map(function ($friend) {
        $exploded_friend = explode(':', $friend);
        $first_name = $exploded_friend[0];

        $exploded_friend[0] = $exploded_friend[1];
        $exploded_friend[1] = $first_name;

        return $exploded_friend;
    }, $exploded_string);

    usort($exploded_string, function ($exploded_string, $b) {
        if (strcmp($exploded_string[0], $b[0]) == 0) {
            return strcmp($exploded_string[1], $b[1]);
        }
        return strcmp($exploded_string[0], $b[0]);
    });

    $exploded_string = array_map(function ($friend) {
        return "(" . implode(', ', $friend) . ")";
    }, $exploded_string);

    return join($exploded_string);
}

$s = "Fred:Corwill;Wilfred:Corwill;Barney:Tornbull;Betty:Tornbull;Bjon:Tornbull;Raphael:Corwill;Alfred:Corwill";
meeting($s);
