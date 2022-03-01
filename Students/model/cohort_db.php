<?php
//updated: 14 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the cohort table; provides
//functions for getting all cohort, getting an individual cohort, adding a
//cohort, updating a cohort, and deleting a cohort
class CohortDB {
    //Get all cohort in the DB; returns false if the
    //database connection fails
    public static function getCohorts() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the cohort
            //table with the categories table to get the role
            //info for the cohort object
            $query = 'SELECT * FROM cohort';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific cohort by their COHORT_ID
    public static function getCohort($cohId) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM cohort
                    WHERE COHORT_ID = '$cohId'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a cohort by their COHORT_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteCohort($cohId) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM cohort
                    WHERE COHORT_ID = '$cohId'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a cohort to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addCohort($cohName, $cohDesc)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - COHORT_ID is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO cohort (COHORT_NAME, COHORT_DESC)
                VALUES ('$cohName', '$cohDesc')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a cohort's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateCohort($cohId, $cohName, $cohDesc)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE cohort SET
                    COHORT_NAME = '$cohName',
                    COHORT_DESC = '$cohDesc'
                WHERE COHORT_ID = '$cohId'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>