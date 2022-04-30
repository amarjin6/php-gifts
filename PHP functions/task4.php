<?php

class Word
{
    function check($word)
    {
        foreach (count_chars($word, 1) as $i => $val) {
            echo "\"", chr($i), "\" occurs in line $val time(s).\n";
        }
    }
}

echo "Enter word:\n";
$data = readline();
$word = new Word();
$word->check($data);
