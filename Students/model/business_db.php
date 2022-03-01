<?php
//updated: 14 Feb 2022
//written by: Andrew O'Brien
require_once('database.php');

//class for doing queries on the business table; provides
//functions for getting all business, getting an individual business, adding a
//business, updating a business, and deleting a business
class BusinessDB {
    //Get all business in the DB; returns false if the
    //database connection fails
    public static function getBusinesses() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the business
            //table with the categories table to get the role
            //info for the business object
            $query = 'SELECT * FROM business';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific business by their BUS_ID
    public static function getBusiness($BUS_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM business
                    WHERE BUS_ID = '$BUS_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a business by their BUS_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteBusiness($BUS_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM business
                    WHERE BUS_ID = '$BUS_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a business to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addBusiness($bName, $bDesc, $bAddId, $bVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - BUS_ID is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO business (BUS_NAME, BUS_DESC, ADD_ID, VERIFIED)
                VALUES ('$bName', '$bDesc', '$bAddId', '$bVerified')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a business's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateBusiness($awId, $bName, $bDesc, $bAddId, $bVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE business SET
                    BUS_NAME = '$bName',
                    BUS_DESC = '$bDesc',
                    ADD_ID = '$bAddId',
                    VERIFIED = '$bVerified'
                WHERE BUS_ID = '$awId'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>