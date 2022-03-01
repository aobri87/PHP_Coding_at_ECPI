<?php
//updated: 1 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the user_business_task table; provides
//functions for getting all user_business_task, getting an individual user_business_task, adding a
//user_business_task, updating a user_business_task, and deleting a user_business_task
class User_Business_TaskDB {
    //Get all user_business_task in the DB; returns false if the
    //database connection fails
    public static function getUser_Business_Tasks() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the user_business_task
            //table with the categories table to get the role
            //info for the user_business_task object
            $query = 'SELECT * FROM user_business_task';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific user_business_task by their USER_ID
    public static function getUser_Business_TaskByUser($USER_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user_business_task
                    WHERE USER_ID = '$USER_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    //function to get a specific user_business_task by their SKH_ID
    public static function getUser_Business_TaskBySchool($SKH_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user_business_task
                    WHERE SKH_ID = '$SKH_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    //function to get a specific user_business_task by their BUS_ID
    public static function getUser_Business_TaskByBusiness($BUS_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user_business_task
                    WHERE BUS_ID = '$BUS_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    //function to get a specific user_business_task by their TSK_ID
    public static function getUser_Business_TaskByTask($TSK_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user_business_task
                    WHERE TSK_ID = '$TSK_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a user_business_task by their USER_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteUser_Business_TaskByUser($USER_ID, $TSK_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM user_business_task
                    WHERE USER_ID = '$USER_ID' AND TSK_ID = '$TSK_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
    //function to delete a user_business_task by their SKH_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteUser_Business_TaskBySchool($SKH_ID, $TSK_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM user_business_task
                    WHERE SKH_ID = '$SKH_ID' AND TSK_ID = '$TSK_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
    //function to delete a user_business_task by their BUS_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteUser_Business_TaskByBusiness($BUS_ID, $TSK_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM user_business_task
                    WHERE BUS_ID = '$BUS_ID' AND TSK_ID = '$TSK_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a user_business_task to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addUser_Business_Task($uId, $tId, $bId, $sId, $ubtSDate, $ubtEDate, $ubtType)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - USER_ID is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO user_business_task (USER_ID, TSK_ID, BUS_ID, SKH_ID, UBT_SDATE, UBT_EDATE, UBT_TYPE)
                VALUES ('$uId', '$tId', '$bId', '$sId', '$ubtSDate', '$ubtEDate', '$ubtType')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a user_business_task's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateUser_Business_Task($uId, $tId, $bId, $sId, $ubtSDate, $ubtEDate, $ubtType)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE user_business_task SET
                    USER_ID = '$uId',
                    SKH_ID = '$sId',
                    TSK_ID = '$tId',
                    BUS_ID = '$bId',
                    UBT_SDATE = '$ubtSDate',
                    UBT_EDATE = '$ubtEDate',
                    UBT_TYPE =  '$ubtType'
                WHERE (USER_ID = '$uId' AND SKH_ID = '$sID') OR (USER_ID = '$uId' AND BUS_ID = '$bID')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>