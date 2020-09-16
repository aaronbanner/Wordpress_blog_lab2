<?php

echo "<br>Here are the Pokemon class examples from Sept. 16, 2020";

// for development, we want to make sure we see all the errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Example of create a classs that we will contain (HAS-A) within each Pokemon
// NOTE: For lab1 you don't need the Superpower class, it was just an example
// from the lecture
class Superpower {

    private $description;
    private $damage;

    public function __construct($desc, $damage) {
        $this->description = $desc;
        $this->damage = $damage;
    }

    // this is a special function to print out the content of the object
    public function __toString() {
        return "Superpower: " . $this->description . " Damage: " . $this->damage;
    }
}

/**
 * Abstract class to model and store everything that the Pokemon have in common
 */
abstract class Pokemon {

    protected $name;
    protected $weight;
    protected $superpower;

    // example of static variable - this belongs to the class and will be shared
    // between all Pokemon objects (all instances)
    private static $count;
    // example of a regular variable, that is unique for each object
    private $count2;

    /**
     * Constructor for Pokemon - currenlty only has 2 parameters
     * See the lab1/README_Week1.md directions - you'll need to include all the
     * other parameters and fields for your Pokemon class definition
     */
    public function __construct($name, $weight) {
        $this->name = $name;
        $this->weight = $weight;
        self::$count++;
        $this->count2++;

        echo "<br>Created a new Pokemon, total count is: " . self::$count . " and count2 is: " . $this->count2;
        
    }

    /**
     * Base class attack - we will override this in Bulbasaur, Pikachu etc.
     */
    public function attack() {
        echo "Pokemon attacking";
    }


}

// Bulbasaur IS-A Pokemon
class Bulbasaur extends Pokemon {

    // Your class will have additional parameters, but note how Bulbasaur only
    // takes one parameter for name, and we call the parent constructor and 
    // pass it two parameters (name and weight)
    // See the directions for lab1 - you'll need some parameters for Bulbasaur
    // and pass the correct ones up to the Pokemon parent class
    public function __construct($name) {
        // call Pokemon constructor and pass two variables
        // by doing this we are saying all Bulbasaur have weight of 50
        parent::__construct($name, 50);
        
        // Bulbasaur HAS-A Superpower
        $this->superpower = new Superpower("<br>Bulbasaur super power", 50);
    }

    // this will enable Bulbasaur to attack differently than our other classes
    public function attack() {
        echo "<br>Bulbasaur attacking with " . $this->superpower;
    }
}

class Pikachu extends Pokemon {

    public function __construct() {

    }

    public function attack() {
        echo "<br>Pikachu attacking";
    }
}

// This script was just examples from lecture - see README_Week1.md
// Create three objects just to test our classes

$bulb1 = new Bulbasaur("Bulb1");

// polymorphism
$bulb1->attack();

$bulb2 = new Bulbasaur("Bulb2");

// polymorphism
$bulb2->attack();

$bulb3 = new Bulbasaur("Bulb3");

