<?php

/**
 * views/Menu.php - Menu view
 * Display menu on each page
 */

/* Namespace */
namespace App\Views;

/**
 * Menu View
 */
class Menu
{
    /**
     * Display the navbar / menu
     */
    public function show_menu()
    { ?>

        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <title>Menu</title>
            </head>
            <body>
                <!--  Navbar -->
                <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="navbar-brand" href="/">Home<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/cars">Car List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/cars/:id">More details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/profile">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/legal">Legal</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </body>
        </html>

<?php
    }
}