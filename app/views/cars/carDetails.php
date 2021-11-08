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
class SingleCar
{

    /**
     * Display the page
     */
    public function renderSingle()
    
    { ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Single Car Details</title>
    </head>
    <body>

        <!-- Page title -->
        <h3 class="d-block p-2 bg-dark text-white text-center">
            Find out more here:
        </h3>

        <!-- Table displaying stock -->
        <table class="table table-striped">
            <thead class="thead-dark">
                <!-- Model name -->
                <tr>
                    <th scope="row">
                        Model
                    </th>
                    <td>
                        <?php ?>
                    </td>
                </tr>
                <!-- make name -->
                <tr>
                    <th scope="row">
                        Make
                    </th>
                    <td>
                        <?php ?>
                    </td>
                </tr>
                <!-- Year -->
                <tr>
                    <th scope="row">
                        Year
                    </th>
                    <td>
                        <?php ?>
                    </td>
                </tr>
                <!-- Auction start date -->
                <tr>
                    <th scope="row">
                        Auction start date
                    </th>
                    <td>
                        <?php ?>
                    </td>
                </tr>
                <!-- Auction end date -->
                <tr>
                    <th scope="row">
                        Auction end date
                    </th>
                    <td>
                        <?php ?>
                    </td>
                </tr>
                <!-- Description -->
                <tr>
                    <th scope="row">
                        Description
                    </th>
                    <td>
                        <?php ?>
                    </td>
                </tr>
                <!-- Seller -->
                <tr>
                    <th scope="row">
                        Seller
                    </th>
                    <td>
                        <?php ?>
                    </td>
                </tr>
                <!-- Starting price -->
                <tr>
                    <th scope="row">
                        Starting price
                    </th>
                    <td>
                        <?php ?>
                    </td>
                </tr>
                <!-- Current bid price -->
                <tr>
                    <th scope="row">
                        Current bid price
                    </th>
                    <td>
                        <?php ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <Button href="">Make a bid</Button>
        <Button href="">Back to list</Button>
        
    </body>
    </html>

<?php
    }
}




