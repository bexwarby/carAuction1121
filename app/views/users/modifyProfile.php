<?php

/**
 * views/user/modifyProfile.php - Modify profile view
 * User modifies their profile
 */

/* Namespace */
namespace App\Views\Users;

/**
 * Create User View
 */
class ModifyUser
{

    /**
     * Display the update profile form
     */

    public function render()
    
    { ?>

        <!DOCTYPE html>
        <html>

            <head>
                <meta charset="utf-8">
                <title>Profile Update</title>

                <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
            </head>

            <body>
                <div id="mainContainer">

                    <h2>Update your profile</h2>

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

                        <button>Update</button>
                    </form>

                    <!-- LINK TO GO BACK TO PROFILE PAGE -->
                    <button>Back to <b>My Profile</b></button>

                </div>
            </body>

        </html>

<?php
    }
}