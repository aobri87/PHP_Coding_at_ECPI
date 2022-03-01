<?php
//updated: 7 Feb 2022
//written by: Andrew O'Brien

include_once('prereq.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/prereq_db.php");

class PrereqController {
    //helper function for taking all information
    //from a prereq info query (row) and converting 
    //it into a Contact object
    private static function rowToPrereq($row) {
        $prereq = new Prereq($row['COURSE'],
            $row['PREREQ_COURSE']);
        return $prereq;
    }

    //function to get all prereq in the database
    public static function getAllPrereqs() {
        $queryRes = PrereqDB::getPrereqs();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $prereq = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "prereq")
                $prereq[] = self::rowToPrereq($row);
            }

            return $prereq;
        } else {
            return false;
        }
    }

    //function to get a specific prereq by their COURSE
    public static function getPrereqByCourseId($COURSE) {
        $queryRes = PrereqDB::getPrereq($COURSE);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToPrereq($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a prereq by their COURSE and PREREQ_COURSE
    public static function deletePrereqById($prereq) {
        //no special processing needed - just use the
        //DB function
        return PrereqDB::deletePrereq(
            $prereq->getPrereqCourse(),
            $prereq->getPrereqPrereq());
    }

    //function to add a prereq to the DB
    public static function addAPrereq($prereq) {
        return PrereqDB::addPrereq(
            $prereq->getPrereqCourse(),
            $prereq->getPrereqPrereq());
    }

    //function to update a prereq's information
    public static function updateAPrereq($prereq) {
        return PrereqDB::updatePrereq(
            $prereq->getPrereqID(),
            $prereq->getPrereqCourse(),
            $prereq->getPrereqPrereq());
    }
}
?>