<?php

/**
 * views/Home.php - Home view
 * This view display the home page.
 */

/* Namespace */
namespace App\Views;

/**
 * Home View
 */
class Home
{
    /* Parameters */
    protected $result; // This stocks results from the contact form
    

    /**
     * Constructor
     * Takes on parameter a boolean containing the result from the contact form
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
     * Display the home page
     */
    public function render()
    { /**
     * Display the menu page
    */
    include __DIR__."/menu.php";
    // call menu function
    (new Menu)->show_menu();
    ?>

        <!DOCTYPE html>
        <html>

            <head>
                <meta charset="utf-8">
                <title>Car Auction Site</title>

                <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
            </head>

            <body>

                <div id="mainContainer">

                    <h1>Car Auction Ltd</h1>

                    <h2>Number ONE worldwide!</h2>

                    <p>
                        Welcome to CA Ltd. At your service since 2021!
                    </p>

                    <h2>Contact us now!</h2>
                    <?php if (!isset($this->result)) { ?>
                        <p>
                            Include all your details below.
                        </p>
                    <?php } else if ($this->result === true) { ?>
                        <p>Your request has been received.</p>
                    <?php } else { ?>
                        <p>Please try again - there was an error when sending your message sorry.</p>
                    <?php } ?>

                    <!-- CONTACT FORM -->
                    <form action="/" method="POST">
                        <!-- First name -->
                        <label for="firstname">First name:</label>
                        <input type="text" id="firstname" name="firstname" required />
                        <!-- Last name -->
                        <label for="lastname">Surname:</label>
                        <input type="text" id="lastname" name="lastname" required />
                        <!-- Email -->
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required />
                        <!-- Phone number -->
                        <label for="phone">Phone number:</label>
                        <input type="text" id="phone" name="phone" required />
                        <!-- Message -->
                        <label id="message">Message</label>
                        <textarea name="message" id="message" required></textarea>
                        <!-- Send button -->
                        <button>Send</button>
                    </form>
                </div>
            </body>

        </html>

<?php
    }
}
