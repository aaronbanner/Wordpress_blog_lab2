<?php

// Cat.php - Simple model or Blueprint for a class
// croftd: Sept. 23 - added example of static variables to show
// how static shares a variable between all objects of type 'Cat'

class Cat {
    private $name;
    private $registration;

    public static $color = "brown";

    public static $catCounter;

    public function __construct($name, $color) {
        $this->name = $name;
        self::$color = $color;
        self::$catCounter++;
    }

    public function __toString() {
        return "<br>Cat object with name: " . $this->name . ", color is: " . self::$color;
    }

    public function printCatTotal() {
        echo "<br>There are a TOTAL of " . self::$catCounter . " cats in the world";
    }
}

$cat1 = new Cat("Fluffy", "black");

// call a function or method on this object
echo "<br><br>Cat1 variable is: " . $cat1;
$cat1->printCatTotal();

$cat2 = new Cat("MeowMaster", "white");

echo "<br><br>Cat2 variable is: " . $cat2;
$cat1->printCatTotal();

echo "At the end of the script, here is cat1 again: " . $cat1;
