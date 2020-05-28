<?php
$str = readline();
$input = readline();
while ($input != "Reveal") {
    $command = explode(":|:", $input);
    switch ($command[0]) {
        case "InsertSpace":
            $index = $command[1];
            $f = substr($str, 0, $index);
            $l =  substr($str, $index);
            $str = $f . " " . $l;
            echo "$str\n";
            break;
        case "Reverse":
            $substring = $command[1];
            $pos = strpos($str, $substring);
            if ($pos !== false) {
                $f = substr($str, 0, $pos);
                $l =  substr($str,  $pos, strlen($substring));
                $l = strrev($l);
                $e = substr($str, $pos + strlen($substring));
                $str = $f . $e . $l;
                echo "$str\n";
            } else {
                echo "error\n";
            }
            break;
        case "ChangeAll":
            $substring = $command[1];
            $replacement = $command[2];
            $str = str_replace($substring, $replacement, $str);
            echo "$str\n";
            break;
    }
    $input = readline();
}
echo "You have a new text message: {$str}";
