<?php
/**
 * Created by PhpStorm.
 * User: Luke Houghton
 * Date: 19/07/17
 * Time: 13:59
 */

// For common functions

// Helper functions
// Seeing if a string ends with a certain string
function endsWith($haystack, $needle) {
    $length = strlen($needle);

    if ($length == 0) {
        return true;
    }
    return (substr($haystack, -$length) === $needle);
}

// Clean input
// This "cleans" the data passed to the function and returns the clean version
function clean_input($data) {
    $data = trim($data); // strips whitespace from beginning/end
    $data = stripslashes($data); // remove backslashes
    $data = htmlspecialchars($data); // replace special characters with HTML entities
    return $data;
}