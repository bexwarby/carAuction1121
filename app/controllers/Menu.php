<?php 

/**
 * controllers/Menu.php - Menu / Navbar Controller
 * Methods to display the menu on every view
 */

/* Namespace */
namespace App\Controllers;

/* Imports */

/* Alias */

/**
 * Menu Controller
 */
class Menu
{
    // Show the product attributes based on the id.
	public function show_menu()
	{
        require_once __DIR__ . "/../views/Menu.php";
        show_menu();
	}
}