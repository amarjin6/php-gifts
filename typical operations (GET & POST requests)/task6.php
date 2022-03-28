<?php
$string = htmlspecialchars($_GET["str"]);
$str = explode(" ", $string);

for ($i = 0; $i <= count($str); $i++) {
    echo "$str[$i] <br>";

    if ($str[$i] == (int)$str[$i]) {
        $str[$i] = $str[$i] * 2;
    } elseif ($str[$i] == (float)$str[$i]) {
        $str[$i] = round($str[$i], 2);
    } else $str[$i] = strtoupper($str[$i]);

    echo "$str[$i] <br>";
}

