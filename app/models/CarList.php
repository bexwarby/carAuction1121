<?php 

/**
 * models/CarList.php - Car details model
 * Model for the Car table in the DB
 */

/* Namespace */
namespace App\Models;

/* Alias */
use PDO;

/**
 * Car list / details model
 */
class Car
{
    /* Variables */
    protected $id;
    protected $model;
    protected $make;
    protected $power;
    protected $year;
    protected $startDate;
    protected $endDate;
    protected $description;
    protected $seller;
    protected $startingPrice;
    protected $winner;
    // Allows manipulation of database:
    protected $dbh;

    // GET METHODS
    public function getModel() { return $this->model; }
    public function getMake() { return $this->make; }
    public function getPower() { return $this->power; }
    public function getYear() { return $this->year; }
    public function getStartDate() { return $this->startDate; }
    public function getEndDate() { return $this->endDate; }
    public function getDescription() { return $this->description; }
    public function getSeller() { return $this->seller; }
    public function getStartingPrice() { return $this->startingPrice; }
    public function getWinner() { return $this->winner; }

    // SET METHODS
    public function setModel(string $model)
    {
        $this->model = $model;
    }

    public function setMake(string $make)
    {
        $this->make = $make;
    }

    public function setPower(string $power)
    {
        $this->power = $power;
    }

    public function setYear(string $year)
    {
        $this->year = $year;
    }

    public function setStartDate(string $startDate)
    {
        $this->startDate = $startDate;
    }

    public function setEndDate(string $endDate)
    {
        $this->endDate = $endDate;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function setSeller(string $seller)
    {
        $this->seller = $seller;
    }

    public function setStartingPrice(string $startingPrice)
    {
        $this->startingPrice = $startingPrice;
    }

    public function setWinner(string $winner)
    {
        $this->winner = $winner;
    }

    /**
     * Constructor
     */
    public function __construct($id, $model, $make, $power, $year, $startDate, $endDate, $description, $seller, $startingPrice, $dbh) {
        
        /* Sanitise the data */
        $this->id = $id;
        $this->model = filter_var($model, FILTER_SANITIZE_STRING);
        $this->make = filter_var($make, FILTER_SANITIZE_STRING);
        $this->power = filter_var($power, FILTER_SANITIZE_STRING);
        $this->year = filter_var($year, FILTER_SANITIZE_STRING);
        $this->startDate = filter_var($startDate, FILTER_SANITIZE_STRING);
        $this->endDate = filter_var($endDate, FILTER_SANITIZE_STRING);
        $this->description = filter_var($description, FILTER_SANITIZE_STRING);
        $this->seller = filter_var($seller, FILTER_SANITIZE_STRING);
        $this->startingPrice = filter_var($startingPrice, FILTER_SANITIZE_STRING);
        $this->dbh = $dbh;

    }  

    /**
     * Get
     */
    public function __get($property)
    {
        if ($property !== "dbh") {
            return $this->$property;
        }
    }

    /**
     * Set
     */
    public function __set($property, $value)
    {
        if ($property !== "dbh") {
            $this->$property = $value;
        }
    }

    /**
     * Insertion into DB
     */
    public function insert()
    {
        $query = $this->dbh->prepare("INSERT INTO car (model, make, power, year, startDate, endDate, description, seller, startingPrice) VALUES (?,?,?,?,?,?,?,?,?)");
        return $query->execute([
            $this->model, 
            $this->make, 
            $this->power, 
            $this->year, 
            $this->startDate, 
            $this->endDate, 
            $this->description, 
            $this->seller, 
            $this->startingPrice
        ]);
    }

    /**
     * Get the car data by id
     */
    public static function fetchById($id, $dbh)
    {
        // Sanitise car ID
        $id = filter_var($id, FILTER_SANITIZE_STRING);
        // Prepare the DB and execute the query
        $query = $dbh->prepare("SELECT * FROM car WHERE id = ?");
        $results = $query->execute([$id])->fetchAll(PDO::FETCH_ASSOC);
        // create cars array
        $cars = [];
        // loop through all cars in DB to push them into cars[]
        foreach ($results as $result) {
            array_push(
                $cars, 
                new Car(
                    $result["id"], 
                    $result["model"], 
                    $result["make"], 
                    $result["power"], 
                    $result["year"], 
                    $result["startDate"], 
                    $result["endDate"], 
                    $result["description"], 
                    $result["seller"], 
                    $result["startingPrice"], 
                    $result["winner"], 
                    $dbh
                )
            );
        }

        return $cars;
    }
}