<?php

/**
 * Created by PhpStorm.
 * User: Luke Houghton
 * Date: 19/07/17
 * Time: 14:27
 */
class QueriesModel
{
    private $db;
    private $dbName;
    private $dbUser;
    private $dbPasswd;

    public function __construct($dbname, $dbusername, $dbpassword)
    {
        $this->dbName = $dbname;
        $this->dbUser = $dbusername;
        $this->dbPasswd = $dbpassword;

        // Calling a function to create the PDO connection
        $this->createPdoConnection();
    }

    private function createPdoConnection() {
        try {
            // Creating the PDO connection
            $this->db = new PDO('mysql:host=localhost;dbname='.$this->dbName, $this->dbUser, $this->dbPasswd);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // If the connection doesn't work then I display an error message
            echo '<h1>Connection to database failed!</h1>';
            echo "<p>$e</p>";
        }
    }

    //Function to execute a PDO statement and return the data
    public function pdoStatement($sql, $data=array()) {
        $statement = $this->db->prepare( $sql );
        try{
            $statement->execute( $data );
        } catch (Exception $e){
            echo "<p>Exception: $e</p>";
        }
        return $statement;
    }
}