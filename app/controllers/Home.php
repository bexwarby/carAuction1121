<?php

/**
 * controllers/Home.php - Home Controller
 * Groups together all methods on the home page
 */

/* Namespace */
namespace App\Controllers;

/* Imports */
include_once __DIR__ . "/../core/Database.class.php"; // Connection to the database
include_once __DIR__ . "/../models/Contact.php"; // Contact model
include __DIR__ . "/../views/home.php"; // Home view
include __DIR__ . "/../views/legal.php"; // Legal view

/* Alias */
use App\Views\Home as HomeView;
use App\Views\Legal as Legal;
use App\Models\Contact as ContactModel;
use App\Database\Database;

/**
 * Home Controller
 */
class Home
{

    /**
     * Display home page
     */
    public function render()
    {
        $home_view = new HomeView(null); // Create new instance
        $home_view->render(); // Call render method from the Home view
    }

    /**
     * Display legal details page
     */
    public function legal()
    {
        $legal_view = new Legal(); // Create new instance
        $legal_view->render(); // Call render method from the Legal view
    }

    /**
     * Contact Form on home page
     */
    public function process_contact_form()
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
            $contact = new ContactModel(null, $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["phone"], $_POST["message"], $dbh);

            /* Insert into DB */
            $result = $contact->insert();
        }

        /* Show the home view */
        $home_view = new HomeView($result); // Create new instance
        $home_view->render(); // Call render method from the Home view
    }
}
