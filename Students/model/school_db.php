<?php
//updated: 1 Feb 2022
//written by: Andrew O'Brien
require_once('database.php');

//class for doing queries on the school table; provides
//functions for getting all school, getting an individual school, adding a
//school, updating a school, and deleting a school
class SchoolDB {
    //Get all school in the DB; returns false if the
    //database connection fails
    public static function getSchools() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the school
            //table with the categories table to get the role
            //info for the school object
            $query = 'SELECT * FROM school';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific school by their SKH_ID
    public static function getSchool($SKH_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM school
                    WHERE SKH_ID = '$SKH_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a school by their SKH_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteSchool($SKH_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM school
                    WHERE SKH_ID = '$SKH_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a school to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addSchool($skhName, $skhAddId, $skhVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - SKH_ID is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO school (SKH_NAME, VERIFIED)
                VALUES ('$skhName', '$skhVerified')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a school's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateSchool($skhId, $skhName, $skhAddId, $skhVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            if ($skhAddId == NULL){
                $query = 
                    "UPDATE school SET
                        SKH_NAME = '$skhName',
                        VERIFIED = '$skhVerified'
                    WHERE SKH_ID = '$skhId'";
            } else {
                $query = 
                    "UPDATE school SET
                        SKH_NAME = '$skhName',
                        ADD_ID = '$skhAddId',
                        VERIFIED = '$skhVerified'
                    WHERE SKH_ID = '$skhId'";
            }

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>