<?php

// Define the Car class
class Car {
    // Properties
    public $make;
    public $model;
    public $year;

    public function __construct($make, $model, $year)
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // Method to print car details
    public function printDetails() {
        echo "Car Details: Make - $this->make , Model - $this->model , Year - $this->year <br>";
    }
}

// Instantiate a few Car objects
$car1 = new Car("Toyota", "Corolla", 2020);

$car2 = new Car("Honda", "Civic", 2019);

$car3 = new Car("Ford", "Mustang", 2021);

// Print the details of each car
$car1->printDetails();
$car2->printDetails();
$car3->printDetails();

?>
