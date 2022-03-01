<?php
//updated: 24 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the user_scholarship table; provides
//functions for getting all user_scholarship, getting an individual user_scholarship, adding a
//user_scholarship, updating a user_scholarship, and deleting a user_scholarship
class User_ScholarshipDB
{
    //Get all user_scholarship in the DB; returns false if the
    //database connection fails
    public static function getUser_Scholarships()
    {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the user_scholarship
            //table with the categories table to get the role
            //info for the user_scholarship object
            $query = 'SELECT * FROM user_scholarship';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific user_scholarship by their USER_ID
    public static function getUser_ScholarshipByUser($USER_ID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user_scholarship
                    WHERE USER_ID = '$USER_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    //function to get a specific user_scholarship by their SCH_ID
    public static function getUser_ScholarshipByScholarship($SCH_ID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user_scholarship
                    WHERE SCH_ID = '$SCH_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a user_scholarship by their USER_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteUser_Scholarship($USER_ID, $SCH_ID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM user_scholarship
                    WHERE USER_ID = '$USER_ID' AND SCH_ID = $SCH_ID";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a user_scholarship to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addUser_Scholarship($uID, $sID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - USER_ID is an
            //auto-increment field, so no need to
            //specify it
            $query =
                "INSERT INTO user_scholarship (USER_ID, SCH_ID)
                VALUES ('$uID', '$sID')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a user_scholarship's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateUser_Scholarship($uId, $sID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query =
                "UPDATE user_scholarship SET
                    USER_ID = '$uId',
                    SCH_ID = '$sID'
                WHERE USER_ID = '$uId' AND SCH_ID = '$sID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to get all scholarship info for a user by their USER_ID from the scholarship table
    public static function getUser_ScholarshipForUser($USER_ID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT scholarship.*
                        FROM scholarship
                        LEFT JOIN user_scholarship ON scholarship.SCH_ID = user_scholarship.SCH_ID
                        WHERE user_scholarship.USER_ID = '$USER_ID'
                        ORDER BY scholarship.SCH_NAME ASC";

            //return the associative qrray
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to add a scholarship to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addScholarship2($uID, $schName, $schAmount, $schDesc, $schAddId, $schOrg, $schVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - SCH_ID is an
            //auto-increment field, so no need to
            //specify it
            $query =
                "INSERT INTO scholarship (SCH_NAME, SCH_AMOUNT, SCH_DESC, SCH_ORG)
                VALUES ('$schName', '$schAmount', '$schDesc', '$schOrg');";
            $query2 =
                "INSERT INTO user_scholarship (USER_ID, SCH_ID)
                VALUES ('$uID', (SELECT SCH_ID FROM scholarship where SCH_ID = LAST_INSERT_ID()));";

            //execute the query, returning status
            $process = $dbConn->query($query);
            return $dbConn->query($query2) === TRUE;
        } else {
            return false;
        }
    }
}
