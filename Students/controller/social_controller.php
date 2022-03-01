<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien

include_once('social.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/social_db.php");

class SocialController {
    //helper function for taking all information
    //from a social info query (row) and converting 
    //it into a Contact object
    private static function rowToSocial($row) {
        $social = new Social(
            $row['SOC_NAME'],
            $row['SOC_WEB'],
            $row['VERIFIED']);
        $social->setSocId($row['SOC_ID']);
        return $social;
    }

    //function to get all social in the database
    public static function getAllSocials() {
        $queryRes = SocialDB::getSocials();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $social = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "social")
                $social[] = self::rowToSocial($row);
            }

            return $social;
        } else {
            return false;
        }
    }

    //function to get a specific social by their SOC_ID 
    public static function getSocialById($SOC_ID) {
        $queryRes = SocialDB::getSocial($SOC_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToSocial($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a social by their SOC_ID  and COURSE
    public static function deleteSocialById($SOC_ID) {
        //no special processing needed - just use the
        //DB function
        return SocialDB::deleteSocial($SOC_ID);
    }

    //function to add a social to the DB
    public static function addASocial($social) {
        return SocialDB::addSocial(
            $social->getSocName(),
            $social->getSocWeb(),
            $social->getSocVerified());
    }

    //function to update a social's information
    public static function updateASocial($social) {
        return SocialDB::updateSocial(
            $social->getSocId(),
            $social->getSocName(),
            $social->getSocWeb(),
            $social->getSocVerified());
    }
}
?>