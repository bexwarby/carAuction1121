<?php

/**
 * views/user/user.php - Create user page view
 * User creates their profile
 */

/* Namespace */
namespace App\Views\Users;

/**
 * Create User View
 */
class CreateUser
{

    /**
     * Display the sign up form
     */
    // NEED TO CONVERT/CLEAN CODE FOR CONDITIONAL RENDERING
    public function render()
    
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

                    <h2>Welcome to Car Auction LTD</h2>
                    <h3>Sign up here in just 1 minute</h3>

                    <!-- CREATE USER FORM -->
                    <form action="/profile/:id" method="POST">

                        <label for="firstname">First name:</label>
                        <input type="text" id="firstname" name="firstname" required />

                        <label for="lastname">Last name:</label>
                        <input type="text" id="lastname" name="lastname" required />

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required />

                        <label id="password">Password:</label>
                        <textarea type="password" name="password" id="password" required></textarea>

                        <button>Sign me up!</button>
                    </form>

                    <!-- LINK TO LOGIN FORM ON PROFILE PAGE -->
                    <p><i>Already have an account?</i></p>
                    <button>Sign in here!</button>

                </div>
            </body>

        </html>

<?php
    }
}