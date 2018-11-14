<?php

class Student
{
    public $comments = [];
    public $dates = [];
    public $name;

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * @param array $comments
     */
    public function setComments($comments): void
    {
        array_push($this->comments, $comments);
    }

    /**
     * @return array
     */
    public function getDates(): array
    {
        return $this->dates;
    }

    /**
     * @param array $dates
     */
    public function setDates($dates): void
    {
        array_push($this->dates, $dates);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }
}

/**
 * @param $data
 * @param $user
 * @return bool
 */
function userExist($data, $user)
{
    foreach ($data as $val) {
        if ($val->getName() == $user) {
            return true;
        }
    }

    return false;
}

$students = [];
while (($input = trim(readline())) != "end of dates") {
    $tempStudent = new Student();
    $tokens = explode(" ", $input);
    $name = $tokens[0];
    $tempStudent->setName($name);
    $tempStudent->dates = [];
    $tempStudent->comments = [];
    if (count($tokens) > 1) {
        $tokens = explode(",", $tokens[1]);
        for ($i = 0; $i < count($tokens); $i++) {
            $tempStudent->dates[] = date_create_from_format('d/m/Y', $tokens[$i]);
            //$tempStudent->dates[] = strtotime($tokens[$i]);
            //$tempStudent->dates[] = str_replace('/', '-', $tokens[$i]);
        }
    }
    if (!userExist($students, $name)) {
        array_push($students, $tempStudent);
    } else {
        if (count($tempStudent->dates) > 0) {
            foreach ($students as $student) {
                if ($name == $student->name) {
                    for ($i = 0; $i < count($tokens); $i++) {
                        $student->dates[] = date_create_from_format('d/m/Y', $tokens[$i]);
                        //$student->dates[] =  strtotime($tokens[$i]);
                        //$student->dates[] = str_replace('/', '-', $tokens[$i]);
                    }

                }
            }
        }
    }
}
while (($input = trim(readline())) != "end of comments") {
    $tokens = explode("-", $input);
    $name = $tokens[0];
    $comment = $tokens[1];
    foreach ($students as $student) {
        if ($name == $student->name) {
            $student->comments[] = $comment;
        }
    }
}
usort(
/**
 * @param $a
 * @param $b
 * @return int
 */
    $students,
    function ($a, $b) {
        return $a->name <=> $b->name;
    }
);

// function date_sort($a, $b)
// {
//     return strtotime($a) - strtotime($b);
// }

foreach ($students as $output) {
    echo $output->name . PHP_EOL;
    echo "Comments:" . PHP_EOL;
    if (count($output->comments) > 0) {
        foreach ($output->comments as $comment) {
            echo "- $comment" . PHP_EOL;
        }
    }
    echo "Dates attended:" . PHP_EOL;
    if (count($output->dates) > 0) {
        //usort($output->dates, "date_sort");
        sort($output->dates);
        foreach ($output->dates as $date) {
            $dateStr = date_format($date, 'd/m/Y');
            //$dateStr = date('d/m/Y', $date);
            //$dateStr = str_replace('-', '/', $date);
            echo "-- $dateStr" . PHP_EOL;
        }
    }
}

//var_dump ($students);
