<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the user_skills table; provides
//functions for getting all user_skills, getting an individual user_skills, adding a
//user_skills, updating a user_skills, and deleting a user_skills
class User_SkillsDB {
    //Get all user_skills in the DB; returns false if the
    //database connection fails
    public static function getUser_Skills() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the user_skills
            //table with the categories table to get the role
            //info for the user_skills object
            $query = 'SELECT * FROM user_skills';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific user_skills by their USER_ID
    public static function getUser_SkillByUser($USER_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user_skills
                    WHERE USER_ID = '$USER_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    //function to get a specific user_skills by their SKL_ID
    public static function getUser_SkillBySkill($SKL_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user_skills
                    WHERE SKL_ID = '$SKL_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a user_skills by their USER_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteUser_Skill($USER_ID, $SKL_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM user_skills
                    WHERE USER_ID = '$USER_ID' AND SKL_ID = '$SKL_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a user_skills to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addUser_Skill($uID, $sID, $usHrs)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - USER_ID is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO user_skills (USER_ID, SKL_ID, US_HOURS)
                VALUES ('$uID', '$sID', '$usHrs')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a user_skills's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateUser_Skill($uID, $sID, $usHrs)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE user_skills SET
                    USER_ID = '$uID',
                    SKL_ID = '$sID',
                    US_HOURS = '$usHrs'
                WHERE USER_ID = '$uId' AND SKL_ID = '$sID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>