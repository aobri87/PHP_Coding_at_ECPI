<?php
//updated: 1 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the user_school table; provides
//functions for getting all user_school, getting an individual user_school, adding a
//user_school, updating a user_school, and deleting a user_school
class User_SchoolDB {
    //Get all user_school in the DB; returns false if the
    //database connection fails
    public static function getUser_Schools() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the user_school
            //table with the categories table to get the role
            //info for the user_school object
            $query = 'SELECT * FROM user_school';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific user_school by their USER_ID
    public static function getUser_SchoolByUser($USER_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user_school
                    WHERE USER_ID = '$USER_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    //function to get a specific user_school by their SKH_ID
    public static function getUser_SchoolBySchool($SKH_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user_school
                    WHERE SKH_ID = '$SKH_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a user_school by their USER_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteUser_School($USER_ID, $SKH_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM user_school
                    WHERE USER_ID = '$USER_ID' AND SKH_ID = '$SKH_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a user_school to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addUser_School($uId, $cId, $sDate, $eDate, $usType)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - USER_ID is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO user_school (USER_ID, SKH_ID, US_SDATE, US_EDATE, US_TYPE)
                VALUES ('$uId', '$cId', '$sDate', '$eDate', '$usType')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a user_school's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateUser_School($uId, $cId, $sDate, $eDate, $usType)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE user_school SET
                    USER_ID = '$uId',
                    SKH_ID = '$cId',
                    US_SDATE = '$sDate',
                    US_EDATE = '$eDate',
                    US_TYPE =  '$usType'
                WHERE USER_ID = '$bId' AND SKH_ID = 'tID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>