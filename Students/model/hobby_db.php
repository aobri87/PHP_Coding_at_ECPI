<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the hobby table; provides
//functions for getting all hobby, getting an individual hobby, adding a
//hobby, updating a hobby, and deleting a hobby
class HobbyDB {
    //Get all hobbies in the DB; returns false if the
    //database connection fails
    public static function getHobbies() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the hobby
            //table with the categories table to get the role
            //info for the hobby object
            $query = 'SELECT * FROM hobby';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific hobby by their HOB_ID
    public static function getHobby($hobId) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM hobby
                    WHERE HOB_ID = '$hobId'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a hobby by their HOB_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteHobby($hobId) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM hobby
                    WHERE HOB_ID = '$hobId'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a hobby to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addHobby($hobName, $hobDesc, $hobVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - HOB_ID is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO hobby (HOB_NAME, HOB_DESC, VERIFIED)
                VALUES ('$hobName', '$hobDesc', '$hobVerified')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a hobby's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateHobby($hobId, $hobName, $hobDesc, $hobVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE hobby SET
                    HOB_NAME = '$hobName',
                    HOB_DESC = '$hobDesc',
                    VERIFIED = '$hobVerified'
                WHERE HOB_ID = '$hobId'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>