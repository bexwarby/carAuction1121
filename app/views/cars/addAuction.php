<?php

/**
 * views/user/user.php - User profile page view
 * Log in alternative view if the user is not 
 * connected.
 */

/* Namespace */
namespace App\Views\Users;

/**
 * User profile View
 */
class Auction
{
    /**
     * Display the page
     */
    // NEED TO CONVERT/CLEAN CODE FOR CONDITIONAL RENDERING
    public function render()
    
    { ?>

        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title>Add Auction Car</title>
                <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
            </head>

            <body>
                <div id="mainContainer">

                    <h1>Add your auction car here</h1>
                        <!-- TO DO -- ADD IF PHP CONDITION -->
                        <!-- AUCTION CAR FORM -->
                        <form action="/cars" method="POST">

                            <label for="model">Model:</label>
                            <input type="text" id="model" name="model" required />

                            <label for="make">Model:</label>
                            <input type="text" id="make" name="make" required />

                            <label for="power">Power:</label>
                            <input type="text" id="power" name="power" required />

                            <label for="year">Year:</label>
                            <input type="number" id="year" name="year" required />

                            <label for="startDate">Date you would like to open bids:</label>
                            <input type="date" id="startDate" name="startDate" required />

                            <label for="endDate">End date:</label>
                            <input type="date" id="endDate" name="endDate" required />

                            <label for="description">Personalised description:</label>
                            <textarea name="description" id="description" cols="30" rows="10"></textarea>

                            <label for="seller">How would you like to display your seller name?</label>
                            <input type="text" id="seller" name="seller" required />

                            <label for="startingPrice">Starting price:</label>
                            <input type="number" id="startingPrice" name="startingPrice" required />

                            <button>Add my car</button>
                        </form>
                   
                        <!-- TO DO -- ADD ELSE PHP CONDITION -->
                        <p>Please <a href="">log in here</a> before adding a 
                        car to the auction pool:</p>
                        
                        <!-- BACK BUTTON -->
                        <button href="<?php ?>">Back</button>

                    

                </div>
            </body>

        </html>

<?php
    }
}
