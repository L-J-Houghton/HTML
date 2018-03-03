<?php
/**
 * Created by PhpStorm.
 * User: Luke Houghton
 * Date: 19/07/17
 * Time: 15:19
 */

require_once 'config.php';
require_once 'functions.php';

// Autoload function
// Only the Models are going to be classes so nothing else to handle here
spl_autoload_register(function ($className) {
    if (endsWith($className, 'Model')) { // Check if looking for a Model
        if (file_exists('Models/'.$className.'.php')) { // Check that the file exists
            include 'Models/'.$className.'.php'; // If the file exists then include it
        } else { // If file doesn't exist then load 404 file
            include '404.php';
        }
    }
});

// Start the session
session_start();

// Create the PDO connection
global $queriesModel;
$queriesModel = new QueriesModel($dbName, $dbUser, $dbPasswd);

// QueriesModel
parse_str($_SERVER['QUERY_STRING'], $queries); // Load all query parameters into an array