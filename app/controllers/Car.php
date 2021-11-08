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
        $list_view = new CarsView(); // Create new instance
        $list_view->render(); // Call render method from the Cars view
    }

	/**
     * Display single car detail page
     */
	public function renderSingle()
	{
        $single_car_view = new SingleCarView(); // Create new instance
        $single_car_view->render(); // Call render method from the Cars view
    }

    /**
     * Display single car detail page
     */
	public function renderAuction()
	{
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

            /* Insert into DB */
            $result = $new_car->insert();
        }

        /* Show the home view */
        $home_view = new HomeView($result); // Create new instance
        $home_view->render(); // Call render method from the Home view
    }
}