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
include __DIR__ . "/../views/users/modifyProfile.php"; // Create user view

/* Alias */
use App\Database\Database;
use App\Models\User as UsersModel;
use App\Views\Users\User as ProfileView;
use App\Views\Users\CreateUser as CreateUserView;
use App\Views\Users\ModifyUser as UpdateView;

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
        $dbh = Database::createDBConnection(); // connect to DB
        $user = User::fetchByEmail($dbh); // fetch all car data
        $profile_view = new ProfileView($user); // Create new instance
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
     * Display update user page
     */
	public function renderUpdate()
	{
        $dbh = Database::createDBConnection(); // connect to DB
        $user = User::fetchByEmail($dbh); // fetch all car data
        $update_view = new UpdateView($user); // Create new instance
        $update_view->render(); // Call render method from the Home view
    }

    /**
     * Connect to account - Form
     */
	public function connect() // NEED TO WRITE THE FUNCTION TO LOG IN
	{

	}
	
	/**
     * Sign up as a new user - Form
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
     * Update user data - Form
     */
	public function profile_update() // NEED TO CHECK THIS WORKS
	{
        
        /**
         * Validate data
         */

        /* Check if data is valid */
        $data_validated = true;

        /* Validate email address */
        if (!$id) {
            $data_validated = false; // Insertion impossible as user Id is invalid
        }

        if ($id) {

            /* Create DB connection */
            $dbh = Database::createDBConnection();

            /* Create new object from ContactModel */
            $update_user = new UsersModel($id, $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["password"], $dbh);

            /* Insert into DB */
            $result = $update_user->insert();
        }

        /* Show the home view */
        $profile_view = new ProfileView($result); // Create new instance
        $profile_view->render(); // Call render method from the Home view
    }
}