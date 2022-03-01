<?php
//updated: 4 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the user_course_program table; provides
//functions for getting all user_course_program, getting an individual user_course_program, adding a
//user_course_program, updating a user_course_program, and deleting a user_course_program
class User_Course_ProgramDB {
    //Get all user_course_program in the DB; returns false if the
    //database connection fails
    public static function getUser_Course_Programs() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the user_course_program
            //table with the categories table to get the role
            //info for the user_course_program object
            $query = 'SELECT * FROM user_course_program';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific user_course_program by their USER_ID
    public static function getUser_Course_Program($uId) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user_course_program
                    WHERE USER_ID = '$uId'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a user_course_program by their USER_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteUser_Course_Program($uId) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM user_course_program
                    WHERE USER_ID = '$uId'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a user_course_program to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addUser_Course_Program($uId, $course, $pId, $cId, $term, $sch, $grade, $remark)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - USER_ID is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO user_course_program (USER_ID, COURSE, PROGRAM_ID, COHORT_ID, TERM, SCHEDULE, GRADE, REMARKS)
                VALUES ('$uId', '$course', '$pId', '$cId', '$term', '$sch', '$grade', '$remark')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a user_course_program's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateUser_Course_Program($uId, $course, $pId, $cId, $term, $sch, $grade, $remark)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE user_course_program SET
                    COURSE = '$course'
                    PROGRAM_ID = '$pId, 
                    COHORT_ID = '$cId', 
                    TERM = '$term', 
                    SCHEDULE = '$sch', 
                    GRADE = '$grade', 
                    REMARKS = '$remark'
                WHERE USER_ID = '$uId'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>