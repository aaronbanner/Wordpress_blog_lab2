<?php

// croftd: since we registered an __autoload we shouldn't need to require these
//require_once "Paras.php";
//require_once "Pikachu.php";
//require_once "Bulbasaur.php";
//require_once "Pidgey.php";

/**
 * Main class for our Pokemon program that stores:
 *
 * A List of Wild Pokemon
 * A Single Trainer (who has a list of Pokemons on a Pokedex)
 *
 * Note this is a Singleton and there should only every be one World object.
 */
class World
{
    static $instance;

    private $trainer; // Trainer
    private $message = "";
    private $wildPokemon = array(); // Array to store WildPokemon

    /**
     * @return World object - this is a Singleton.
     * Note with languages such as PHP that load everything on each request
     * Singleton not as important...
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new World();
        }
        return self::$instance;
    }

    /**
     * Used to reset the World (reset to null), for use with SESSION management (see getPokemon.php)
     */
    public static function reset()
    {
        self::$instance == null;
    }

    private function __construct()
    {
        //$this->trainer = new Trainer('Dave', 'trainer.png', 49.159706, -123.907757);
    }

    // Also required for Singleton
    private function __clone()
    {
    }

    /**
     * @return array of the Wild Pokemon in the world.
     */
    public function getWildPokemon() {
        return $this->wildPokemon;
    }

    /**
     * @return array of the Trainer's pokemon
     */
    public function getTrainersPokemon() {
        return $this->trainer->getPokemon();
    }

    /**
     *
     */
    public function removePokemon(Pokemon $pokemon)
    {
    }

    /**
     * Call this method before battle or getJSON to load the wild and trainer pokemon into the World
     */
    public function load()
    {
	// croftd: TODO
    }

    /**
     * When called, this function will find the nearest wild Pokemon, move the Trainer and his Pokemon to this
     * location, and attack. See the image created by @matthewt for the flow chart (in the REW301_code repo)
     */
    public function battle() {

        $this->addMessage("Battling... ");

        // Does nothing yet...
    }

    /**
     * Helper function to calculate distance between two points
     *
     * @param $lat1 - first lat coord
     * @param $lon1 - first long coord
     * @param $lat2 - second lat coord
     * @param $lon2 - second long coord
     * @return float - distance in kilometers between the two coords
     */
    function distance($lat1, $lon1, $lat2, $lon2) {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));

        $dist = acos($dist);
        $dist = rad2deg($dist);

        $miles = $dist * 60 * 1.1515;

        // return value in kilometers – or maybe we want meters precision?
        return $miles *1.609344;
    }

    /**
     * @param $message - Add a String message to send back with the next call to getJSON()
     */
    public function addMessage($message)
    {
        $this->message = $this->message . ", " . $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function clearMessage()
    {
        // reset the messeage that is sent with JSON back to blank
        $this->message = "";
    }

    /**
     * @return string - a valid JSON String containing a list of all the Trainer and Pokemon Google Map markers.
     *
     * The format should look like:
     *
     * <pre>
     *
     *{"markers": [{"lat":  49.159720,"long":  -123.907773,"name": "Paras","image": "paras.jpg" },{"lat":  49.171154,"long":  -123.971443
     * ,"name": "Pidgey","image": "pidgey.jpg" },{"lat":  49.152864,"long":  -123.94873
     * ,"name": "Paras","image": "paras.jpg" },{"lat":  49.1350026,"long":  -123.9220046
     * ,"name": "Paras","image": "paras.jpg" },{"lat":  49.178561,"long":  -123.857631
     * ,"name": "Bulbasaur","image": "bulbasaur.jpg" },{"lat":  49.162736,"long":  -123.892478
     * ,"name": "Bulbasaur","image": "bulbasaur.jpg" },{"lat":  49.1790103,"long":  -123.9199447
     * ,"name": "Pidgey","image": "pidgey.jpg" },{"lat":  49.1675630,"long":  -123.9383125,"name": "Pidgey","image": "pidgey.jpg" } ],
     * "message": "BattleCount[9] Server Messages: Trainer starting with pokemon index"}
     *
     * </pre>
     */
    public function getJSON()
    {

        // croftd: This is just an example to make the initial map and getPokemon.php
        // talk to each other
        // To complete the lab you will have to loop through all the wild pokemon
        // and all the trainer's pokemon and add build a JSON string to return

        $jsonToReturn = '{"markers": [{"lat":  49.159720,"long":  -123.907773,"name": "Paras","image": "paras.png" },{"lat":  49.171154,"long":  -123.971443
    ,"name": "Pidgey","image": "pidgey.png" },{"lat":  49.152864,"long":  -123.94873
    ,"name": "Paras","image": "paras.png" },{"lat":  49.1350026,"long":  -123.9220046
    ,"name": "Paras","image": "paras.png" },{"lat":  49.178561,"long":  -123.857631
    ,"name": "Bulbasaur","image": "bulbasaur.png" },{"lat":  49.162736,"long":  -123.892478
    ,"name": "Bulbasaur","image": "bulbasaur.png" },{"lat":  49.1790103,"long":  -123.9199447
    ,"name": "Pidgey","image": "pidgey.png" },{"lat":  49.1675630,"long":  -123.9383125,"name": "Pidgey","image": "pidgey.png" } ],
    "message": "BattleCount[0] <br>Server Messages: This is just test data!"}';
    
        return $jsonToReturn;
    }

    /**
     * Function to load Pokemon objects from a csv file
     *
     * @param $filename
     * @return array containing Pokemon objects
     */
    public function loadPokemon($filename)
    {
        // croftd: currently does nothing
        return null;

    }
}
