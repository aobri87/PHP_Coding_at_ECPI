<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien

include_once('school.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/school_db.php");

class SchoolController {
    //helper function for taking all information
    //from a school info query (row) and converting 
    //it into a Contact object
    private static function rowToSchool($row) {
        $school = new School(
            $row['SKH_NAME'],
            $row['ADD_ID'],
            $row['VERIFIED']);
        $school->setSkhId($row['SKH_ID']);
        return $school;
    }

    //function to get all school in the database
    public static function getAllSchools() {
        $queryRes = SchoolDB::getSchools();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $school = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "school")
                $school[] = self::rowToSchool($row);
            }

            return $school;
        } else {
            return false;
        }
    }

    //function to get a specific school by their SKH_ID 
    public static function getSchoolById($SKH_ID) {
        $queryRes = SchoolDB::getSchool($SKH_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToSchool($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a school by their SKH_ID  and COURSE
    public static function deleteSchoolById($SKH_ID) {
        //no special processing needed - just use the
        //DB function
        return SchoolDB::deleteSchool($SKH_ID);
    }

    //function to add a school to the DB
    public static function addASchool($school) {
        return SchoolDB::addSchool(
            $school->getSkhName(),
            $school->getSkhAddId(),
            $school->getSkhVerified());
    }

    //function to update a school's information
    public static function updateASchool($school) {
        return SchoolDB::updateSchool(
            $school->getSkhId(),
            $school->getSkhName(),
            $school->getSkhAddId(),
            $school->getSkhVerified());
    }
}
?>