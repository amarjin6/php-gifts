<?php
error_reporting(0);

class Date
{
    public function get_age($date)
    {
        $stamp = strtotime($date);
        $age = date('Y') - date('Y', $stamp);
        if (date('md', $stamp) > date('md')) {
            $age--;
        }
        return $age;
    }
}

echo "Enter Your birth date:\n";
$str = readline();
$now = time();
$date = strtotime($str);
$diff = $now - $date;
$Date = new Date();
echo "Your age: " . floor($diff / (60 * 60 * 24)) . "  days" . " (" . $Date->get_age($str) . " years)";