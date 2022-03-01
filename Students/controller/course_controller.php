<?php
//updated: 14 Feb 2022
//written by: Andrew O'Brien

include_once('course.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/course_db.php");

class CourseController {
    //helper function for taking all information
    //from a course info query (row) and converting 
    //it into a Contact object
    private static function rowToCourse($row) {
        $course = new Course(
            $row['COURSE'],
            $row['TOPIC'],
            $row['CREDIT_HOURS']);
        return $course;
    }

    //function to get all course in the database
    public static function getAllCourses() {
        $queryRes = CourseDB::getCourses();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $course = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "course")
                $course[] = self::rowToCourse($row);
            }

            return $course;
        } else {
            return false;
        }
    }

    //function to get a specific course by their COURSE
    public static function getCourseById($COURSE) {
        $queryRes = CourseDB::getCourse($COURSE);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToCourse($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a course by their COURSE
    public static function deleteCourseById($COURSE) {
        //no special processing needed - just use the
        //DB function
        return CourseDB::deleteCourse($COURSE);
    }

    //function to add a course to the DB
    public static function addACourse($course) {
        return CourseDB::addCourse(
            $course->getCourseID(),
            $course->getCourseTopic(),
            $course->getCourseHours());
    }

    //function to update a course's information
    public static function updateACourse($course) {
        return CourseDB::updateCourse(
            $course->getCourseID(),
            $course->getCourseTopic(),
            $course->getCourseHours());
    }
}
?>