<?php
//updated: 9 Feb 2022
//written by: Andrew O'Brien

include_once('user_social.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/user_social_db.php");

class User_SocialController {
    //helper function for taking all information
    //from a user_social info query (row) and converting 
    //it into a Contact object
    private static function rowToUser_Social($row) {
        $user_social = new User_Social($row['USER_ID'],
            $row['SOC_ID']);
        return $user_social;
    }

    //function to get all user_social in the database
    public static function getAllUser_Socials() {
        $queryRes = User_SocialDB::getUser_Socials();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $user_social = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "user_social")
                $user_social[] = self::rowToUser_Social($row);
            }

            return $user_social;
        } else {
            return false;
        }
    }

    //function to get a specific user_social by their USER_ID 
    public static function getUser_SocialByUserId($USER_ID) {
        $queryRes = User_SocialDB::getUser_SocialByUser($USER_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser_Social($queryRes);
        } else {
            return false;
        }
    }
    //function to get a specific user_social by their SOC_ID 
    public static function getUser_SocialBySocId($SOC_ID) {
        $queryRes = User_SocialDB::getUser_SocialBySocial($SOC_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser_Social($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a user_social by their USER_ID  and SOC_ID
    public static function deleteAUser_Social($USER_ID, $SOC_ID) {
        //no special processing needed - just use the
        //DB function
        return User_SocialDB::deleteUser_Social($USER_ID, $SOC_ID);
    }


    //function to add a user_social to the DB
    public static function addAUser_Social($user_social) {
        return User_SocialDB::addUser_Social(
            $user_social->getUSOCUserId(),
            $user_social->getUSOCSocId(),
            $user_social->getUSOCUserSocId());
    }

    //function to update a user_social's information
    public static function updateAUser_Social($user_social) {
        return User_SocialDB::updateUser_Social(
            $user_social->getUSOCUserId(),
            $user_social->getUSOCSocId(),
            $user_social->getUSOCUserSocId());
    }
}
?>