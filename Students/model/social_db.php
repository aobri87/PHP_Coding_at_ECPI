<?php
//updated: 1 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the social table; provides
//functions for getting all social, getting an individual social, adding a
//social, updating a social, and deleting a social
class SocialDB {
    //Get all social in the DB; returns false if the
    //database connection fails
    public static function getSocials() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the social
            //table with the categories table to get the role
            //info for the social object
            $query = 'SELECT * FROM social';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific social by their SOC_ID
    public static function getSocial($SOC_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM social
                    WHERE SOC_ID = '$SOC_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a social by their SOC_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteSocial($SOC_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM social
                    WHERE SOC_ID = '$SOC_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a social to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addSocial($socName, $socWeb, $socVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - SOC_ID is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO social (SOC_NAME, SOC_WEB, VERIFIED)
                VALUES ('$socName', '$socWeb', '$socVerified')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a social's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateSocial($socId, $socName, $socWeb, $socVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE social SET
                    SOC_NAME = '$socName',
                    SOC_WEB = '$socWeb',
                    VERIFIED = '$socVerified'
                WHERE SOC_ID = '$socId'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>