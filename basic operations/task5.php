<?php

$stack = array();
for ($i = 1; $i < $argc; $i++) {
    $stack[] = strlen($argv[$i]);
}
print_r($stack);
$max = max($stack);
foreach ($stack as $key => $value) {
    if ($value == $max) {
        echo $argv[$key + 1] . "\n";
    }
}
?>