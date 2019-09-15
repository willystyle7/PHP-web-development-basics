<?php

class Car
{
    private $model;
    private $fuelAmount;
    private $fuelCostForKilometer;
    private $distance;
    /**
     * Car constructor.
     * @param $model
     * @param $fuelAmount
     * @param $fuelCostForKilometer
     * @param $distance
     */
    public function __construct(string $model, float $fuelAmount, float $fuelCostForKilometer, $distance = 0)
    {
        $this->setModel($model);
        $this->setFuelAmount($fuelAmount);
        $this->setFuelCostForKilometer($fuelCostForKilometer);
        $this->setDistance();
    }
    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }
    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }
    /**
     * @return float
     */
    public function getFuelAmount(): float
    {
        return $this->fuelAmount;
    }
    /**
     * @param float $fuelAmount
     */
    public function setFuelAmount(float $fuelAmount): void
    {
        $this->fuelAmount = $fuelAmount;
    }
    /**
     * @return float
     */
    public function getFuelCostForKilometer(): float
    {
        return $this->fuelCostForKilometer;
    }
    /**
     * @param float $fuelCostForKilometer
     */
    public function setFuelCostForKilometer(float $fuelCostForKilometer): void
    {
        $this->fuelCostForKilometer = $fuelCostForKilometer;
    }
    /**
     * @return float
     */
    public function getDistance(): float
    {
        return $this->distance;
    }
    /**
     * @param float $distance
     */
    public function setDistance($distance = 0): void
    {
        $this->distance = $distance;
    }
    public function driveCar(float $driveDistance): bool
    {
        if ($this->getFuelCostForKilometer() * $driveDistance <= $this->getFuelAmount()) {
            // $this->setFuelAmount($this->getFuelAmount() - $this->getFuelCostForKilometer() * $driveDistance);
            $this->setFuelAmount(round($this->getFuelAmount() - $this->getFuelCostForKilometer() * $driveDistance), 2);
            $this->setDistance($this->getDistance() + $driveDistance);
            return true;
        }
        return false;
    }
    public function __toString(): string
    {
        $fuel = number_format($this->getFuelAmount(), 2, ".", "");
        return "{$this->getModel()} {$fuel} {$this->getDistance()}" . PHP_EOL;
    }
}

$n = intval(readline());
// require "Car.php";
$cars = [];
for($i = 0; $i < $n; $i++){
    list($model, $fuelAmount, $fuelCostForKilometer) = explode(" ", readline());
    $currentCar = new Car($model, $fuelAmount, $fuelCostForKilometer);
    $cars[$model] = $currentCar;
}
while(($input = readline()) != "End"){
    list($instruction, $carModel, $driveDistance) = explode(" ", $input);
    $result = $cars[$carModel]->driveCar($driveDistance);
    if(!$result){
        echo "Insufficient fuel for the drive" . PHP_EOL;
    }
}
foreach ($cars as $car){
    echo $car;
}
