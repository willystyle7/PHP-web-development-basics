<?php
$capacity = intval(readline());
$usersArr = [];
$input = readline();
while ($input !== 'Statistics') {
    $arr = explode('=', $input);
    $command = $arr[0];
    switch ($command) {
        case "Add":
            $username = $arr[1];
            $sent = intval($arr[2]);
            $recieved = intval($arr[3]);
            if (!key_exists($username, $usersArr)) {
                $usersArr[$username] = ["sent" => $sent, "recieved" => $recieved];
            }
            break;
        case "Message":
            $sender = $arr[1];
            $reciever = $arr[2];
            if (key_exists($sender, $usersArr) && key_exists($reciever, $usersArr)) {
                $usersArr[$sender]["sent"]++;
                $usersArr[$reciever]["recieved"]++;
                if ($usersArr[$sender]["sent"] + $usersArr[$sender]["recieved"] >= $capacity) {
                    echo  $sender . " reached the capacity!\n";
                    unset($usersArr[$sender]);
                }
                if ($usersArr[$reciever]["sent"] + $usersArr[$reciever]["recieved"] >= $capacity) {
                    echo  $reciever . " reached the capacity!\n";
                    unset($usersArr[$reciever]);
                }
            }
            break;
        case "Empty":
            $username = $arr[1];
            if ($username == 'All') {
                $usersArr = [];
            } elseif (key_exists($username, $usersArr)) {
                unset($usersArr[$username]);
            }
            break;
    }
    $input = readline();
}

// sort - 1 variant
ksort($usersArr);
uasort($usersArr, function ($a, $b) {
    return $b["recieved"] - $a["recieved"];
});

// sort - 2 variant
// uksort($usersArr, function ($a, $b) use ($usersArr) {
//     if ($usersArr[$b]["recieved"] === $usersArr[$a]["recieved"]) {
//         return strcasecmp($a, $b);
//     }
//     return $usersArr[$b]["recieved"] - $usersArr[$a]["recieved"];
// });


echo "Users count: " . count(array_keys($usersArr)) . "\n";
foreach ($usersArr as $username => $messages) {
    echo "$username - " .  array_sum($messages) . PHP_EOL;
}
