<?php

class Vehicle {
    protected $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function move() 
    {
        return "The $this->type vehicle is moving";
    }
}

class Truck extends Vehicle {

    public function move()
    {
        return "The $this->type truck is speeding";
    }
}

class Bike extends Vehicle {

    public function move()
    {
        return "The $this->type Bike is cycling";
    }
}

$truck = new Truck("b-350");
echo $truck->move() . "\n<br>";

$bike  = new Bike("tricycle");
echo $bike->move();
?>