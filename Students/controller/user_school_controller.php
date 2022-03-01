<?php
//updated: 9 Feb 2022
//written by: Andrew O'Brien

include_once('user_school.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/user_school_db.php");

class User_SchoolController {
    //helper function for taking all information
    //from a user_school info query (row) and converting 
    //it into a Contact object
    private static function rowToUser_School($row) {
        $user_school = new User_School($row['USER_ID'],
            $row['SKH_ID'],
            $row['US_SDATE'],
            $row['US_EDATE'],
            $row['US_TYPE']);
        return $user_school;
    }

    //function to get all user_school in the database
    public static function getAllUser_Schools() {
        $queryRes = User_SchoolDB::getUser_Schools();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $user_school = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "user_school")
                $user_school[] = self::rowToUser_School($row);
            }

            return $user_school;
        } else {
            return false;
        }
    }

    //function to get a specific user_school by their USER_ID 
    public static function getUser_SchoolByUserId($USER_ID) {
        $queryRes = User_SchoolDB::getUser_SchoolByUser($USER_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser_School($queryRes);
        } else {
            return false;
        }
    }
    //function to get a specific user_school by their SKH_ID 
    public static function getUser_SchoolByCertId($SKH_ID) {
        $queryRes = User_SchoolDB::getUser_SchoolByCert($SKH_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser_School($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a user_school by their USER_ID  and SKH_ID
    public static function deleteUser_School($USER_ID, $SKH_ID) {
        //no special processing needed - just use the
        //DB function
        return User_SchoolDB::deleteUser_School($USER_ID, $SKH_ID);
    }


    //function to add a user_school to the DB
    public static function addAUser_School($user_school) {
        return User_SchoolDB::addUser_School(
            $user_school->getUSKHUserId(),
            $user_school->getUSKHSchoolId(),
            $user_school->getUSKHStartDate(),
            $user_school->getUSKHEndDate(),
            $user_school->getUSKHType());
    }

    //function to update a user_school's information
    public static function updateAUser_School($user_school) {
        return User_SchoolDB::updateUser_School(
            $user_school->getUSKHUserId(),
            $user_school->getUSKHSchoolId(),
            $user_school->getUSKHStartDate(),
            $user_school->getUSKHEndDate(),
            $user_school->getUSKHType());
    }
}
?>