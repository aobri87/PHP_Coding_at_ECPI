<?php
//updated: 7 Feb 2022
//written by: Andrew O'Brien

include_once('course_categoryt.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/course_categoryt_db.php");

class Course_CategoryController {
    //helper function for taking all information
    //from a course_categoryt info query (row) and converting 
    //it into a Contact object
    private static function rowToCourse_Category($row) {
        $course_category = new Course_Category($row['COURSE_CATEGORY'],
            $row['COURSE']);
        return $course_category;
    }

    //function to get all course_categoryt in the database
    public static function getAllCourse_Categories() {
        $queryRes = Course_CategoryDB::getCourse_Categories();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $course_category = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "course_categoryt")
                $course_category[] = self::rowToCourse_Category($row);
            }

            return $course_category;
        } else {
            return false;
        }
    }

    //function to get a specific course_categoryt by their COHORT_ID
    public static function getCourse_CategoryByCat($corCat) {
        $queryRes = Course_CategoryDB::getCourse_Category($corCat);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToCourse_Category($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a course_categoryt by their COHORT_ID
    public static function deleteCourse_CategoryByCat($corCat) {
        //no special processing needed - just use the
        //DB function
        return Course_CategoryDB::deleteCourse_Category($corCat);
    }

    //function to add a course_categoryt to the DB
    public static function addACourse_Category($course_category) {
        return Course_CategoryDB::addCourse_Category(
            $course_category-getCCCategory(),
            $course_category->getCCCourse());
    }

    //function to update a course_categoryt's information
    public static function updateACourse_Category($course_category) {
        return Course_CategoryDB::updateCourse_Category(
            $course_category-getCCCategory(),
            $course_category->getCCCourse());
    }
}
?>