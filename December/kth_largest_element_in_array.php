<?php

/**
 * Find the kth largest element in an unsorted array.
 * Note that it is the kth largest element in the sorted order, not the kth distinct element.
 * Example 1:
 * Input: [3,2,1,5,6,4] and k = 2
 * Output: 5
 * Example 2:
 *
 * Input: [3,2,3,1,2,4,5,5,6] and k = 4
 * Output: 4
 * Note:
 * You may assume k is always valid, 1 ≤ k ≤ array's length.
 */
class Solution
{
    function findKthLargest($nums, $k)
    {
        //Simpler solution
        // rsort($nums);
        // return $nums[$k - 1];

        //Get the largest element in array and its key
        list($max, $max_key) = $this->getNextMax($nums);

        while ($k > 1) {
            unset($nums[$max_key]);
            list($max, $max_key) = $this->getNextMax($nums);
            $k--;
        }

        return $max;
    }

    public function getNextMax($nums)
    {
        $max = max($nums);
        $max_key = array_search($max, $nums);

        return array($max, $max_key);
    }
}
