<?php
//updated: 9 Feb 2022
//written by: Andrew O'Brien

include_once('user_course_program.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/user_course_program_db.php");

class User_Course_ProgramController {
    //helper function for taking all information
    //from a user_course_program info query (row) and converting 
    //it into a Contact object
    private static function rowToUser_Course_Program($row) {
        $user_course_program = new User_Course_Program($row['USER_ID'],
            $row['COURSE'],
            $row['PROGRAM_ID'],
            $row['COHORT_ID'],
            $row['TERM'],
            $row['SCHEDULE'],
            $row['GRADE'],
            $row['REMARKS']);
        return $user_course_program;
    }

    //function to get all user_course_program in the database
    public static function getAllUser_Course_Programs() {
        $queryRes = User_Course_ProgramDB::getUser_Course_Programs();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $user_course_program = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "user_course_program")
                $user_course_program[] = self::rowToUser_Course_Program($row);
            }

            return $user_course_program;
        } else {
            return false;
        }
    }

    //function to get a specific user_course_program by their USER_ID 
    public static function getAUser_Course_Program($USER_ID) {
        $queryRes = User_Course_ProgramDB::getUser_Course_Program($USER_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser_Course_Program($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a user_course_program by their USER_ID  and COURSE
    public static function deleteAUser_Course_Program($USER_ID) {
        //no special processing needed - just use the
        //DB function
        return User_Course_ProgramDB::deleteUser_Course_Program($USER_ID);
    }


    //function to add a user_course_program to the DB
    public static function addAUser_Course_Program($user_course_program) {
        return User_Course_ProgramDB::addUser_Course_Program(
            $user_course_program->getUCPUserId(),
            $user_course_program->getUCPCourse(),
            $user_course_program->getUCPProgramId(),
            $user_course_program->getUCPCohortId(),
            $user_course_program->getUCPTerm(),
            $user_course_program->getUCPSchedule(),
            $user_course_program->getUCPGrade(),
            $user_course_program->getUCPRemarks());
    }

    //function to update a user_course_program's information
    public static function updateAUser_Course_Program($user_course_program) {
        return User_Course_ProgramDB::updateUser_Course_Program(
            $user_course_program->getUCPUserId(),
            $user_course_program->getUCPCourse(),
            $user_course_program->getUCPProgramId(),
            $user_course_program->getUCPCohortId(),
            $user_course_program->getUCPTerm(),
            $user_course_program->getUCPSchedule(),
            $user_course_program->getUCPGrade(),
            $user_course_program->getUCPRemarks());
    }
}
?>