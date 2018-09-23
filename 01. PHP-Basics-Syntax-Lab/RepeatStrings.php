<?php
$strs = explode(" ", trim(readline()));
$result = "";
foreach ($strs as $str) {
    for ($i = 0; $i < strlen($str); $i++) { 
        $result .= $str;
    }
}
echo $result."\n";