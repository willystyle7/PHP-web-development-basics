<?php

class Car
{
    private $model;
    private $engine;
    private $weight;
    private $color;

    public function __construct(string $model, Engine $engine, string $weight, string $color)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getEngine(): Engine
    {
        return $this->engine;
    }

    public function getWeight(): string
    {
        return $this->weight;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function __toString(): string
    {
        $output = "";
        $output .= $this->model . ":\n";
        $output .= "  " . $this->engine->getModel() . ":\n";
        $output .= "    Power: " . $this->engine->getPower() . "\n";
        $output .= "    Displacement: " . $this->engine->getDisplacement() . "\n";
        $output .= "    Efficiency: " . $this->engine->getEfficiency() . "\n";
        $output .= "  Weight: " . $this->weight . "\n";
        $output .= "  Color: " . $this->color . "\n";
        return $output;
    }
}

class Engine
{
    private $model;
    private $power;
    private $displacement;
    private $efficiency;

    public function __construct(string $model, string $power, string $displacement, string $efficiency)
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getPower(): string
    {
        return $this->power;
    }

    public function getDisplacement(): string
    {
        return $this->displacement;
    }

    public function getEfficiency(): string
    {
        return $this->efficiency;
    }
}

$carList = [];
$engineList = [];
$n = intval(readline());
while ($n-- > 0) {
    $input = explode(" ", readline());
    $model = $input[0];
    $power = $input[1];
    if (count($input) == 2) {
        $displacement = "n/a";
        $efficency = "n/a";
    } else if (count($input) == 3) {
        if (is_numeric($input[2])) {
            $displacement = $input[2];
            $efficency = "n/a";
        } else {
            $displacement = "n/a";
            $efficency = $input[2];
        }
    } else if (count($input) == 4) {
        $displacement = $input[2];
        $efficency = $input[3];
    }
    $engine = new Engine($model, $power, $displacement, $efficency);
    $engineList[$model] = $engine;
}
$m = intval(readline());
while ($m-- > 0) {
    $input = explode(" ", readline());
    $model = $input[0];
    $engineName = $input[1];
    if (count($input) == 2) {
        $weight = "n/a";
        $color = "n/a";
    } else if (count($input) == 3) {
        if (is_numeric($input[2])) {
            $weight = $input[2];
            $color = "n/a";
        } else {
            $weight = "n/a";
            $color = $input[2];
        }
    } else if (count($input) == 4) {
        $weight = $input[2];
        $color = $input[3];
    }
    if (key_exists($engineName, $engineList)) {
        $currentEngine = $engineList[$engineName];
    }
    $carsCurrent = new Car($model, $currentEngine, $weight, $color);
    $carList[] = $carsCurrent;
}

foreach ($carList as $car) {
    // var_dump($car);
    echo $car->__toString();
}