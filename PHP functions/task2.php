<?php
error_reporting(0);

class Disk
{
    function getDirectorySize($folderPath)
    {
        $files = scandir($folderPath);
        unset($files[0], $files[1]);
        $size = 0;
        foreach ($files as $file) {
            if (file_exists($folderPath . '/' . $file)) {
                $size += filesize($folderPath . '/' . $file);
                if (is_dir($folderPath . '/' . $file)) {
                    $size += $this->getDirectorySize($folderPath . '/' . $file);
                }
            }

        }
        return $size;
    }
}

echo "Enter directory:\n";
$string = readline();
$dfs = disk_free_space($string);
$dts = disk_total_space($string);
echo "Overall value: ", $dts - $dfs;
$disk = new Disk();
$pies = explode("\\", $string);
if ($pies[1] != null) {
    echo "\n" . $pies[1] . ": " . $disk->getDirectorySize($string);
}