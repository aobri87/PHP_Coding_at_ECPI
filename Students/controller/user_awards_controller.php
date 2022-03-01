<?php
//updated: 17 Feb 2022
//written by: Andrew O'Brien
include_once('awards.php');
include_once($_SERVER['DOCUMENT_ROOT'] . "/students/model/awards_db.php");
include_once('user_awards.php');
include_once($_SERVER['DOCUMENT_ROOT'] . "/students/model/user_awards_db.php");

class User_AwardsController
{
    //helper function for taking all information
    //from a user_awards info query (row) and converting 
    //it into a User_Awards object
    private static function rowToUser_Awards($row)
    {
        $user_awards = new User_Awards(
            $row['USER_ID'],
            $row['AWD_ID'],
            $row['AWD_DATE']
        );
        return $user_awards;
    }
    //helper function for taking all information
    //from a award info query (row) and converting 
    //it into a Awards object
    private static function rowToAward($row)
    {
        $award = new Award(
            $row['AWD_NAME'],
            $row['AWD_ORGANIZATION'],
            $row['AWD_DESC'],
            $row['AWD_DATE'],
            $row['VERIFIED']
        );
        $award->setAwd2Id($row['AWD_ID']);
        return $award;
    }
    //function to get all user_awards in the database
    public static function getAllUser_Awards()
    {
        $queryRes = User_AwardsDB::getUser_Awards();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $user_awards = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "user_awards")
                $user_awards[] = self::rowToUser_Awards($row);
            }

            return $user_awards;
        } else {
            return false;
        }
    }

    //function to get a specific user_awards by their USER_ID 
    public static function getUser_AwardsByUserId($USER_ID)
    {
        $queryRes = User_AwardsDB::getUser_AwardByUser($USER_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser_Awards($queryRes);
        } else {
            return false;
        }
    }
    //function to get a specific user_awards by their AWD_ID 
    public static function getUser_AwardsByAwdId($AWD_ID)
    {
        $queryRes = User_AwardsDB::getUser_AwardsByAwd($AWD_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser_Awards($queryRes);
        } else {
            return false;
        }
    }
    //function to get a specific user_awards by their USER_ID, AWD_ID and AWD_DATE
    public static function getUser_AwardsForSpecific($USER_ID, $AWD_ID, $AWD_DATE)
    {
        $queryRes = User_AwardsDB::getUser_AwardsSpecific($USER_ID, $AWD_ID, $AWD_DATE);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToAward($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a user_awards by their USER_ID  and AWD_ID
    public static function deleteUser_Awards($USER_ID, $AWD_ID, $AWD_DATE)
    {
        //no special processing needed - just use the
        //DB function
        return User_AwardsDB::deleteUser_Awards($USER_ID, $AWD_ID, $AWD_DATE);
    }


    //function to add a user_awards to the DB
    public static function addAUser_Awards($user_awards)
    {
        return User_AwardsDB::addUser_Awards(
            $user_awards->getUAUserId(),
            $user_awards->getUAAwdId(),
            $user_awards->getUAAwdDate()
        );
    }

    //function to update a user_awards's information
    public static function updateAUser_Awards($user_awards, $newDate)
    {
        return User_AwardsDB::updateUser_Awards(
            $user_awards->getUAUserId(),
            $user_awards->getUAAwdId(),
            $user_awards->getUAAwdDate(),
            $newDate
        );
    }


    //function to get all user_awards in the database
    public static function getUser_AwardsForUserId($USER_ID)
    {
        $queryRes = User_AwardsDB::getUser_AwardForUser($USER_ID);

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $awards = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "user_awards")
                $awards[] = self::rowToAward($row);
            }

            return $awards;
        } else {
            return false;
        }
    }
}
