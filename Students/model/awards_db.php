<?php
//updated: 14 Feb 2022
//written by: Andrew O'Brien
require_once('database.php');

//class for doing queries on the awards table; provides
//functions for getting all awards, getting an individual awards, adding a
//awards, updating a awards, and deleting a awards
class AwardsDB
{
    //Get all awards in the DB; returns false if the
    //database connection fails
    public static function getAwards()
    {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the awards
            //table with the categories table to get the role
            //info for the awards object
            $query = 'SELECT * FROM awards';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //Get all awards in the DB; returns false if the
    //database connection fails
    public static function getVeriAwards($uId)
    {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the awards
            //table with the categories table to get the role
            //info for the awards object
            $query =
                "SELECT *
                    FROM awards A
                    WHERE VERIFIED = 1 AND NOT EXISTS
                    (SELECT AWD_ID FROM user_awards B WHERE B.AWD_ID = A.AWD_ID AND B.USER_ID = '$uId')";

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific awards by their AWD_ID
    public static function getAward($AWD_ID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM awards
                    WHERE AWD_ID = '$AWD_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a awards by their AWD_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteAward($AWD_ID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM awards
                    WHERE AWD_ID = '$AWD_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a awards to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addAward($awName, $awOrg, $awDesc, $awVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - AWD_ID is an
            //auto-increment field, so no need to
            //specify it
            $query =
                "INSERT INTO awards (AWD_NAME, AWD_ORGANIZATION, AWD_DESC, VERIFIED)
                VALUES ('$awName', '$awOrg', '$awDesc', '$awVerified')";
            $query2 =
                "SELECT * FROM awards where AWD_ID = LAST_INSERT_ID()";

            //execute the query
            $dbConn->query($query);
            $result = $dbConn->query($query2);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to update a awards's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateAward($awId, $awName, $awOrg, $awDesc, $awVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query =
                "UPDATE awards SET
                    AWD_NAME = '$awName',
                    AWD_ORGANIZATION = '$awOrg',
                    AWD_DESC = '$awDesc',
                    VERIFIED = '$awVerified'
                WHERE AWD_ID = '$awId'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
