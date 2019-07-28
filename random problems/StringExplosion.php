<?php

$field = readline();
$bomb = 0;
for ($i = 0; $i < strlen($field); $i++) {
    if ($bomb > 0 && $field[$i] != '>') {
        // $field = substr($field, 0, $i) . substr($field, $i + 1); // Remove char on this index
        $field = substr_replace($field, '', $i, 1); // another way to do it
        $bomb--; // One bomb is used
        $i--; // after remove next char is moved 1 position, so return counter i to this char, decreasing i by 1
    } else if ($field[$i] == '>') {
        $bomb += intval($field[$i + 1]); // takes the digit after '>' - bomb strength and add to bomb
    }
}
echo $field;
?>
//abv>1>1>2>2asdasd
//abv>>>>dasd

<?php

$arr = readline();
$bomb = 0;
for ($i = 0; $i < strlen($arr); $i++) {
    if ($bomb > 0 && $arr[$i] != '>') {
        $arr = substr_replace($arr, '', $i, 1);
        $bomb--;
        $i--;
    } else if ($arr[$i] == '>') {
        $bomb += intval($arr[$i + 1]);
    }
}
echo $arr;
