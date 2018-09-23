<?php
$str = readline();
while ($str != "end") {
    echo "$str = ".strrev($str)."\n";
    $str = readline();
}