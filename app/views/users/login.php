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
class Login
{
    /* Variables */
    protected $message;

    public function __construct($message)
    {
        if(isset($message)){
            $this->message = $message
        }
    }

    /**
     * Display the sign up form
     */
    // NEED TO CONVERT/CLEAN CODE FOR CONDITIONAL RENDERING
    public function renderLogin() { ?>

        <!DOCTYPE html>
        <html>

            <head>
                <meta charset="utf-8">
                <title>Profile Page</title>

                <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
            </head>

            <body>
                <div id="mainContainer">

                    <h3>Sign In Now</h3>

                    <?php if(isset($this->message)) { ?>
                        <p><?= $this->message; ?></p>
                    <?php } ?>
                    <!-- CREATE USER FORM -->
                    <form action="/login" method="POST">

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required />

                        <label id="password">Password:</label>
                        <textarea type="password" name="password" id="password" required></textarea>

                        <input type="submit" value="Sign up">
                    </form>

                    <!-- LINK TO CREATE FORM ON PROFILE PAGE -->
                    <p><i>Need to create an account?</i></p>
                    <a href="http://">Sign up here!</a>

                </div>
            </body>

        </html>

<?php
    }
}