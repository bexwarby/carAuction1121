<?php

/**
 * index.php - Entry point for the application.
 * Defines the roots and controllers that need to be called.
 */

/* Imports */
require_once __DIR__ . "/core/Router.class.php"; // Router
include_once __DIR__ . "/controllers/Home.php"; // Home controller
include_once __DIR__ . "/controllers/Car.php"; // Car controller
include_once __DIR__ . "/controllers/User.php"; // User controller
include_once __DIR__ . "/controllers/NotFound.php"; // NotFound controller
include_once __DIR__ . "/controllers/Menu.php"; // Menu controller

/* Alias */
use App\Router\Router;
use App\Controllers\Menu;
use App\Controllers\Home;
use App\Controllers\Car;
use App\Controllers\User;
use App\Controllers\NotFound;


/*********************/
/*      Request     */
/*********************/
$method = $_SERVER['REQUEST_METHOD']; // Get the verb
$uri = $_GET['uri']; // Get the URI


/*********************/
/*       Router      */
/*********************/

/* Create the router */
$router = new Router($uri, $method);


/*********************/
/*       Routes      */
/*********************/

/*** Home page ***/
$homeController = new Home();

$router->get("/",  [$homeController, 'render']); // GET /
$router->post("/", [$homeController, 'process_contact_form']); // POST /
/*********************/

/*** Cars list page ***/
$carsController = new Car();

$router->get("cars", [$carsController, 'render']); // GET /
$router->get("cars/:id", [$carsController, 'show_car']); // GET /
$router->post("cars/add", [$carsController, 'new_car']); // POST /
/*********************/

/*** Profile page ***/
$userController = new User();

$router->get("profile/:id", [$userController, 'render']); // GET /
$router->post("profile", [$userController, 'connect']); // POST /
$router->post("profile/new", [$userController, 'create_user']); // POST /
$router->post("profile/:id/update", [$userController, 'profile_update']); // POST /
/*********************/

/*** Legal mentions ***/
$router->get ("legal", [$homeController, 'legal']);
/*********************/

/*** Default Route ***/
$router->default([new NotFound(), 'render']);
/*********************/


/***************************************/
/* Find corresponding routes */
/***************************************/

/* Start the router */
$router->start();




