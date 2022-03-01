<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the task table; provides
//functions for getting all task, getting an individual task, adding a
//task, updating a task, and deleting a task
class TaskDB {
    //Get all task in the DB; returns false if the
    //database connection fails
    public static function getTasks() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the task
            //table with the categories table to get the role
            //info for the task object
            $query = 'SELECT * FROM task';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific task by their TSK_ID
    public static function getTask($TSK_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM task
                    WHERE TSK_ID = '$TSK_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a task by their TSK_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteTask($TSK_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM task
                    WHERE TSK_ID = '$TSK_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a task to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addTask($tName, $tDesc, $tCat, $tSubCat, $tVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - TSK_ID is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO task (TSK_NAME, TSK_DESC, TSK_CAT, TSK_SUB_CAT, VERIFIED)
                VALUES ('$tName', '$tDesc', '$tCat', '$tSubCat', '$tVerified')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a task's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateTask($tId, $tName, $tDesc, $tCat, $tSubCat, $tVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE task SET
                    TSK_NAME = '$tName',
                    TSK_DESC = '$tDesc',
                    TSK_CAT = '$tCat',
                    TSK_SUB_CAT = '$tSubCat',
                    VERIFIED = '$tVerified'
                WHERE TSK_ID = '$tId'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>