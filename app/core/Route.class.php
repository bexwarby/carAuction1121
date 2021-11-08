<?php

/**
 * routes/Route.class.php - Route class
 * This class allows creation of new routes.
 * Routes are saved in the router.
 */

/* Namespace */
namespace App\Router;

/**
 * Route class
 */
class Route
{

    /* Variables */
    protected $path; // Route path
    protected $callback; // callback function if the route applies
    protected $dynamicValues = [];

    /**
     * Constructor
     */
    public function __construct($path, $callback)
    {
        $this->path = trim($path, "/"); // Delete the / at the beginning of the URI
        $this->callback = $callback;
    }

    /**
     * Verify the route
     */
    public function check($uri)
    {
        /* Verify if the route is dynamic */
        $dynamic_part = [];
        preg_match("/:.*/", $this->path, $dynamic_part, PREG_OFFSET_CAPTURE);

        if (count($dynamic_part) > 0) {
            $name = substr($dynamic_part[0][0], 1); // Name of dynamic route variable
            $value = substr($uri, $dynamic_part[0][1]); // Value of dynamic route variable

            /* Stock dynamic value */
            $this->dynamicValues[$name] = $value;

            /* Comparison for dynamic route */
            return substr($this->path, 0, $dynamic_part[0][1]) === substr($uri, 0, $dynamic_part[0][1]);
        } else {
            /* Comparison for static route */
            return $uri === $this->path;
        }
    }

    /**
     * Call routes callback function
     */
    public function call()
    {
        call_user_func($this->callback, $this->dynamicValues); // Call fallback function stocked in the property
    }
}
