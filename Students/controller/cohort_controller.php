<?php
//updated: 7 Feb 2022
//written by: Andrew O'Brien

include_once('cohort.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/cohort_db.php");

class CohortController {
    //helper function for taking all information
    //from a cohort info query (row) and converting 
    //it into a Contact object
    private static function rowToCohort($row) {
        $cohort = new Cohort($row['COHORT_NAME'],
            $row['COHORT_DESC']);
        $cohort->setCohortId($row['COHORT_ID']);
        return $cohort;
    }

    //function to get all cohort in the database
    public static function getAllCohorts() {
        $queryRes = CohortDB::getCohorts();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $cohort = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "cohort")
                $cohort[] = self::rowToCohort($row);
            }

            return $cohort;
        } else {
            return false;
        }
    }

    //function to get a specific cohort by their COHORT_ID
    public static function getCohortById($COHORT_ID) {
        $queryRes = CohortDB::getCohort($COHORT_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToCohort($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a cohort by their COHORT_ID
    public static function deleteCohortById($COHORT_ID) {
        //no special processing needed - just use the
        //DB function
        return CohortDB::deleteCohort($COHORT_ID);
    }

    //function to add a cohort to the DB
    public static function addACohort($cohort) {
        return CohortDB::addCohort(
            $cohort->getCohortName(),
            $cohort->getCohortDesc());
    }

    //function to update a cohort's information
    public static function updateACohort($cohort) {
        return CohortDB::updateCohort(
            $cohort->getCohortID(),
            $cohort->getCohortName(),
            $cohort->getCohortDesc());
    }
}
?>