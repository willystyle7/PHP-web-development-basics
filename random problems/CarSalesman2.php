<?php

class Car
{
    /**
     * @var string
     */
    private $model;
    /**
     * @var Engine
     */
    private $engine;
    /**
     * @var string
     */
    private $weight;
    /**
     * @var string
     */
    private $color;

    /**
     * Car constructor.
     * @param string $model
     * @param Engine $engine
     * @param string $weight
     * @param string $color
     */
    public function __construct(string $model, Engine $engine, string $weight, string $color)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @return int
     */
    public function getWeight(): string
    {
        return $this->weight;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }
    public function __toString()
    {
        return "{$this->getModel()}:\n  {$this->getEngine()->getModel()}:\n    Power: {$this->getEngine()->getPower()}\n    Displacement: {$this->getEngine()->getDisplacement()}\n    Efficiency: {$this->getEngine()->getEfficiency()}\n  Weight: {$this->getWeight()}\n  Color: {$this->getColor()}\n";
    }
}

class Engine
{
    /**
     * @var string
     */
    private $model;
    /**
     * @var int
     */
    private $power;
    /**
     * @var string
     */
    private $displacement;
    /**
     * @var string
     */
    private $efficiency;

    /**
     * Engine constructor.
     * @param string $model
     * @param string $power
     * @param string $displacement
     * @param string $efficiency
     */
    public function __construct(string $model, string $power, string $displacement, string $efficiency)
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return int
     */
    public function getPower(): string
    {
        return $this->power;
    }

    /**
     * @return int
     */
    public function getDisplacement(): string
    {
        return $this->displacement;
    }

    /**
     * @return string
     */
    public function getEfficiency(): string
    {
        return $this->efficiency;
    }
}

$n = intval(readline());
$engineList = [];
for ($i = 0; $i < $n; $i++) {
    $engineInfo = explode(" ", readline());
    $model = $engineInfo[0];
    $power = $engineInfo[1];
    if (count($engineInfo) == 4) {
        $displacement = $engineInfo[2];
        $efficiency = $engineInfo[3];
    }
    if (count($engineInfo) == 3) {
        if (ctype_digit($engineInfo[2][0])) {
            $displacement = $engineInfo[2];
            $efficiency = "n/a";
        } elseif (ctype_alpha($engineInfo[2][0])) {
            $displacement = "n/a";
            $efficiency = $engineInfo[2];
        }
    }
    if (count($engineInfo) == 2) {
        $displacement = "n/a";
        $efficiency = "n/a";
    }
    $listEng = new Engine($model, $power, $displacement, $efficiency);
    $engineList[] = $listEng;
}
$m = intval(readline());
$listCar = [];
for ($d = 0; $d < $m; $d++) {
    $carInfo = explode(" ", readline());
    $model = $carInfo[0];
    $engineModel = $carInfo[1];
    $engine = null;
    foreach ($engineList as $item) {
        if ($item->getModel() == $engineModel) {
            $engine = $item;
            break;
        }
    }
    if (count($carInfo) == 4) {
        $weight = $carInfo[2];
        $color = $carInfo[3];
    } elseif (count($carInfo) == 3) {
        if (ctype_digit($carInfo[2][0])) {
            $weight = $carInfo[2];
            $color = "n/a";
        } else {
            $weight = "n/a";
            $color = $carInfo[2];
        }
    } elseif (count($carInfo) == 2) {
        $weight = "n/a";
        $color = "n/a";
    }
    $list = new Car($model, $engine, $weight, $color);
    $listCar[] = $list;
}
foreach ($listCar as $itemCar) {
    echo $itemCar;
}
//print_r($listCar);
