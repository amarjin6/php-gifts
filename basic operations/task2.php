<?php
$fd = fopen("index.html", 'w') or die("не удалось открыть файл");
fwrite($fd, '<table>');
for ($i = 1; $i <= $argv[$argc - 1]; $i++) {
    fwrite($fd, '<tr>');
    fwrite($fd, "<td>{$i}</td>");
    fwrite($fd, '</tr>');
}
fwrite($fd, '</table>');
fclose($fd);
?>