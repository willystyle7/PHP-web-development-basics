<?php
//$date = new DateTime();
$date = DateTime::createFromFormat('d-m-Y G:i:s', trim(readline()));
$year = $date->format('Y');
$newYear = new DateTime("$year-12-31T24:00:00.000000Z");
//echo $date->format('Y-m-d\TH:i:s.u').PHP_EOL;
//echo $newYear->format('Y-m-d\TH:i:s.u');
$interval = $newYear->diff($date);
//print_r($interval);
$days = $interval->days;
$hours = $interval->h;
$minutes = $interval->i;
$seconds = $interval->s;
$allHours = $days * 24 + $hours;
$allMinutes = $allHours * 60 + $minutes;
$allSeconds = $allMinutes * 60 + $seconds;
echo 'Hours until new year : '.$allHours.PHP_EOL;
echo 'Minutes until new year : '.$allMinutes.PHP_EOL;
echo 'Seconds until new year : '.$allSeconds.PHP_EOL;
echo "Days:Hours:Minutes:Seconds $days:$hours:$minutes:$seconds".PHP_EOL;

?>