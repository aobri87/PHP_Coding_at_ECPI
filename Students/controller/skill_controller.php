<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien

include_once('skills.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/skills_db.php");

class SkillsController {
    //helper function for taking all information
    //from a skills info query (row) and converting 
    //it into a Contact object
    private static function rowToSkills($row) {
        $skills = new Skills(
            $row['SKL_NAME'],
            $row['SKL_DESC'],
            $row['SKL_CAT'],
            $row['SKL_SUB_CAT'],
            $row['VERIFIED']);
        $skills->setSklId($row['SKL_ID']);
        return $skills;
    }

    //function to get all skills in the database
    public static function getAllSkills() {
        $queryRes = SkillsDB::getSkills();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $skills = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "skills")
                $skills[] = self::rowToSkills($row);
            }

            return $skills;
        } else {
            return false;
        }
    }

    //function to get a specific skills by their SKL_ID 
    public static function getSkillsById($SKL_ID) {
        $queryRes = SkillsDB::getSkill($SKL_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToSkills($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a skills by their SKL_ID  and COURSE
    public static function deleteSkillsById($SKL_ID) {
        //no special processing needed - just use the
        //DB function
        return SkillsDB::deleteSkills($SKL_ID);
    }

    //function to add a skills to the DB
    public static function addASkills($skills) {
        return SkillsDB::addSkills(
            $skills->getSklName(),
            $skills->getSklDesc(),
            $skills->getSklCat(),
            $skills->getSklSubCat(),
            $skills->getSklVerified());
    }

    //function to update a skills's information
    public static function updateASkills($skills) {
        return SkillsDB::updateSkills(
            $skills->getSklId(),
            $skills->getSklName(),
            $skills->getSklDesc(),
            $skills->getSklCat(),
            $skills->getSklSubCat(),
            $skills->getSklVerified());
    }
}
?>