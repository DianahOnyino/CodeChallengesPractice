<?php

class Solution {
    /**Determine if a 9x9 Sudoku board is valid. 
     * Only the filled cells need to be validated according to the following rules:
        - Each row must contain the digits 1-9 without repetition.
        - Each column must contain the digits 1-9 without repetition.
        - Each of the 9 3x3 sub-boxes of the grid must contain the digits 1-9 without repetition.
    A partially filled sudoku which is valid.
    The Sudoku board could be partially filled, where empty cells are filled with the character '.'.
    
    Example 1:
    Input:
    [
    ["5","3",".",".","7",".",".",".","."],
    ["6",".",".","1","9","5",".",".","."],
    [".","9","8",".",".",".",".","6","."],
    ["8",".",".",".","6",".",".",".","3"],
    ["4",".",".","8",".","3",".",".","1"],
    ["7",".",".",".","2",".",".",".","6"],
    [".","6",".",".",".",".","2","8","."],
    [".",".",".","4","1","9",".",".","5"],
    [".",".",".",".","8",".",".","7","9"]
    ]
    Output: true**/

    function isValidSudoku($board) {
        $boardInCols = [];
        $boardInCubes = [];
        $boardInChunks = array_chunk($board, 3);

        $foundInvalidNumber = false;
        $rowDuplicates = false;

        foreach ($board as $row_index => $row) {
            $rowValues = [];

            foreach ($row as $item_index => $item) {
                if($item != '.' && ($item < 1 || $item > 9)) {
                    $foundInvalidNumber = true;
                    break;
                }
                $boardInCols[$item_index][$row_index] = $item;
                
                if(array_key_exists($item, $rowValues)) {
                    $rowValues[$item] = $rowValues[$item] + 1;
                } else {
                    $rowValues[$item] = 1; 
                }

                if ($item !== '.' && $rowValues[$item] > 1) {
                    $rowDuplicates = true;
                    break;
                }
            }
        }

        $colDuplicates = $this->boardHasDuplicates($boardInCols);
 
        foreach ($boardInChunks as $row_index => $row) {
            $new_row_items = [];

            foreach ($row as $key => $item) {
                $chunk = array_chunk($item, 3);
                $new_row_items[] = $chunk;
            }

            $first_items_in_cube = [];
            $second_items_in_cube = [];
            $third_items_in_cube = [];

            foreach ($new_row_items as $key => $value) {
                for ($i=0; $i < count($value); $i++) { 
                    if($i == 0) {
                        array_push($first_items_in_cube, $value[$i]);
                    }
                    elseif($i == 1) {
                        array_push($second_items_in_cube, $value[$i]);
                    }
                    elseif($i == 2) {
                        array_push($third_items_in_cube, $value[$i]);
                    }
                }
            }

            $first_items_in_cube = $this->nestedToFlat($first_items_in_cube);
            $second_items_in_cube = $this->nestedToFlat($second_items_in_cube);
            $third_items_in_cube = $this->nestedToFlat($third_items_in_cube);

            array_push($boardInCubes, $first_items_in_cube, $second_items_in_cube, $third_items_in_cube);
        }

        $cubeDuplicates = $this->boardHasDuplicates($boardInCubes);

        if ($rowDuplicates || $colDuplicates || $foundInvalidNumber || $cubeDuplicates) {
            echo('INVALID');
            return false;
        } else {
            echo('VALID');
            return true;
        }
    }

    public function nestedToFlat($_arr)
    {
        $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($_arr));
        return iterator_to_array($it, false);
    }

    public function boardHasDuplicates($board)
    {
        $foundDuplicates = false;

        foreach ($board as $row_index => $row) {
            $row_values = [];

            foreach ($row as $item_index => $item) {
                if (array_key_exists($item, $row_values)) {
                    $row_values[$item] = $row_values[$item] + 1;
                } else {
                    $row_values[$item] = 1;
                }

                if ($item !== '.' && $row_values[$item] > 1) {
                    $foundDuplicates = true;
                    break;
                }
            }
        }

        return $foundDuplicates;
    }
}

$sol = new Solution();

$board1 = [
    ["5","3",".",".","7",".",".",".","."],
    ["6",".",".","1","9",".",".","5","."],
    [".","9","8",".",".",".",".","6","."],
    ["8",".",".",".","6",".",".",".","3"],
    ["4",".",".","8","6","3",".",".","1"],
    ["7",".",".",".","2",".",".",".","6"],
    [".","6",".",".",".",".","2","8","."],
    [".",".",".","4","1","9",".",".","5"],
    [".",".",".",".","8",".",".","7","9"]
];

$sol->isValidSudoku($board1);
