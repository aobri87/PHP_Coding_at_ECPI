<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien
require_once('database.php');

//class for doing queries on the user table; provides
//functions for getting all user, getting an individual user, adding a
//user, updating a user, and deleting a user
class UserDB {
    //Get all user in the DB; returns false if the
    //database connection fails
    public static function getUsers() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the user
            //table with the categories table to get the role
            //info for the user object
            $query = 'SELECT * FROM user
                INNER JOIN roles
                        ON user.ROL_ID = roles.ROL_ID';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific user by their USER_ID
    public static function getUser($USER_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user
                    INNER JOIN roles
                        ON user.ROL_ID = roles.ROL_ID
                    WHERE USER_ID = '$USER_ID'";

            //execute the query
            $result = $dbConn->query($query)or die($dbConn->error);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to get a specific user by their USER_ID
    public static function getUserName($USER_NAME) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user
                    INNER JOIN roles
                        ON user.ROL_ID = roles.ROL_ID
                    WHERE USER_UNAME = '$USER_NAME'";

            //execute the query
            $result = $dbConn->query($query)or die($dbConn->error);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a user by their USER_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteUser($USER_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM user
                    WHERE USER_ID = '$USER_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a user to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addUser($uName, $uPass, $uFName, $uMName, $uLName, $uDOB, $uRace, $uGender, $uRoleId, $uRel, $uAddressId)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - USER_ID is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO user (USER_UNAME, USER_PWORD, USER_FNAME, USER_MNAME, USER_LNAME, USER_DOB, USER_RACE, USER_GENDER, ROL_ID)
                VALUES ('$uName', '$uPass', '$uFName', '$uMName', '$uLName', '$uDOB', '$uRace', '$uGender', '$uRoleId')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a user's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateUser($uId, $uName, $uPass, $uFName, $uMName, $uLName, $uDOB, $uRace, $uGender, $uRoleId, $uRel, $uAddressId)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE user SET
                    USER_UNAME = '$uName',
                    USER_PWORD = '$uPass',
                    USER_FNAME = '$uFName',
                    USER_MNAME = '$uMName',
                    USER_LNAME = '$uLName',
                    USER_DOB = '$uDOB',
                    USER_RACE = '$uRace',
                    USER_GENDER = '$uGender',
                    ROL_ID = '$uRoleId'
                WHERE USER_ID = '$uId'";
            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a user's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateUserAddress($uId, $uAddressId)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE user SET
                    ADD_ID = '$uAddressId'
                WHERE USER_ID = '$uId'";
            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to get a user by their user name
    public static function getUserByUserName($USER_UNAME) {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user
                    INNER JOIN roles
                        ON user.ROL_ID = roles.ROL_ID
                    WHERE user.USER_UNAME = '$USER_UNAME'";

            //execute the query = returns false if
            //no such email found
            $result = $dbConn->query($query);
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}
?>