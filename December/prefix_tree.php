<?php

// Implement a trie with insert, search, and startsWith methods.

// Example:

// Trie trie = new Trie();

// trie.insert("apple");
// trie.search("apple");   // returns true
// trie.search("app");     // returns false
// trie.startsWith("app"); // returns true
// trie.insert("app");   
// trie.search("app");     // returns true
// Note:

// You may assume that all inputs are consist of lowercase letters a-z.
// All inputs are guaranteed to be non-empty strings.

class Trie
{
    function __construct(){ }

    public $trie = [];

    function insert($word)
    {
        array_push($this->trie, $word);
    }

    function search($word)
    {
        return in_array($word, $this->trie) ? true : false;
    }

    function startsWith($prefix)
    {
        $result = false;

        foreach ($this->trie as $word) {
            if (substr($word, 0, strlen($prefix)) == $prefix) {
                return $result = true;
            }
        }

        return $result;
    }
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */