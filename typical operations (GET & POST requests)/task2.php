<?php
$i=0;
$string = htmlspecialchars($_GET["str"]);
$str = explode(" ", $string);
foreach($str as $stroka)
{
    $i++;
    if ($i % 3 == 0) {
        $stroka = strtoupper($stroka);
    }
    for ($j = 0; $j < strlen($stroka); $j++) {
        if (($j % 2 == 0) && ($j != 0)) {
            echo '<b style="color: purple">'.$stroka[$j].'</b>';
        } else echo $stroka[$j];
    }
    echo '<br>';
}