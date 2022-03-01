<?php
//updated: 24 Feb 2022
//written by: Andrew O'Brien

include_once('awards.php');
include_once($_SERVER['DOCUMENT_ROOT'] . "/students/model/awards_db.php");

class AwardsController
{
    //helper function for taking all information
    //from a award info query (row) and converting 
    //it into a Contact object
    private static function rowToAward($row)
    {
        $award = new Awards(
            $row['AWD_NAME'],
            $row['AWD_ORGANIZATION'],
            $row['AWD_DESC'],
            $row['VERIFIED']
        );
        $award->setAwdId($row['AWD_ID']);
        return $award;
    }

    //function to get all award in the database
    public static function getAllAwards()
    {
        $queryRes = AwardsDB::getAwards();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $award = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "award")
                $award[] = self::rowToAward($row);
            }

            return $award;
        } else {
            return false;
        }
    }

    //function to get all verified award in the database
    public static function getAllVeriAwards($uId)
    {
        $queryRes = AwardsDB::getVeriAwards($uId);

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $award = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "award")
                $award[] = self::rowToAward($row);
            }

            return $award;
        } else {
            return false;
        }
    }

    //function to get a specific award by their AWD_ID
    public static function getAwardById($AWD_ID)
    {
        $queryRes = AwardsDB::getAward($AWD_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToAward($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a award by their AWD_ID
    public static function deleteAwardById($AWD_ID)
    {
        //no special processing needed - just use the
        //DB function
        return AwardsDB::deleteAward($AWD_ID);
    }

    //function to add a award to the DB
    public static function addAAward($award)
    {
        $queryRes = AwardsDB::addAward(
            $award->getAwdName(),
            $award->getAwdOrg(),
            $award->getAwdDesc(),
            $award->getAwdVerified()
        );
        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToAward($queryRes);
        } else {
            return false;
        }
    }

    //function to update a award's information
    public static function updateAAward($award)
    {
        return AwardsDB::updateAward(
            $award->getAwdId(),
            $award->getAwdName(),
            $award->getAwdOrg(),
            $award->getAwdDesc(),
            $award->getAwdVerified()
        );
    }
}
