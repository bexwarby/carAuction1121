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
class Cars
{

    /**
     * Display the page
     */
    public function renderList()
    
    { ?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="favicon.png">
        <title>Individual Car</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>

        <section>
            <h1>Detailed overview:</h1>
            <ul>
                <li>
                    <p>
                        <?php echo $car->getModel(); ?> - 
                        <?php echo $car->getMake(); ?> 
                        (<?php echo $car->getYear(); ?>)
                    </p>
                    <p>Horsepower: <?php echo $car->getPower(); ?></p>
                    <p>Ending date: <?php echo $car->getEndDate(); ?></p>
                    <a href="<?php  ?>">
                        Find out more!
                    </a>
                </li>
            </ul>
            <a href="<?php  ?>">Back to homepage</a>
        <section>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>

<?php
    }
}




