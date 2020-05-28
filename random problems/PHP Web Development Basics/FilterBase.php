<?php
// $database = [];
// $input = readline();
// while ($input !== 'filter base') {
//     list($name, $data) = explode(' -> ', $input);
//     if (!key_exists($name, $database)) {
//         $database[$name] = [
//             "Age" => null,
//             "Salary" => null,
//             "Position" => null
//         ];
//     }
//     if (preg_match('/^\d+$/', $data)) {
//         $property = "Age";
//     } elseif (preg_match('/^\d+\.\d+$/', $data)) {
//         $property = "Salary";
//         $data = number_format($data, 2, '.', "");
//     } else {
//         $property = "Position";
//     }
//     $database[$name][$property] = $data;
//     $input = readline();
// }
// $filterType = readline();
// $line = str_repeat("=", 20) . PHP_EOL;
// foreach ($database as $name => $values) {
//     if (!is_null($values[$filterType])) {
//         echo "Name: $name" . PHP_EOL;
//         echo "$filterType: ${values[$filterType]}" . PHP_EOL;
//         echo $line;
//     }
// }

$database = [
    "Age" => [],
    "Salary" => [],
    "Position" => []
];
$input = readline();
while ($input !== 'filter base') {
    list($name, $data) = explode(' -> ', $input);
    if (preg_match('/^\d+$/', $data)) {
        $property = "Age";
    } elseif (preg_match('/^\d+\.\d+$/', $data)) {
        $property = "Salary";
        $data = number_format(floatval($data), 2, '.', "");
    } else {
        $property = "Position";
    }
    $database[$property][$name] = $data;
    $input = readline();
}
$filterType = readline();
$line = str_repeat("=", 20) . PHP_EOL;
foreach ($database[$filterType] as $name => $value) {
    echo "Name: $name" . PHP_EOL;
    echo "$filterType: $value" . PHP_EOL;
    echo $line;
}