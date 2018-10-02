<?php
$month = trim(readline());
$year = 2018;
$day = 1;
$sundays = [];
$date = DateTime::createFromFormat('j-F-Y', $day.'-'.$month.'-'.$year);
$interval = new DateInterval('P1D');
while ($date->format("F") == $month) {
	if ($date->format("l") == 'Sunday') {
        $sundays[] = $date->format('j').'rd'.$date->format(' m, Y');
        //$sundays[] = $date->format('jS m, Y');
    }
    $date = $date->add($interval);	
}
foreach ($sundays as $sunday) {
	echo $sunday.PHP_EOL;
}
?>