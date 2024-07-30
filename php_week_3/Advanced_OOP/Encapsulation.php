<?php

// Define the Car class
class Car2 {
    // Properties
    private $make;
    private $model;
    private $year;

    // Method to set the make
    public function setMake($make) {
        $this->make = $make;
    }

    // Method to get the make
    public function getMake() {
        return $this->make;
    }

    // Method to set the model
    public function setModel($model) {
        $this->model = $model;
    }

    // Method to get the model
    public function getModel() {
        return $this->model;
    }

    // Method to set the year
    public function setYear($year) {
        $this->year = $year;
    }

    // Method to get the year
    public function getYear() {
        return $this->year;
    }

    // Method to print car details
    public function printDetails() {
        echo "Car Details: Make - " . $this->getMake() . ", Model - " . $this->getModel() . ", Year - " . $this->getYear() . "<br>";
    }
}

// Instantiate a few Car objects
$car1 = new Car2();
$car1->setMake("Toyota");
$car1->setModel("Corolla");
$car1->setYear(2020);

$car2 = new Car2();
$car2->setMake("Honda");
$car2->setModel("Civic");
$car2->setYear(2019);

$car3 = new Car2();
$car3->setMake("Ford");
$car3->setModel("Mustang");
$car3->setYear(2021);

// Print the details of each car
$car1->printDetails();
$car2->printDetails();
$car3->printDetails();

?>
