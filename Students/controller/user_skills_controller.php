<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien

include_once('user_skills.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/user_skills_db.php");

class User_SkillsController {
    //helper function for taking all information
    //from a user_skills info query (row) and converting 
    //it into a Contact object
    private static function rowToUser_Skills($row) {
        $user_skills = new User_Skills($row['USER_ID'],
            $row['SKL_ID'], $row['US_HOURS']);
        return $user_skills;
    }

    //function to get all user_skills in the database
    public static function getAllUser_Skills() {
        $queryRes = User_SkillsDB::getUser_Skills();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $user_skills = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "user_skills")
                $user_skills[] = self::rowToUser_Skills($row);
            }

            return $user_skills;
        } else {
            return false;
        }
    }

    //function to get a specific user_skills by their USER_ID 
    public static function getUser_SkillsByUserId($USER_ID) {
        $queryRes = User_SkillsDB::getUser_SkillsByUser($USER_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser_Skills($queryRes);
        } else {
            return false;
        }
    }
    //function to get a specific user_skills by their SKL_ID 
    public static function getUser_SkillsBySchId($SKL_ID) {
        $queryRes = User_SkillsDB::getUser_SkillsByScholarship($SKL_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser_Skills($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a user_skills by their USER_ID  and SKL_ID
    public static function deleteUser_Skills($USER_ID, $SKL_ID) {
        //no special processing needed - just use the
        //DB function
        return User_SkillsDB::deleteUser_Skills($USER_ID, $SKL_ID);
    }


    //function to add a user_skills to the DB
    public static function addAUser_Skills($user_skills) {
        return User_SkillsDB::addUser_Skills(
            $user_skills->getUSUserId(),
            $user_skills->getUSScholarshipId(),
            $user_skills->getUSKLHours());
    }

    //function to update a user_skills's information
    public static function updateAUser_Skills($user_skills) {
        return User_SkillsDB::updateUser_Skills(
            $user_skills->getUSUserId(),
            $user_skills->getUSScholarshipId(),
            $user_skills->getUSKLHours());
    }
}
?>