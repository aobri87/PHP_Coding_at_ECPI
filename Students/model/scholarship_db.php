<?php
//updated: 24 Feb 2022
//written by: Andrew O'Brien
require_once('database.php');

//class for doing queries on the scholarship table; provides
//functions for getting all scholarship, getting an individual scholarship, adding a
//scholarship, updating a scholarship, and deleting a scholarship
class ScholarshipDB
{
    //Get all scholarship in the DB; returns false if the
    //database connection fails
    public static function getScholarships()
    {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the scholarship
            //table with the categories table to get the role
            //info for the scholarship object
            $query = 'SELECT * FROM scholarship';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific scholarship by their SCH_ID
    public static function getVeriScholarships($uID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT *
                    FROM scholarship A
                    WHERE VERIFIED = 1 AND NOT EXISTS
                    (SELECT SCH_ID FROM user_scholarship B WHERE B.SCH_ID = A.SCH_ID AND B.USER_ID = '$uID');";

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }
    //function to get a specific scholarship by their SCH_ID
    public static function getScholarship($SCH_ID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM scholarship
                    WHERE SCH_ID = '$SCH_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a scholarship by their SCH_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteScholarship($SCH_ID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM scholarship
                    WHERE SCH_ID = '$SCH_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a scholarship to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addScholarship($schName, $schAmount, $schDesc, $schAddId, $schOrg, $schVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - SCH_ID is an
            //auto-increment field, so no need to
            //specify it
            $query =
                "INSERT INTO scholarship (SCH_NAME, SCH_AMOUNT, SCH_DESC, SCH_ORG, VERIFIED)
                VALUES ('$schName', '$schAmount', '$schDesc', '$schOrg', '$schVerified')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a scholarship's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateScholarship($schId, $schName, $schAmount, $schDesc, $schAddId, $schOrg, $schVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query =
                "UPDATE scholarship SET
                    SCH_NAME = '$schName',
                    SCH_AMOUNT = '$schAmount',
                    SCH_DESC = '$schDesc',
                    SCH_ORG = '$schOrg',
                    VERIFIED = '$schVerified'
                WHERE SCH_ID = '$schId'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
