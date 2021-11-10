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
use App\Controllers\Home;
use App\Controllers\Car;
use App\Controllers\User;
use App\Controllers\NotFound;
use App\Controllers\Menu;


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

$router->get("cars", [$carsController, 'renderList']); // GET /
$router->get("cars/:id", [$carsController, 'renderSingle']); // GET /
$router->get("cars/:userId/add", [$carsController, 'renderAuction']); // GET /

$router->post("cars/:userId/add", [$carsController, 'process_new_car']); // POST /
/*********************/

/*** Profile page ***/
$userController = new User();

$router->get("profile/:userId", [$userController, 'renderProfile']); // GET /
$router->get("profile/:userId/update", [$userController, 'renderUpdate']); // GET /
$router->get("profile", [$userController, 'renderProfile']); // GET /
$router->get("profil/new", [$userController, 'renderCreate']); // GET /

$router->post("profile", [$userController, 'connect']); // POST /
$router->post("profile/new", [$userController, 'create_user']); // POST /
$router->post("profile/:userId/update", [$userController, 'profile_update']); // POST /
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




