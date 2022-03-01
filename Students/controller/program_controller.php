<?php
//updated: 14 Feb 2022
//written by: Andrew O'Brien

include_once('program.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/program_db.php");

class ProgramController {
    //helper function for taking all information
    //from a program info query (row) and converting 
    //it into a Contact object
    private static function rowToProgram($row) {
        $program = new Program($row['PROGRAM_NAME'],
            $row['PROGRAM_HOURS']);
        $program->setProgramId($row['PROGRAM_ID']);
        return $program;
    }

    //function to get all program in the database
    public static function getAllPrograms() {
        $queryRes = ProgramDB::getPrograms();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $program = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "program")
                $program[] = self::rowToProgram($row);
            }

            return $program;
        } else {
            return false;
        }
    }

    //function to get a specific program by their PROGRAM_ID
    public static function getProgramById($PROGRAM_ID) {
        $queryRes = ProgramDB::getProgram($PROGRAM_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToProgram($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a program by their PROGRAM_ID and COURSE
    public static function deleteProgramById($PROGRAM_ID) {
        //no special processing needed - just use the
        //DB function
        return ProgramDB::deleteProgram($PROGRAM_ID);
    }

    //function to add a program to the DB
    public static function addAProgram($program) {
        return ProgramDB::addProgram(
            $program->getProgramName(),
            $program->getProgramHours());
    }

    //function to update a program's information
    public static function updateAProgram($program) {
        return ProgramDB::updateProgram(
            $program->getProgramID(),
            $program->getProgramName(),
            $program->getProgramHours());
    }
}
?>