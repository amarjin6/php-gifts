<?php
$i=0;
$str = [];
if(isset($_GET["str"]))
{
    $string = $_GET["str"];
}
$str = explode(" ", $string);
echo "$string <br>" ;
for($j=count($str)-1; $j>=0; $j--)
{
    echo "$str[$j] ";
}

