<?php

/**
 * views/NotFound.php - NotFound view
 * Displays by default if no other route found.
 */

/* Namespace */
namespace App\Views;

/**
 * NotFound View
 */
class NotFound
{

    /**
     * Display the error message
     */
    public function render()
    { ?>

    <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <title>Not Found - Auction</title>

            <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
        </head>

        <body>
            <div id="mainContainer">
                <h1>Car Auction Ltd</h1>
                <p>Cette page n'existe pas.</p>
            </div>
        </body>

        </html>

<?php
    }
}
