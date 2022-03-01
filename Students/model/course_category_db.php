<?php
//updated: 4 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the course_category table; provides
//functions for getting all course_category, getting an individual course_category, adding a
//course_category, updating a course_category, and deleting a course_category
class Course_CategoryDB {
    //Get all course_category in the DB; returns false if the
    //database connection fails
    public static function getCourse_Categories() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the course_category
            //table with the categories table to get the role
            //info for the course_category object
            $query = 'SELECT * FROM course_category';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific course_category by their COURSE_CATEGORY
    public static function getCourse_Category($corCat) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM course_category
                    WHERE COURSE_CATEGORY = '$corCat'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a course_category by their COURSE_CATEGORY
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteCourse_Category($corCat) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM course_category
                    WHERE COURSE_CATEGORY = '$corCat'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a course_category to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addCourse_Category($corCat, $course)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - COURSE_CATEGORY is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO course_category (COURSE_CATEGORY, COURSE)
                VALUES ('$corCat', '$course')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a course_category's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateCourse_Category($corCat, $course)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE course_category SET
                    COURSE_CATEGORY = '$corCat',
                    COURSE = '$course'
                WHERE COURSE_CATEGORY = '$proId' AND COURSE = '$course'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>