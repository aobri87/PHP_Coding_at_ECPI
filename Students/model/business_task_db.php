<?php
//updated: 1 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the business_task table; provides
//functions for getting all business_task, getting an individual business_task, adding a
//business_task, updating a business_task, and deleting a business_task
class Business_TaskDB {
    //Get all business_task in the DB; returns false if the
    //database connection fails
    public static function getBusiness_Tasks() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the business_task
            //table with the categories table to get the role
            //info for the business_task object
            $query = 'SELECT * FROM business_task';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific business_task by their BUS_ID
    public static function getBusiness_TaskByBus($BUS_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM business_task
                    WHERE BUS_ID = '$BUS_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    //function to get a specific business_task by their TSK_ID
    public static function getBusiness_TaskByTsk($TSK_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM business_task
                    WHERE TSK_ID = '$TSK_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a business_task by their BUS_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteBusiness_TaskByBus($BUS_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM business_task
                    WHERE BUS_ID = '$BUS_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
        //function to delete a business_task by their TSK_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteBusiness_TaskByTsk($TSK_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM business_task
                    WHERE TSK_ID = '$TSK_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a business_task to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addBusiness_Task($bID, $tID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - BUS_ID is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO business_task (BUS_ID, TSK_ID)
                VALUES ('$bID', '$tID')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a business_task's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateBusiness_Task($bID, $tID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE business_task SET
                    BUS_ID = '$bID',
                    TSK_ID = '$tID'
                WHERE BUS_ID = '$bId' AND TSK_ID = 'tID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>