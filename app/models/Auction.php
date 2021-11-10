<?php 

/**
 * models/Auction.php - Auction details model
 * Model for the Auction Bidding table in the DB
 */

/* Namespace */
namespace App\Models;

/* Alias */
use PDO;

/**
 * Car list / details model
 */
class Bid
{
    /* Variables */
    protected $id;
    protected $userId;
    protected $currentPrice;
    // Allows manipulation of database:
    protected $dbh;

    // GET METHODS
    public function getPrice() { return $this->currentPrice; }

    // SET METHODS
    public function setPrice(int $currentPrice)
    {
        $this->currentPrice = $currentPrice;
    }

    /**
     * Constructor
     */
    public function __construct($id, $userId, $currentPrice, $dbh) {
        
        /* Sanitise the data */
        $this->id = $id;
        $this->userId = $userId;
        $this->currentPrice = filter_var($currentPrice, FILTER_SANITIZE_NUMBER_INT);
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
        $query = $this->dbh->prepare("INSERT INTO auction_management (currentPrice) VALUES (?)");
        return $query->execute([
            $this->currentPrice, 
        ]);
    }

    /**
     * Get the latest bid
     */
    public static function getBid($id, $dbh)
    {
        // Sanitise car price
        $currentPrice = filter_var($currentPrice, FILTER_SANITIZE_NUMBER_INT);
        // Prepare the DB and execute the query
        $query = $dbh->prepare("SELECT * FROM auction_management WHERE currentPrice = ?");
        $results = $query->execute([$currentPrice])->fetchAll(PDO::FETCH_ASSOC);
        
        // IN CARLIST, NEED TO ADD BID TO THE LOOP
        // JOINT DATA TO DISPLAY CURRENT BID WITH OTHER DETAILS

        }

        return $cars;
    }
}