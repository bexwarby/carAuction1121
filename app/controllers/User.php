<?php 

/**
 * controllers/User.php - User Controller
 * Groups together all User methods for the profile
 */

/* Namespace */
namespace App\Controllers;

/* Imports */
include_once __DIR__ . "/../core/Database.class.php"; // Connection to the database
include_once __DIR__ . "/../models/Users.php"; // User model
include __DIR__ . "/../views/users/user.php"; // User view - general profile page
include __DIR__ . "/../views/users/createUser.php"; // Create user view

/* Alias */
use App\Views\Users\Create as CreateUserView;
use App\Views\Users\User as ProfileView;
use App\Models\Users as UsersModel;
use App\Database\Database;

/**
 * User Controller
 */
class User
{
    /**
     * Display general profile page
     */
	public function renderProfile()
	{
        $profile_view = new ProfileView(); // Create new instance
        $profile_view->render(); // Call render method from the Home view
    }

	/**
     * Display create user page
     */
	public function renderCreate()
	{
        $create_view = new CreateUserView(); // Create new instance
        $create_view->render(); // Call render method from the Home view
    }

    /**
     * Connect to account
     */
	public function connect()
	{
        // NEED TO WRITE THE FUNCTION

	}
	
	/**
     * Sign up as a new user
     */
	public function create_user()
	{
        /**
         * Validate data
         */

        /* Check if data is valid */
        $data_validated = true;

        /* Validate email address */
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $data_validated = false; // Insertion impossible as email is invalid
        }

        if ($data_validated) {

            /* Create DB connection */
            $dbh = Database::createDBConnection();

            /* Create new object from ContactModel */
            $new_user = new UsersModel(null, $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["password"], $dbh);

            /* Insert into DB */
            $result = $new_user->insert();
        }

        /* Show the home view */
        $profile_view = new ProfileView($result); // Create new instance
        $profile_view->render(); // Call render method from the Home view
    }
	
	/**
     * Update user data
     */
	public function profile_update()
	{
        // NEED TO WRITE THE FUNCTION
	}
}