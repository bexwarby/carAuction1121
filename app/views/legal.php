<?php

/**
 * views/Legal.php - Legal view
 * This view display the home page.
 */

/* Namespace */
namespace App\Views;

/**
 * Legal View
 */
class Legal
{
    /**
     * Display the legal page
     */

    public function render()
    { ?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <title>Legal</title>

            <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
        </head>

        <body>
            <div id="mainContainer">
                <h1>Legal Terms</h1>

                <h2>Privacy</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam 
                    dignissim semper commodo. Mauris vel commodo tortor, sed lobortis 
                    risus. Aliquam euismod a purus et malesuada. Donec euismod placerat 
                    ipsum in pretium. Phasellus sollicitudin nisi eu lorem fermentum 
                    commodo. Sed molestie, lectus sit amet tincidunt semper, odio 
                    metus facilisis diam, sed ullamcorper neque lacus sit amet elit. 
                    Nulla nec condimentum turpis. Integer pharetra turpis sit amet 
                    arcu gravida rhoncus. Morbi at eros tellus. In ullamcorper purus 
                    ut mollis eleifend. Interdum et malesuada fames ac ante ipsum 
                    primis in faucibus. Vestibulum porta rhoncus erat a semper. 
                    Etiam at nibh nibh. Vivamus ullamcorper, eros vel cursus vehicula, 
                    ex dolor porta elit, in posuere risus sem egestas ligula. Integer 
                    non tempor quam. Curabitur nec tincidunt dolor, sed tristique nunc.
                </p>
                <p>
                    In commodo odio mauris, non rutrum nunc dapibus in. Morbi porttitor 
                    nisi turpis, eget luctus felis sodales vel. Mauris vel ultricies 
                    risus. Morbi nec elit sit amet ex tempus aliquam eu et enim. Sed 
                    placerat, sapien semper eleifend cursus, dolor risus accumsan felis, 
                    vulputate rutrum magna sapien non justo. Donec nec luctus dui, eget
                    eleifend est. Donec lorem massa, finibus at ullamcorper quis, 
                    placerat eu orci. Nulla id lorem at diam porttitor aliquam. Ut sit 
                    amet nisl vitae ipsum vehicula scelerisque. Phasellus tincidunt 
                    lacus neque, ut laoreet lorem ullamcorper nec. Morbi ac eros 
                    condimentum, faucibus felis sit amet, tempor diam. Phasellus mattis 
                    dui lorem, eu cursus tellus eleifend nec. Mauris vehicula maximus 
                    nulla sit amet feugiat. Etiam porta turpis vel turpis elementum cursus.
                </p>
            </div>
        </body>

        </html>

<?php
    }
}
