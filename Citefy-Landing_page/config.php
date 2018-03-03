<?php
/**
 * Created by PhpStorm.
 * User: Luke Houghton
 * Date: 19/07/17
 * Time: 13:56
 */

/*

Need to change this to match the database

*/

// Contains common settings

// Database settings
$dbName = 'citefy-lander';
$dbUser = 'main';
$dbPasswd = '';

// Error reporting
// Ability to easily turn error reporting on/off
$errorReporting = true;
if ($errorReporting) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}