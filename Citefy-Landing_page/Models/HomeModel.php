<?php

/**
 * Created by PhpStorm.
 * User: Luke Houghton
 * Date: 19/07/17
 * Time: 14:41
 */

/*

Only need to change the name of the field in the checkActionsRequired() function to match the signup input field
And also need to change the submitForm() function with the correct table name and column names

*/
class HomeModel
{
    private $userEmail;
    private $signupTime;

    private $formSubmitted;
    private $formErrors;
    private $submissionErrors;
    private $submissionSuccessful;

    public function __construct()
    {
        // Set initial variable values
        $this->userEmail = null;
        $this->signupTime = null;

        $this->formSubmitted = false;
        $this->formErrors = false;
        $this->submissionErrors = false;
        $this->submissionSuccessful = false;

        // Calling a function to determine:
        // a) whether the page was loaded through a form submission
        // b) Get any data from the form submission
        // c) validate the data
        $this->checkActionsRequired();
    }

    private function checkActionsRequired() {
        // Check if the form was submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Check if the page was loaded because of a form submission
            $this->formSubmitted = true;
            if (!empty($_POST['userEmailField'])) { // Check for errors in the form/get the value
                $this->userEmail = clean_input($_POST['userEmailField']);
            } else {
                $this->formErrors = true;
            }
        } else {
            $this->formSubmitted = false;
        }
    }

    // Public function to check if the form was submitted before page load
    public function isFormSubmitted() {
        return $this->formSubmitted;
    }

    // Public function to check if there were errors with the form
    public function getErrors() {
        if ($this->formErrors)
            return true;

        if ($this->submissionErrors)
            return true;

        return false;
    }

    // Getting successes
    public function getSubmissionSuccessful() {
        return $this->submissionSuccessful;
    }

    // Public function to submit the form
    public function submitForm() {
        $this->formErrors = false; // Resetting errors to false

        // Creating mysql statement and the data to go into it
        $sql = 'INSERT INTO cl_preSignups (email, signupTime) values (?, ?)';
        $sqlData = array($this->userEmail, (new DateTime())->getTimestamp());

        // Execute the query
        global $queriesModel;
        $statement = $queriesModel->pdoStatement($sql, $sqlData);

        if ($statement->errorCode() != "00000") { // Checking if the statement was successful
            $this->submissionErrors = true;
        } else {
            $this->submissionSuccessful = true;
        }
    }
}