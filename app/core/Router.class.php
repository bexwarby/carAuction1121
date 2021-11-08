<?php

/**
 * routes/Router.class.php - Router class
 * Create a new router. 
 * Saves different possible routes and verifies them.
 */

/* Namespace */
namespace App\Router;

/* Imports */
require_once __DIR__ . "/Route.class.php";

/**
 * Router class
 */
class Router
{

    /* Variables */
    protected $uri; // URI from received request
    protected $method; // Verb from request
    protected $routes = [
        "GET" => [],
        "POST" => []
    ]; // Routes saved in 2 arrays according to their verb (GET or POST)
    protected $not_found_callback; // Callback if no corresponding route

    /**
     * Constructor
     */
    public function __construct($uri, $method)
    {
        $this->uri = trim($uri, "/"); // Delete / at the beginning and end of URI
        $this->method  = $method;
    }

    /**
     * Save a GET route
     */
    public function get($path, $callback)
    {
        $route = new Route($path, $callback); // Create new route
        $this->routes["GET"][] = $route; // Add route instance in GET list
    }

    /**
     * Save a POST route
     */
    public function post($path, $callback)
    {
        $route = new Route($path, $callback); // Create new route
        $this->routes["POST"][] = $route; // Add route instance in POST list
    }

    /**
     * Save default function
     */
    public function default($callback)
    {
        $this->not_found_callback = $callback;
    }


    /**
     * Function to start searching a corresponding route
     */
    public function start()
    {

        /* Loop through all routes for the selected verb from the request */
        foreach ($this->routes[$this->method] as $route) {

            /* Route verification */
            if ($route->check($this->uri)) {
                $route->call(); // Call route callback function
                return; // Stop the function
            }
        }

        /* 
         * If no corresponding route - callback function
         */
        if (isset($this->not_found_callback)) {
            call_user_func($this->not_found_callback); // Appel de la focntion callback par défaut
        }
    }
}
