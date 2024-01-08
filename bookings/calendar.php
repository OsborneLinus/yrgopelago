<?php

declare(strict_types=1);

class calendar

{
    private $dayLabels = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
    private $currentYear = 0;
    private $currentMonth = 0;
    private $currentDay = 0;
    private $currentDate = null;
    private $daysInMonth = 0;
    private $sundayFirst = true;
    private $naviHref = null;

    public function __construct()
    {
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }

    public $cellContent = '';
    protected $observers = array();

    public function attachObserver($type, $observer)
    {
        $this->observers[$type][] = $observer;
    }

    public function notifyObserver($type)
    {
        if (isset($this->observers[$type])) {
            foreach ($this->observers[$type] as $observer) {
                $observer->update($this);
            }
        }
    }

    public function getCurrentDate()
    {
        return $this->currentDate;
    }

    public function setSundayFirst($bool = false)
    {
        $this->sundayFirst = $bool;
    }

    public function show($attributes = false)
    {

        $month = 1;
        $year = date("Y", time());

        /*        Commented out code is for the calendar to render out information for more than just January, for the calendar to work forwards and backwards remove the comments, and also add $month = null, $year = null, as arguments before $attributes = false).

        if (null == $year && isset($_GET['year'])) {
            $year = $_GET['year'];
        } else if (null == $year) {
            $year = date("Y", time());
        }

        if (null == $month && isset($_GET['month'])) {
            $month = $_GET['month'];
        } else if (null == $month) {
            $month = date("m", time());
        } */

        $this->currentYear = $year;
        $this->currentMonth = $month;
        $this->daysInMonth = $this->_daysInMonth($month, $year);
        $content = '<div id="calendar">
        <form method="post">
            <input type="hidden" name="addNewBooking">
             <input type="hidden" value="' . $_GET['roomType'] . '" name="roomType">
        ' .
            '<div class="box">' .
            $this->_createNavi() .
            '</div>' .
            '<div class="box-content">' .
            '<ul class="label">' . $this->_createLabels() . '</ul>';
        $content .= '<div class="clear"></div>';
        $content .= '<ul class="dates">';

        for ($i = 0; $i < $this->_weeksInMonth($month, $year); $i++) {
            for ($j = 1; $j <= 7; $j++) {
                $content .= $this->_showDay($i * 7 + $j, $attributes);
            }
        }
        $content .= '</ul>';
        $content .= '<div class="clear"></div>';
        $content .= '</div>';
        $content .= '



        <label for="email">Email:
        <input id="email" type="email" name="email" placeholder="Email" required><br>
        </label>
        <label for="name">Name:
        <input id="name" type="text" name="name" placeholder="Name" required><br>
        </label>
        <label for="transferCode">TransferCode:
        <input id="transferCode" type="text" name="transferCode" placeholder="TransferCode" required>
        </label>
        <input id="book-btn" class="border-solid rounded-md p-1 mb-10 text-white bg-green-950" type="submit" value="Book" name="submitCalender">

        </form>
        </div>';
        return $content;
    }

    private function _showDay($cellNumber, $attributes = false)
    {
        $firstDayOfMonth = date('N', strtotime($this->currentYear . '-' . $this->currentMonth . '-01'));
        if ($this->sundayFirst) {
            $firstDayOfMonth = ($firstDayOfMonth == 7) ? 1 : ($firstDayOfMonth + 1);
        }

        $daysInMonth = date('t', strtotime($this->currentYear . '-' . $this->currentMonth . '-01'));

        if ($cellNumber >= $firstDayOfMonth && $cellNumber < $firstDayOfMonth + $daysInMonth) {
            $this->currentDay = $cellNumber - $firstDayOfMonth + 1;
            $this->currentDate = date('Y-m-d', strtotime($this->currentYear . '-' . $this->currentMonth . '-' . $this->currentDay));
            $cellContent = $this->_createCellContent($attributes);
        } else {
            $this->currentDay = 0;
            $this->currentDate = null;
            $cellContent = null;
        }

        return '<li id="li-' . $this->currentDate . '" class="' . ($cellNumber % 7 == 1 ? 'start ' : ($cellNumber % 7 == 0 ? 'end ' : '')) .
            ($cellContent == null ? 'mask' : '') . '">' . ($this->currentDay > 0 ? $this->currentDay : '') . '<br>' . $cellContent . '</li>';
    }

