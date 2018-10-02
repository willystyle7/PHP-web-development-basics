<?php
$sentence = readline();
$arr = explode(' ', readline());
$char = $arr[0];
$occurence = intval($arr[1]);
$currentOccurence = 0;
for ($i = 0; $i <= strlen($sentence); $i++) {
	if ($sentence[$i] === $char) {
		$currentOccurence++;
		if ($currentOccurence === $occurence) {
			echo $i;
			return;
		}
	}	
}
echo "Find the letter yourself!";