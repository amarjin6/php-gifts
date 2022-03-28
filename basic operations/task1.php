<?php
for ($i = 1; $i < $argc; $i++) {
    $type = '';
    if ($argv[$i] == (int)$argv[$i]) {
        $type = 'int';
    } elseif ($argv[$i] == (float)$argv[$i]) {
        $type = 'float';
    } else {
        $type = 'string';
    }
    echo $argv[$i] . ' : ' . $type . "\n";
}