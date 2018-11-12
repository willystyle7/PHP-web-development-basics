<?php

class StoreBox
{
    private $serialNumber;
    private $itemName;
    private $itemQuantity;
    private $itemPrice;
    private $boxPrice;

    public function __construct($serialNumber, $itemName, $itemQuantity, $itemPrice, $boxPrice)
    {
        $this->serialNumber = $serialNumber;
        $this->itemName = $itemName;
        $this->itemQuantity = $itemQuantity;
        $this->itemPrice = $itemPrice;
        $this->boxPrice = $boxPrice;
    }

    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    public function getItemName()
    {
        return $this->itemName;
    }

    public function getItemQuantity()
    {
        return $this->itemQuantity;
    }

    public function getItemPrice()
    {
        return $this->itemPrice;
    }

    public function getBoxPrice()
    {
        return $this->boxPrice;
    }

}

$storeBoxList = [];

while (true) {
    $input = readline();
    if ($input == "end") {break;}
    $inputArr = explode(" ", $input);

    $serialNumber = $inputArr[0];
    $itemName = $inputArr[1];
    $itemQuantity = $inputArr[2];
    $itemPrice = $inputArr[3];
    $boxPrice = $itemQuantity * $itemPrice;

    $storeBox = new StoreBox($serialNumber, $itemName, $itemQuantity, $itemPrice, $boxPrice);
    $storeBoxList[] = $storeBox;
}

//var_dump($storeBoxList);

usort($storeBoxList, function ($a, $b) {return ($b->getboxPrice() - $a->getboxPrice());});

foreach ($storeBoxList as $storeBoxItem) {
    echo $storeBoxItem->getSerialNumber() . PHP_EOL;
    echo "-- " . $storeBoxItem->getItemName() . " - $" . number_format($storeBoxItem->getItemPrice(), 2, ".", "") . ": " . $storeBoxItem->getItemQuantity() . PHP_EOL;
    echo "-- $" . number_format($storeBoxItem->getboxPrice(), 2, ".", "") . PHP_EOL;
}