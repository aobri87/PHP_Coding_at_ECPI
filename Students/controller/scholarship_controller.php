<?php
//updated: 24 Feb 2022
//written by: Andrew O'Brien

include_once('scholarship.php');
include_once($_SERVER['DOCUMENT_ROOT'] . "/students/model/scholarship_db.php");

class ScholarshipController
{
    //helper function for taking all information
    //from a scholarship info query (row) and converting 
    //it into a Contact object
    public static function rowToScholarship($row)
    {
        $scholarship = new Scholarship(
            $row['SCH_NAME'],
            $row['SCH_AMOUNT'],
            $row['SCH_DESC'],
            $row['ADD_ID'],
            $row['SCH_ORG'],
            $row['VERIFIED']
        );
        $scholarship->setSchId($row['SCH_ID']);
        return $scholarship;
    }

    //function to get all scholarship in the database
    public static function getAllScholarships()
    {
        $queryRes = ScholarshipDB::getScholarships();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $scholarship = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "scholarship")
                $scholarship[] = self::rowToScholarship($row);
            }

            return $scholarship;
        } else {
            return false;
        }
    }

    //function to get all scholarship in the database
    public static function getAllVeriScholarships($uId)
    {
        $queryRes = ScholarshipDB::getVeriScholarships($uId);

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $scholarship = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "scholarship")
                $scholarship[] = self::rowToScholarship($row);
            }

            return $scholarship;
        } else {
            return false;
        }
    }

    //function to get a specific scholarship by their SCH_ID 
    public static function getScholarshipById($SCH_ID)
    {
        $queryRes = ScholarshipDB::getScholarship($SCH_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToScholarship($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a scholarship by their SCH_ID  and COURSE
    public static function deleteScholarshipById($SCH_ID)
    {
        //no special processing needed - just use the
        //DB function
        return ScholarshipDB::deleteScholarship($SCH_ID);
    }

    //function to add a scholarship to the DB
    public static function addAScholarship($scholarship)
    {
        return ScholarshipDB::addScholarship(
            $scholarship->getSchName(),
            $scholarship->getSchAmount(),
            $scholarship->getSchDesc(),
            $scholarship->getSchAddId(),
            $scholarship->getSchOrg(),
            $scholarship->getSchVerified()
        );
    }

    //function to update a scholarship's information
    public static function updateAScholarship($scholarship)
    {
        return ScholarshipDB::updateScholarship(
            $scholarship->getSchId(),
            $scholarship->getSchName(),
            $scholarship->getSchAmount(),
            $scholarship->getSchDesc(),
            $scholarship->getSchAddId(),
            $scholarship->getSchOrg(),
            $scholarship->getSchVerified()
        );
    }
}
