<?php
date_default_timezone_set("Europe/Minsk");

class SmartDate
{
    private bool $weekend;
    private int $diff;
    private bool $leap;
    private bool $isCorrect;
    const DIFF_DAY = 0;
    const DIFF_MONTH = 1;
    const DIFF_YEAR = 2;

    public function __construct(int $d, int $m, int $y, $diff_type)
    {
        $this->isCorrect = checkdate($m, $d, $y);
        $this->leap = (!($y % 4) && ($y % 100)) || (!($y % 400));
        $this->weekend = date('w', mktime(0, 0, 0, $m, $d, $y)) == 6 ||
            date('w', mktime(0, 0, 0, $m, $d, $y)) == 0;
        $this->diff = time() - mktime(0, 0, 0, $m, $d, $y);
        $this->print_result($d, $m, $y, $diff_type);
    }

    public function print_result(int $d, int $m, int $y, int $diff_type)
    {
        if ($this->isCorrect) {
            print "Date: " . $d . "." . $m . "." . $y . "<br>";
            if ($this->weekend) {
                echo "Holiday!<br>";
            } else {
                echo "Working day...<br>";
            }
            if ($this->leap) {
                echo "Leap year<br>";
            } else {
                echo "Not a leap year<br>";
            }
            $d1 = date_create($y . "-" . $m . "-" . $d);
            $d2 = date_create(date("Y-m-d"));
            $interval = date_diff($d1, $d2);
            echo "Difference: ";
            $now = time();
            $inp_date = mktime(0, 0, 0, $m, $d, $y);
            $date_diff = $now - $inp_date;
            echo abs(intdiv($date_diff, (60 * 60 * 24)));
        } else {
            echo "Wrong date!";
        }
    }
}

?>

<html>
<title>Task4</title>
<style>
    body {
        display: flex;
        justify-content: flex-start;
        margin: 30px 20px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    input {
        width: 250px;
        margin-bottom: 15px;
    }

    #button {
        margin: 15px 0;
        width: 120px;
    }

    #date-inf {
        font-size: 40px;
        color: red;
    }

    .rad input {
        margin: 5px 0;
        width: 15px;
    }

    .text {
        display: flex;
        flex-direction: row;
        height: 35px;
    }

    span {
        width: 50px;

    }
</style>
<body>
<form method="get">
    <div class="text">
        <span>Num:</span>
        <input type="text" name="day">
    </div>
    <div class="text">
        <span>Month:</span>
        <input type="text" name="month">
    </div>
    <div class="text">
        <span>Year:</span>
        <input type="text" name="year">
    </div>
    <input type="submit" id="button" name="add" value="Check IT!">
    <div id="date-inf">
        <?php
        $d = (int)!empty($_GET['day']) ? $_GET['day'] : -1;
        $m = (int)!empty($_GET['month']) ? $_GET['month'] : -1;
        $y = (int)!empty($_GET['year']) ? $_GET['year'] : -1;
        if (is_numeric($d) && is_numeric($m) && is_numeric($y)) {
            if (is_int(+$d) && is_int(+$m) && is_int(+$y)) {
                $diff_type_str = (int)!empty($_GET['diff']) ? $_GET['diff'] : '';
                if ("day" == $diff_type_str) {
                    $diff_type = SmartDate::DIFF_DAY;
                } elseif ("month" == $diff_type_str) {
                    $diff_type = SmartDate::DIFF_MONTH;
                } elseif ("year" == $diff_type_str) {
                    $diff_type = SmartDate::DIFF_YEAR;
                } else $diff_type = -1;
                $smartDate = new SmartDate($d, $m, $y, $diff_type);
            } else {
                echo "Wrong date!";
            }
        } else {
            echo "Wrong date!";
        }
        ?>
    </div>
</form>
</body>
</body>
</html>
