<?php 

/**
 * controllers/Car.php - Car Controller
 * Methods regarding auction cars
 */

/* Namespace */
namespace App\Controllers;

/* Imports */
include_once __DIR__ . "/../core/Database.class.php"; // Connection to the database
include_once __DIR__ . "/../models/CarList.php"; // Cars model
include __DIR__ . "/../views/cars/cars.php"; // Car list view
include __DIR__ . "/../views/cars/carDetails.php"; // Single car details view
include __DIR__ . "/../views/cars/addAuction.php"; // Add new car view

/* Alias */
use App\Views\Cars\Cars as CarsView;
use App\Views\Cars\SingleCar as SingleCarView;
use App\Views\Cars\Auction as AuctionView;
use App\Models\CarList;
use App\Database\Database;

/**
 * Car Controller
 */
class Car
{
    /**
     * Display cars list page
     */
	public function renderList()
	{
        $dbh = Database::createDBConnection(); // connect to DB
        $posts = CarList::fetchAllCars($dbh); // fetch all car data
        $list_view = new CarsView($posts); // Create new instance
        $list_view->render(); // Call render method from the Cars view
    }

	/**
     * Display single car detail page
     */
	public function renderSingle()
	{
        $dbh = Database::createDBConnection(); // connect to DB
        $posts = CarList::fetchById($dbh); // fetch all car data
        $single_car_view = new SingleCarView($posts); // Create new instance
        $single_car_view->render(); // Call render method from the Cars view
    }

    /**
     * Display single car detail page
     */
	public function renderAuction()
	{
        $dbh = Database::createDBConnection(); // connect to DB
        // DO WE NEED TO FETCH DATA HERE??
        
        $auction_car_view = new AuctionView(); // Create new instance
        $auction_car_view->render(); // Call render method from the Cars view
    }

	/**
     * New auction car form
     */
	public function process_new_car()
	{
        /**
         * Validate data
         */

        /* Check if data is valid */
        $data_validated = true;

        /* Validate email address */
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $data_validated = false; // Insertion impossible as email is invalid
			// user must be signed in to post a car for auction
            echo "Please sign in to continue";
        }

        if ($data_validated) {

            /* Create DB connection */
            $dbh = Database::createDBConnection();

            /* Create new object from CarList model */
            $new_car = new CarList(
				null, 
				$_POST["model"], 
				$_POST["make"], 
				$_POST["power"], 
				$_POST["year"], 
				$_POST["startDate"], 
				$_POST["endDate"], 
				$_POST["description"], 
				$_POST["seller"], 
				$_POST["startingPrice"], 
				$dbh
			);
            var_dump($new_car);

            /* Insert into DB */
            $result = $new_car->insert();
        }

        /* Show the cars view */
        $cars_view = new Cars($result); // Create new instance
        $cars_view->render(); // Call render method from the Home view
    }

    /**
     * New car bid form
     */
	public function add_bid()
	{
        /**
         * Validate data
         */

        /* Check if data is valid */
        $data_validated = true;

        /* Validate email address */
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $data_validated = false; // Insertion impossible as email is invalid
			// user must be signed in to bid
            echo "Please sign in to continue";
        }

        if ($data_validated) {

            /* Create DB connection */
            $dbh = Database::createDBConnection();

            /* Create new object from CarList model */
            $new_bid = new Bid(
				$_POST["currentPrice"], 
				$dbh
			);
            var_dump($new_bid);

            /* Insert into DB */
            $result = $new_bid->insert();
        }

        /* Show the home view */
        $single_car_view = new SingleCar($result); // Create new instance
        $single_car_view->render(); // Call render method from the Home view
    }
}