    private function _createNavi()
    {
        $nextMonth = $this->currentMonth == 12 ? 1 : intval($this->currentMonth) + 1;
        $nextYear = $this->currentMonth == 12 ? intval($this->currentYear) + 1 : $this->currentYear;

        $preMonth = $this->currentMonth == 1 ? 12 : intval($this->currentYear) - 1;
        $preYear = $this->currentMonth == 1 ? intval($this->currentYear) - 1 : $this->currentYear;

        ob_start();
?>
        <div class="header">
            <span class="title"><?php echo date('Y M', strtotime($this->currentYear . '-' . $this->currentMonth . '-1')); ?></span>

            <!-- Commented out code is for the adding of the buttons "prev" and "next" in the calendar. But i only want to render out January which is why i remove the option to even have the prev and next buttons -->

            <!--             <a class="prev" href="<?php /* echo $this->naviHref . '?month=' . sprintf('%02d', $preMonth) . '&year=' . $preYear; */ ?>">Prev</a>
            <span class="title"><?php /* echo date('Y M', strtotime($this->currentYear . '-' . $this->currentMonth . '-1')); */ ?></span>
            <a class="next" href="<?php /*  echo $this->naviHref . '?month=' . sprintf("%02d", $nextMonth) . '&year=' . $nextYear; */ ?>">Next</a> -->
        </div>
        <?php
        return ob_get_clean();
    }

    private function _createLabels()
    {
        if ($this->sundayFirst) {
            $temp = $this->dayLabels[0];
            for ($i = 1; $i < sizeof($this->dayLabels); $i++) {
                $tmp = $this->dayLabels[$i];
                $this->dayLabels[$i] = $temp;
                $temp = $tmp;
            }
            $this->dayLabels[0] = $temp;
        }

        ob_start();
        foreach ($this->dayLabels as $index => $label) {
        ?>
            <li class="<?php echo ($index == 6 ? 'end title' : 'start title'); ?>title"><?php echo $label; ?></li>
<?php
        }
        return ob_get_clean();
    }

    private function _createCellContent($attributes)
    {
        $this->cellContent = '';
        $this->cellContent = $this->currentDay;

        // observer
        $this->notifyObserver('showCell');
        return $this->cellContent;
    }

    private function _weeksInMonth($month = null, $year = null)
    {
        if (null == ($year)) {
            $year = date("Y", time());
        }
        if (null == $month) {
            $month = date("m", time());
        }

        $daysInMonth = $this->_daysInMonth($month, $year);

        $numOfWeeks = (intval($daysInMonth) % 7 == 0 ? 0 : 1) + (intval($daysInMonth) / 7);
        $monthEndingDay = date('N', strtotime($year . '-' . $month . '-' . $daysInMonth));
        $monthStartDay = date('N', strtotime($year . '-' . $month . '-01'));
        $monthEndingDay == 7 ? $monthEndingDay = 0 : '';
        $monthStartDay == 7 ? $monthStartDay = 0 : '';

        if ($monthEndingDay < $monthStartDay) {
            $numOfWeeks++;
        }
        return $numOfWeeks;
    }

    private function _daysInMonth($month = null, $year = null)
    {
        if (null == ($year)) {
            $year = date('Y', time());
        }
        if (null == ($month)) {
            $month = date('m', time());
        }

        return date('t', strtotime($year . '-' . $month . '-01'));
    }
}
