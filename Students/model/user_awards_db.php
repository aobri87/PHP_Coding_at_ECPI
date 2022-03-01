<?php
//updated: 1 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the user_awards table; provides
//functions for getting all user_awards, getting an individual user_awards, adding a
//user_awards, updating a user_awards, and deleting a user_awards
class User_AwardsDB
{
    //Get all user_awards in the DB; returns false if the
    //database connection fails
    public static function getUser_Awards()
    {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the user_awards
            //table with the categories table to get the role
            //info for the user_awards object
            $query = 'SELECT * FROM user_awards';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific user_awards by their USER_ID
    public static function getUser_AwardByUser($USER_ID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user_awards
                    WHERE USER_ID = '$USER_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    //function to get a specific user_awards by their AWD_ID
    public static function getUser_AwardsByAwd($AWD_ID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user_awards
                    WHERE AWD_ID = '$AWD_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to get a specific user_awards by their AWD_ID
    public static function getUser_AwardsSpecific($uId, $aId, $aDate)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query =
                "SELECT awards.*, user_awards.AWD_DATE
                FROM awards
                LEFT JOIN user_awards ON awards.AWD_ID = user_awards.AWD_ID
                WHERE USER_ID = '$uId' AND user_awards.AWD_ID = '$aId' AND AWD_DATE = '$aDate'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a user_awards by their USER_ID and AWD_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteUser_Awards($USER_ID, $AWD_ID, $AWD_DATE)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM user_awards
                    WHERE USER_ID = '$USER_ID' AND AWD_ID = '$AWD_ID' AND AWD_DATE = '$AWD_DATE'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a user_awards to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addUser_Awards($uId, $aId, $aDate)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - USER_ID is an
            //auto-increment field, so no need to
            //specify it
            $query =
                "INSERT INTO user_awards (USER_ID, AWD_ID, AWD_DATE)
                VALUES ('$uId', '$aId', '$aDate')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a user_awards's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateUser_Awards($uId, $aId, $oldDate, $newDate)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query =
                "UPDATE user_awards SET
                    USER_ID = '$uId',
                    AWD_ID = '$aId',
                    AWD_DATE = '$newDate'
                WHERE USER_ID = '$uId' AND AWD_ID = '$aId' AND AWD_DATE = '$oldDate'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to get all awards info for a user by their USER_ID from the awards table
    public static function getUser_AwardForUser($USER_ID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT awards.*, user_awards.AWD_DATE
                        FROM awards
                        LEFT JOIN user_awards ON awards.AWD_ID = user_awards.AWD_ID
                        WHERE user_awards.USER_ID = '$USER_ID'
                        ORDER BY user_awards.AWD_DATE ASC";

            //return the associative qrray
            return $dbConn->query($query);
        } else {
            return false;
        }
    }
}
