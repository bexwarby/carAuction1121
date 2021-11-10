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
class User
{

    /**
     * Display the page
     */
    // NEED TO CONVERT/CLEAN CODE FOR CONDITIONAL RENDERING
    public function renderProfile()
    
    { ?>

        <!DOCTYPE html>
        <html>

            <head>
                <meta charset="utf-8">
                <title>Profile Page</title>

                <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
            </head>

            <body>
                <div id="mainContainer">

                    <h1>Your Profile</h1>

                        <!-- DISPLAY PROFILE DATA FROM DB IF CONNECTED -->
                        <p>
                            First Name: 
                        </p>
                        <p>
                            Surname: 
                        </p>
                        <p>
                            Email: 
                        </p>
                        <p>
                            Password: 
                        </p>

                        <h4>Your ongoing auctions:</h4>

                         <!-- LINK TO CREATE CAR FORM -->
                         <p><i>Want to add your own car for auction?</i></p>
                        <button href="">Get it online here!</button>

                        <!-- LINK TO CREATE USER FORM -->
                        <p><i>Log in now</i></p>
                        <button href="">Connect</button>

                </div>
            </body>

        </html>

<?php
    }
}
