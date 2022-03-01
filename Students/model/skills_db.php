<?php
//updated: 1 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the skills table; provides
//functions for getting all skills, getting an individual skills, adding a
//skills, updating a skills, and deleting a skills
class SkillsDB {
    //Get all skills in the DB; returns false if the
    //database connection fails
    public static function getSkills() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the skills
            //table with the categories table to get the role
            //info for the skills object
            $query = 'SELECT * FROM skills';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific skills by their SKL_ID
    public static function getSkill($SKL_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM skills
                    WHERE SKL_ID = '$SKL_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a skills by their SKL_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteSkills($SKL_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM skills
                    WHERE SKL_ID = '$SKL_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a skills to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addSkills($sklName, $sklDesc, $sklCat, $sklSubCat, $sklVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - SKL_ID is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO skills (SKL_NAME, SKL_DESC, SKL_CAT, SKL_SUB_CAT, VERIFIED)
                VALUES ('$sklName', '$sklDesc', '$sklCat', '$sklSubCat', '$sklVerified')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a skills's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateSkills($sklId, $sklName, $sklDesc, $sklCat, $sklSubCat, $sklVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE skills SET
                    SKL_NAME = '$sklName',
                    SKL_DESC = '$sklDesc',
                    SKL_CAT = '$sklCat',
                    SKL_SUB_CAT = '$sklSubCat',
                    VERIFIED = '$sklVerified'
                WHERE SKL_ID = '$sklId'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>