<?php
//updated: 1 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the user_social table; provides
//functions for getting all user_social, getting an individual user_social, adding a
//user_social, updating a user_social, and deleting a user_social
class User_SocialDB {
    //Get all user_social in the DB; returns false if the
    //database connection fails
    public static function getUser_Socials() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the user_social
            //table with the categories table to get the role
            //info for the user_social object
            $query = 'SELECT * FROM user_social';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific user_social by their USER_ID
    public static function getUser_SocialByUser($USER_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user_social
                    WHERE USER_ID = '$USER_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    //function to get a specific user_social by their SOC_ID
    public static function getUser_SocialBySocial($SOC_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user_social
                    WHERE SOC_ID = '$SOC_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a user_social by their USER_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteUser_Social($USER_ID, $SOC_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM user_social
                    WHERE USER_ID = '$USER_ID' AND SOC_ID = 'SOC_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a user_social to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addUser_Social($uId, $sId, $usID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - USER_ID is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO user_social (USER_ID, SOC_ID, USOC_ID)
                VALUES ('$uId', '$sId', '$usID')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a user_social's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateUser_Social($uId, $sId, $usID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE user_social SET
                    USER_ID = '$uId',
                    SOC_ID = '$sId',
                    USOC_ID = '$usID'
                WHERE USER_ID = '$bId' AND SOC_ID = 'tID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>