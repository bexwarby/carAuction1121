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
// GET /
$router->get("/",  [$homeController, 'render']); 
// POST /
$router->post("/", [$homeController, 'process_contact_form']); 
/*********************/

/*** Cars list page ***/
$carsController = new Car();
// GET /
$router->get("/cars", [$carsController, 'renderList']); 
$router->get("/cars/:id", [$carsController, 'renderSingle']);
$router->get("/cars/:userId/add", [$carsController, 'renderAuction']); 
// POST /
$router->post("/cars/:userId/add", [$carsController, 'process_new_car']); 
/*********************/

/*** Profile page ***/
$userController = new User();
// GET /
$router->get("/login", [$userController, 'renderLogin']); 
$router->get("/profile/:userId", [$userController, 'renderProfile']); 
$router->get("/profile/:userId/update", [$userController, 'renderUpdate']); 
$router->get("/profile", [$userController, 'renderProfile']); 
$router->get("/profil/new", [$userController, 'renderCreate']); 
// POST /
$router->post("/login", [$userController, 'connect']); 
$router->post("/profile/new", [$userController, 'create_user']); 
$router->post("/profile/:userId/update", [$userController, 'profile_update']); 
/*********************/

/*** Legal mentions ***/
$router->get ("/legal", [$homeController, 'legal']);
/*********************/

/*** Default Route ***/
$router->default([new NotFound(), 'render']);
/*********************/


/***************************************/
/* Find corresponding routes */
/***************************************/

/* Start the router */
$router->start();




