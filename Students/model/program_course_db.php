<?php
//updated: 4 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the program_course table; provides
//functions for getting all program_course, getting an individual program_course, adding a
//program_course, updating a program_course, and deleting a program_course
class Program_CourseDB {
    //Get all program_course in the DB; returns false if the
    //database connection fails
    public static function getProgram_Courses() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the program_course
            //table with the categories table to get the role
            //info for the program_course object
            $query = 'SELECT * FROM program_course';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific program_course by their PROGRAM_ID
    public static function getProgram_Course($proId) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM program_course
                    WHERE PROGRAM_ID = '$proId'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a program_course by their PROGRAM_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteProgram_Course($proId) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM program_course
                    WHERE PROGRAM_ID = '$proId'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a program_course to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addProgram_Course($proId, $course)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - PROGRAM_ID is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO program_course (PROGRAM_ID, COURSE)
                VALUES ('$proId', '$course')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a program_course's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateProgram_Course($proId, $course)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE program_course SET
                    PROGRAM_ID = '$proId',
                    COURSE = '$course'
                WHERE PROGRAM_ID = '$proId' AND COURSE = '$course'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>