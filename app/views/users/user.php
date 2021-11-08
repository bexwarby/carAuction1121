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
    /* Variables */
    protected $result;

    /**
     * Constructor
     * Takes on parameter a boolean containing the result 
     * from the sign in form
     * If null, then the request was not from the form.
     */
    public function __construct($result)
    {
        // if $result is not null
        if (isset($result)) {
            $this->result = $result; // Assign value from the parameter $result
        }
    }

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
                <title>Profile Page</title>

                <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
            </head>

            <body>
                <div id="mainContainer">

                    <h1>Your Profile</h1>

                    <?php if (/**Condition for connected */$this->result === true) { ?>
                        <!-- DISPLAY PROFILE DATA FROM DB -->
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

                         <!-- LINK TO CREATE USER FORM -->
                         <p><i>Want to add your own car for auction?</i></p>
                        <button href="">Get it online here!</button>

                    <?php } else { ?>

                        <!-- SIGN IN FORM -->
                        <form action="/profile/:id" method="POST">

                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required />

                            <label id="password">Password:</label>
                            <textarea type="password" name="password" id="password" required></textarea>

                            <button>Sign me in!</button>
                        </form>

                        <!-- LINK TO CREATE USER FORM -->
                        <p><i>Don't have an account?</i></p>
                        <button href="">Sign up here!</button>

                    <?php } ?>

                </div>
            </body>

        </html>

<?php
    }
}
