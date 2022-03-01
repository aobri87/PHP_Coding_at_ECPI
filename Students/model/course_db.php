<?php
//updated: 4 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the course table; provides
//functions for getting all course, getting an individual course, adding a
//course, updating a course, and deleting a course
class CourseDB {
    //Get all course in the DB; returns false if the
    //database connection fails
    public static function getCourses() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the course
            //table with the categories table to get the role
            //info for the course object
            $query = 'SELECT * FROM course';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific course by their COURSE
    public static function getCourse($cor) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM course
                    WHERE COURSE = '$cor'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a course by their COURSE
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteCourse($cor) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM course
                    WHERE COURSE = '$cor'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a course to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addCourse($cor, $top, $corHours)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - COURSE is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO course (COURSE, TOPIC, CREDIT_HOURS)
                VALUES ('$cor', '$top', '$corHours')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a course's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateCourse($cor, $top, $corHours)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE course SET
                    TOPIC = '$top',
                    CREDIT_HOURS = '$corHours'
                WHERE COURSE = '$cor'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>