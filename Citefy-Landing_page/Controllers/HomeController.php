<?php
/**
 * Created by PhpStorm.
 * User: Luke Houghton
 * Date: 19/07/17
 * Time: 14:40
 */

// Create the model
$model = new HomeModel();

// Check what to do
if ($model->isFormSubmitted()) {
    if (!$model->getErrors()) {
        $model->submitForm();
    }
}

// Checking for any errors & success
$errors = $model->getErrors();
$success = $model->getSubmissionSuccessful();

// Load the view
include "Views/HomeView.php";