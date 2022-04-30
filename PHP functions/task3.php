<?php
$arr = Array(
    0 => Array(
        0 => 'name 0',
        1 => 'name 1',
        2 => 'name 2',
        3 => 'name 1'
    ),
    1 => Array(
        0 => 100,
        1 => 200,
        2 => 300,
        3 => 400
    )
);

$c = array_combine($arr[0], $arr[1]);
print_r($c);
