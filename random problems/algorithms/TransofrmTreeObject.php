<?php
$user = [
    'name' => 'xyz',
    'address' => [
        'home' => [
            'city' => 'city1',
            'state' => 'state1'
        ],
        'office' => [
            'city' => 'city2',
            'state' => 'state2'
        ]
    ],
    'phone' => [
        'home' => 1234,
        'office' => 5678
    ]
];

// first decision normal
$output = [];
function solve($obj, $prefix = 'user') {
    foreach ($obj as $key => $value) {
        if (is_array($value)) {
            solve($value, "${prefix}_$key");
        } else {
            $GLOBALS['output']["${prefix}_$key"] = $value;
        }
    }
}
solve($user);
print_r($output);

// second decision with closures use
function transform2($obj) {
    $output = [];
    $solve = function ($obj, $prefix = 'user') use(&$output, &$solve) {
        foreach ($obj as $key => $value) {
            if (is_array($value)) {
                $solve($value, "${prefix}_${key}");
            } else {
                $output["${prefix}_${key}"] = $value;
            }
        }
    };
    $solve($obj);
    return $output;
}
print_r(transform2($user));

// third decision with static
function transform3($obj, $prefix = 'user') {
    static $output = [];
    foreach ($obj as $key => $value) {
        if (is_array($value)) {
            transform3($value, "${prefix}_${key}");
        } else {
            $output["${prefix}_${key}"] = $value;
        }
    }
    return $output;
}
print_r(transform3($user));

// the reverse problem, form output to get user
function buildTree($obj, $separator = '_') {
    $result = [];
    foreach ($obj as $key => $value) {
        $levels = explode($separator, $key);
        $tempBranch = &$result;
        foreach ($levels as $idx => $level) {
            if ($idx === count($levels) - 1) {
                $tempBranch[$level] = $value;
            } else {
                if (!array_key_exists($level, $tempBranch)) {
                    $tempBranch[$level] = [];
                }
                $tempBranch = &$tempBranch[$level];
            }
        }
    }
    return $result;
}

print_r(buildTree($output));