<?php
    $string = htmlspecialchars($_GET["/"]);
$pieces = explode(" ", $string);
//print_r($pieces);
$len = count($pieces);
for ($i = 1; $i < $len; $i++) {
    $type = '';
    if ($pieces[$i] == (int)$pieces[$i]) {
        $type = 'int';
    } elseif ($pieces[$i] == (float)$pieces[$i]) {
        $type = 'float';
    } else {
        $type = 'string';
    }

    echo $pieces[$i] . ' : ' . $type . "<br>";
}
?>
