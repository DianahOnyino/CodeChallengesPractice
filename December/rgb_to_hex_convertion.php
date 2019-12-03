<?php

/**
 * The rgb() method is incomplete.
 * Complete the method so that passing in RGB decimal values will result in a hexadecimal representation being returned.
 * The valid decimal values for RGB are 0 - 255.
 * Any (r,g,b) argument values that fall out of that range should be rounded to the closest valid value.
 * The following are examples of expected output values:
 * rgb(255, 255, 255); // returns FFFFFF
 * rgb(255, 255, 300); // returns FFFFFF
 * rgb(0, 0, 0); // returns 000000
 * rgb(148, 0, 211); // returns 9400D3
 */

function rgb($r, $g, $b)
{
    $rgb_array = ['r' => $r, 'g' => $g, 'b' => $b];
    $final_hex_array = [];

    foreach ($rgb_array as $key => $value) {
        if ($value < 0) {
            $value = 0;
        }

        if ($value > 255) {
            $value = 255;
        }

        $starting_value = $value;
        $division_result = 1;
        $hex_array = [];

        //Convert from Decimal to Hexadecimal(Entire logic without using the inbult dechex function)
        while ($division_result > 0) {
            $division_result = intdiv($starting_value, 16);
            $remainder = $starting_value - ($division_result * 16);

            switch ($remainder) {
                case 10:
                    $value < 16 ? array_push($hex_array, "0" . "A") : array_push($hex_array, "A");
                    break;
                case 11:
                    $value < 16 ? array_push($hex_array, "0" . "B") : array_push($hex_array, "B");
                    break;
                case 12:
                    $value < 16 ? array_push($hex_array, "0" . "C") : array_push($hex_array, "C");
                    break;
                case 13:
                    $value < 16 ? array_push($hex_array, "0" . "D") : array_push($hex_array, "D");
                    break;
                case 14:
                    $value < 16 ? array_push($hex_array, "0" . "E") : array_push($hex_array, "E");
                    break;
                case 15:
                    $value < 16 ? array_push($hex_array, "0" . "F") : array_push($hex_array, "F");
                    break;
                default:
                    $value < 10 ? array_push($hex_array, "0" . "$remainder") : array_push($hex_array, "$remainder");
                    break;
            }

            $starting_value = $division_result;
        }

        $hex_array = array_reverse($hex_array, false);
        array_push($final_hex_array, join($hex_array));
    }

    return strtoupper(join($final_hex_array));
}

rgb(255, 255, 255); // returns FFFFFF
rgb(255, 255, 300); // returns FFFFFF
rgb(0, 0, 0); // returns 000000
rgb(148, 0, 211); // returns 9400D3
rgb(1, 0, 211); //0100D3
rgb(2, 0, 211); //0200D3
rgb(10, 0, 211); //0a00d3
rgb(11, 0, 211); //0b00d3
