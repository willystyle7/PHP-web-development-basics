<?php

class Car
{
    private $model;
    private $fuelAmount; //налично гориво
    private $fuelCostOneKilometer;
    private $distanceTraveled; //пропътувани км

    public function __construct(
        string $model,
        float $fuelAmount,
        float $fuelCostOneKilometer
    ) {
        $this->model = $model;
        $this->fuelAmount = $fuelAmount;
        $this->fuelCostOneKilometer = $fuelCostOneKilometer;
        $this->distanceTraveled = 0;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getFuelAmount(): float
    {
        return $this->fuelAmount;
    }

    public function getDistanceTraveled(): float
    {
        return $this->distanceTraveled;
    }

    public function Drive($amountOfKm) :void
    {
        if ($this->fuelAmount >= $amountOfKm * $this->fuelCostOneKilometer) {
            $this->fuelAmount = round($this->fuelAmount - $amountOfKm * $this->fuelCostOneKilometer, 2);
            $this->distanceTraveled = $this->distanceTraveled + $amountOfKm;
        } else {
            echo "Insufficient fuel for the drive" . PHP_EOL;
        }
    }
}

$n = intval(readline());
$cars = [];
for ($i = 0; $i < $n; $i++) {
    $input = explode(" ", readline());
    $model = $input[0];
    $fuelAmount = $input[1];
    $fuelCostOneKilometer = $input[2];
    $car = new Car($model, $fuelAmount, $fuelCostOneKilometer);
    array_push($cars, $car);
    // $cars[] = $car;
}
$input = readline();

while ($input != "End") {
    $input = explode(" ", $input);
    $carModel = $input[1];
    $amountOfKm = $input[2];
    for ($i = 0; $i < count($cars); $i++) {
        $currentCar = $cars[$i];
        if ($carModel === $currentCar->getModel()) {
            $currentCar->Drive($amountOfKm);
            break;
        }
    }
    $input = readline();
}
foreach ($cars as $car) {
    echo $car->getModel() . " " . number_format($car->getFuelAmount(), 2, ".", "") . " " . $car->getDistanceTraveled() . PHP_EOL;
}
