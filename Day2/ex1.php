<?php
class Pet {
    public $name;

    function __construct($pet_name) {
        $this->name = $pet_name;
    }

    function eat() {
        echo "$this->name is eating.<br>";
    }

    function play() {
        echo "$this->name is playing.<br>";
    }
}

class Cat extends Pet {
    protected $age;

    function __construct(string $pet_name, int $age = 0) {
        parent::__construct($pet_name);
        $this->age = $age;
    }

    function play() {
        parent::play();
        echo "$this->name is climbing";
        if ($this->age > 0) {
            echo " and it's $this->age year(s) old.";
        }
        echo "<br>";
    }

    function sleep() {
        echo "$this->name is sleeping.<br>";
    }

    function eat_play() {
        $this->eat();
        $this->play();
    }
}

class Dog extends Pet {
    function play() {
        echo "$this->name is fetching.<br>";
    }
}
$dog = new Dog('Leo');
$cat = new Cat('Luna', 5);
$pet = new Pet('Bella');

$dog->eat(); 
$cat->eat();
$pet->eat(); 

$dog->play(); 
$cat->play(); 
$pet->play(); 

$cat->sleep();

$cat->eat_play(); 

?>
