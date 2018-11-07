<?php

$sofuniCourses = [];
$input = "";

while (true) {
    $input = readline();
    if ($input == "end") {break;}
    $inputArr = explode(" : ", $input);
    $courseName = trim($inputArr[0]);
    $studentName = trim($inputArr[1]);

    if (!key_exists($courseName, $sofuniCourses)) {
        $sofuniCourses[$courseName] = [];
    }
    $sofuniCourses[$courseName][] = $studentName;

}

uasort($sofuniCourses, function ($a, $b) {return (count($b) - count($a));});

foreach ($sofuniCourses as $courses => $course) {

    echo $courses . ": " . count($course) . PHP_EOL;
    asort($course);

    foreach ($course as $student) {
        echo "-- " . $student . PHP_EOL;
    }

}
