<?php

/**
 * There are n bulbs that are initially off. You first turn on all the bulbs.
 * Then, you turn off every second bulb. On the third round, you toggle every third bulb
 * (turning on if it's off or turning off if it's on). For the i-th round, you toggle every i bulb.
 * For the n-th round, you only toggle the last bulb. Find how many bulbs are on after n rounds.
 * Example:
 * Input: 3
 * Output: 1
 * Explanation:
 * At first, the three bulbs are [off, off, off].
 * After first round, the three bulbs are [on, on, on].
 * After second round, the three bulbs are [on, off, on].
 * After third round, the three bulbs are [on, off, off].
 * So you should return 1, because there is only one bulb is on.
 */

class Solution
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function bulbSwitch($n)
    {
        $bulbs = [];

        for ($i = 0; $i < $n; $i++) {
            $counter = 0;

            switch ($i) {
                case 0:
                    for ($counter = 0; $counter < $n; $counter++) {
                        $bulbs[$counter] = 'on';
                    }
                    break;

                case ($i > 0) && ($i < $n - 1):
                    $every_i_bulb_index = $i;
                    $i_count = intdiv($n, $i + 1);

                    while ($counter < $i_count) {
                        if ($i == 1) {
                            $bulbs[$every_i_bulb_index] = 'off';
                            $every_i_bulb_index += 2;
                            $counter++;
                        } else {
                            $toggle = $bulbs[$every_i_bulb_index] == 'off' ? 'on' : 'off';
                            $bulbs[$every_i_bulb_index] = $toggle;
                            $every_i_bulb_index += $i + 1;
                            $counter++;
                        }
                    }
                    break;

                case($i == $n - 1):
                    $bulbs[$i] = $bulbs[$i] == 'off' ? 'on' : 'off';
                    break;

                default:
                    break;
            }
        }

        $bulbs_on = array_count_values($bulbs);

        return count($bulbs_on) == 0 ? 0 : $bulbs_on['on'];
    }
}

$sol = new Solution();
// $sol->bulbSwitch(0); //0
// $sol->bulbSwitch(1); //1
// $sol->bulbSwitch(2); //1
// $sol->bulbSwitch(3); //1
// $sol->bulbSwitch(4); //2
// $sol->bulbSwitch(5); //2
// $sol->bulbSwitch(6); //2
// $sol->bulbSwitch(7); //2
// $sol->bulbSwitch(8); //2
// $sol->bulbSwitch(9); //3
// $sol->bulbSwitch(10); //3
// $sol->bulbSwitch(11); //3
