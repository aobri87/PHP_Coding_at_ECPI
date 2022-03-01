<?php
//updated: 7 Feb 2022
//written by: Andrew O'Brien

include_once('program_course.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/program_course_db.php");

class Program_CourseController {
    //helper function for taking all information
    //from a program_course info query (row) and converting 
    //it into a Contact object
    private static function rowToProgram_Course($row) {
        $program_course = new Program_Course($row['PROGRAM_ID'],
            $row['COURSE']);
        return $program_course;
    }

    //function to get all program_course in the database
    public static function getAllProgram_Courses() {
        $queryRes = Program_CourseDB::getProgram_Courses();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $program_course = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "program_course")
                $program_course[] = self::rowToProgram_Course($row);
            }

            return $program_course;
        } else {
            return false;
        }
    }

    //function to get a specific program_course by their PROGRAM_ID
    public static function getProgram_CourseByCourseId($PROGRAM_ID) {
        $queryRes = Program_CourseDB::getProgram_Course($PROGRAM_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToProgram_Course($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a program_course by their PROGRAM_ID and COURSE
    public static function deleteProgram_CourseById($PROGRAM_ID) {
        //no special processing needed - just use the
        //DB function
        return Program_CourseDB::deleteProgram_Course($PROGRAM_ID);
    }

    //function to add a program_course to the DB
    public static function addAProgram_Course($program_course) {
        return Program_CourseDB::addProgram_Course(
            $program_course->getPCProgramId(),
            $program_course->getPCCourse());
    }

    //function to update a program_course's information
    public static function updateAProgram_Course($program_course) {
        return Program_CourseDB::updateProgram_Course(
            $program_course->getPCProgramId(),
            $program_course->getPCCourse());
    }
}
?>