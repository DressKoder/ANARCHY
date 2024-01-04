<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Календарь</title>   
</head>
<body>
    <?php
      function drawCalendar($month = null, $year = null) {
        if ($month === null) {
            $month = date('n');
        }
        if ($year === null) {
            $year = date('Y');
        }
        $numDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $firstDay = date('N', strtotime($year . '-' . $month . '-01'));
        $holidays = array( 
            '07-01',
            '12-06',
            '4-10',
            '08-03',
            '09-05',
            '23-02',
        );
        echo '<table>';
        echo '<tr><th colspan="7">' . date('F Y', strtotime($year . '-' . $month . '-01')) . '</th></tr>';
        echo '<tr><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th><th>Sun</th></tr>';
        
     
        echo '<tr>';
        for ($i = 1; $i < $firstDay; $i++) {
            echo '<td></td>';
        }
        for ($day = 1; $day <= $numDays; $day++) {
            if (in_array(date('d-m', strtotime($year . '-' . $month . '-' . $day)), $holidays)) {
                echo '<td style="background-color: red;">' . $day . '</td>';
            } elseif (date('N', strtotime($year . '-' . $month . '-' . $day)) >= 6) {
                echo '<td style="background-color: yellow;">' . $day . '</td>';
            } else {
                echo '<td>' . $day . '</td>';
            }
            if (date('N', strtotime($year . '-' . $month . '-' . $day)) == 7) {
                echo '</tr><tr>';
            }
        }
        echo '</tr>';
        echo '</table>';
    }
    
    drawCalendar(); 
    drawCalendar(3, 2022); 
    ?>
</body>
</html>