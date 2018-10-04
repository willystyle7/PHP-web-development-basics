<?php
$monthIndex = intval(trim(fgets(STDIN)));
$months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
if ($monthIndex >=1 && $monthIndex <= 12) {
	echo $months[$monthIndex - 1].PHP_EOL;
} else {
	echo "Invalid Month!".PHP_EOL;
}

?>