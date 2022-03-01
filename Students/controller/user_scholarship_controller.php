<?php
//updated: 24 Feb 2022
//written by: Andrew O'Brien

include_once('user_scholarship.php');
include_once($_SERVER['DOCUMENT_ROOT'] . "/students/model/user_scholarship_db.php");
include_once('scholarship_controller.php');
include_once('scholarship.php');

class User_ScholarshipController
{
    //helper function for taking all information
    //from a user_scholarship info query (row) and converting 
    //it into a Contact object
    private static function rowToUser_Scholarship($row)
    {
        $user_scholarship = new User_Scholarship(
            $row['USER_ID'],
            $row['SCH_ID']
        );
        return $user_scholarship;
    }

    private static function rowToUser_Scholarship2($row)
    {
        $user_scholarship = new User_Scholarship(
            $row['USER_ID'],
            $row['SCH_ID']
        );
        return $user_scholarship;
    }

    //function to get all user_scholarship in the database
    public static function getAllUser_Scholarships()
    {
        $queryRes = User_ScholarshipDB::getUser_Scholarships();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $user_scholarship = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "user_scholarship")
                $user_scholarship[] = self::rowToUser_Scholarship($row);
            }

            return $user_scholarship;
        } else {
            return false;
        }
    }

    //function to get a specific user_scholarship by their USER_ID 
    public static function getUser_ScholarshipByUserId($USER_ID)
    {
        $queryRes = User_ScholarshipDB::getUser_ScholarshipByUser($USER_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser_Scholarship($queryRes);
        } else {
            return false;
        }
    }
    //function to get a specific user_scholarship by their SCH_ID 
    public static function getUser_ScholarshipBySchId($SCH_ID)
    {
        $queryRes = User_ScholarshipDB::getUser_ScholarshipByScholarship($SCH_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser_Scholarship($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a user_scholarship by their USER_ID  and SCH_ID
    public static function deleteUser_Scholarship($USER_ID, $SCH_ID)
    {
        //no special processing needed - just use the
        //DB function
        return User_ScholarshipDB::deleteUser_Scholarship($USER_ID, $SCH_ID);
    }


    //function to add a user_scholarship to the DB
    public static function addAUser_Scholarship($user_scholarship)
    {
        return User_ScholarshipDB::addUser_Scholarship(
            $user_scholarship->getUSUserId(),
            $user_scholarship->getUSScholarshipId()
        );
    }

    //function to update a user_scholarship's information
    public static function updateAUser_Scholarship($user_scholarship)
    {
        return User_ScholarshipDB::updateUser_Scholarship(
            $user_scholarship->getUSUserId(),
            $user_scholarship->getUSScholarshipId()
        );
    }

    //function to get all user_scholarship in the database
    public static function getUser_ScholarshipForUserId($USER_ID)
    {
        $queryRes = User_ScholarshipDB::getUser_ScholarshipForUser($USER_ID);

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $scholarship = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "user_scholarship")
                $scholarship[] = ScholarshipController::rowToScholarship($row);
            }

            return $scholarship;
        } else {
            return false;
        }
    }

    //function to add a user_scholarship to the DB
    public static function addAUser_Scholarship2($scholarship, $userId)
    {
        return User_ScholarshipDB::addScholarship2(
            $userId,
            $scholarship->getSchName(),
            $scholarship->getSchAmount(),
            $scholarship->getSchDesc(),
            $scholarship->getSchAddId(),
            $scholarship->getSchOrg(),
            $scholarship->getSchVerified()
        );
    }
}
