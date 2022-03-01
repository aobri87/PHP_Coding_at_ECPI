<?php
//updated: 4 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the prereq table; provides
//functions for getting all prereq, getting an individual prereq, adding a
//prereq, updating a prereq, and deleting a prereq
class PrereqDB {
    //Get all prereq in the DB; returns false if the
    //database connection fails
    public static function getPrereqs() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the prereq
            //table with the categories table to get the role
            //info for the prereq object
            $query = 'SELECT * FROM prereq';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific prereq by their COURSE
    public static function getPrereq($cor) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM prereq
                    WHERE COURSE = '$cor'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a prereq by their COURSE
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deletePrereq($cor, $prereq) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM prereq
                    WHERE COURSE = '$cor' AND PREREQ_COURSE = '$prereq'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a prereq to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addPrereq($cor, $prereq)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - COURSE is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO prereq (COURSE, PREREQ_COURSE)
                VALUES ('$cor', '$prereq')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a prereq's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updatePrereq($cor, $prereq)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE prereq SET
                    COURSE = '$cor',
                    PREREQ_COURSE = '$prereq'
                WHERE COURSE = '$cor' AND PREREQ_COURSE = '$prereq'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>