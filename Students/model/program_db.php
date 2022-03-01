<?php
//updated: 4 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the program table; provides
//functions for getting all program, getting an individual program, adding a
//program, updating a program, and deleting a program
class ProgramDB {
    //Get all program in the DB; returns false if the
    //database connection fails
    public static function getPrograms() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the program
            //table with the categories table to get the role
            //info for the program object
            $query = 'SELECT * FROM program';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific program by their PROGRAM_ID
    public static function getProgram($PROGRAM_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM program
                    WHERE PROGRAM_ID = '$PROGRAM_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a program by their PROGRAM_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteProgram($PROGRAM_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM program
                    WHERE PROGRAM_ID = '$PROGRAM_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a program to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addProgram($proName, $proHours)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - PROGRAM_ID is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO program (PROGRAM_NAME, PROGRAM_HOURS)
                VALUES ('$proName', '$proHours')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a program's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateProgram($proId, $proName, $proHours)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE program SET
                    PROGRAM_NAME = '$proName',
                    PROGRAM_HOURS = '$proHours'
                WHERE PROGRAM_ID = '$proId'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>