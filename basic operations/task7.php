<?php
echo "<table border = 1>";

function make_column($l, $i)
{
    echo "<td>", $l . $i, "</td>";
}

function make_line($l)
{
    echo "<tr>";
    for ($i = 0; $i < 10; $i++) {
        echo make_column($l, $i);
    }
    echo "</tr>";
}

for ($l = 0; $l < 10; $l++) {
    echo make_line($l);
}

echo "</table>";

?>