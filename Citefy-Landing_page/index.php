<?php
/**
 * Created by PhpStorm.
 * User: Luke Houghton
 * Date: 19/07/17
 * Time: 13:39
 */

// Single point of entry file
require_once 'bootstrap.php';

/*
 * Setup complete
 */

// Set the title of the page
$title = 'Citefy';

// Set the page
$page = 'home';
// Capitalize and remove whitespace
$page = preg_replace('/\s+/', '', ucwords($page));

// Set the action of the user
$action = 'view';
if (isset($queries['modifier'])) { // Check to see if the variable is set before we try and access it
    if (!empty($queries['modifier'])) {
        $action = $queries['modifier'];
    }
}


include 'Templates/header.php';
if (file_exists('Controllers/'.$page.'Controller.php')) {
    include 'Controllers/'.$page.'Controller.php';
} else {
    include '404.php';
}
include 'Templates/footer.php';