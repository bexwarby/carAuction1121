<?php

/**
 * controllers/NotFound.php - Controler NotFound
 * Unique method called if no other route found.
 * Displays page with 404 error.
 */

/* Namespace */
namespace App\Controllers;

/* Imports */
include_once __DIR__ . "/../views/NotFound.php";

/* Alias */
use App\Views\NotFound as NotFoundView;

/**
 * NotFound Controller
 */
class NotFound
{
    /**
     * Display page by default
     */
    public function render()
    {
        http_response_code(404); // create 404 response
        $not_found_view = new NotFoundView(null); // create instance
        $not_found_view->render(); // call the render method
    }
}
