<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien

include_once('hobby.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/hobby_db.php");

class HobbyController {
    //helper function for taking all information
    //from a hobby info query (row) and converting 
    //it into a Contact object
    private static function rowToHobby($row) {
        $hobby = new Hobby($row['HOB_NAME'],
            $row['HOB_DESC'],
            $row['VERIFIED']);
        $hobby->setHobbyId($row['HOB_ID']);
        return $hobby;
    }

    //function to get all hobby in the database
    public static function getAllHobbies() {
        $queryRes = HobbyDB::getHobbies();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $hobby = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "hobby")
                $hobby[] = self::rowToHobby($row);
            }

            return $hobby;
        } else {
            return false;
        }
    }

    //function to get a specific hobby by their HOB_ID
    public static function getHobbyById($HOB_ID) {
        $queryRes = HobbyDB::getHobby($HOB_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToHobby($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a hobby by their HOB_ID
    public static function deleteHobbyById($HOB_ID) {
        //no special processing needed - just use the
        //DB function
        return HobbyDB::deleteHobby($HOB_ID);
    }

    //function to add a hobby to the DB
    public static function addAHobby($hobby) {
        return HobbyDB::addHobby(
            $hobby->getHobbyName(),
            $hobby->getHobbyDesc(),
            $hobby->getHobVerified());
    }

    //function to update a hobby's information
    public static function updateAHobby($hobby) {
        return HobbyDB::updateHobby(
            $hobby->getHobbyID(),
            $hobby->getHobbyName(),
            $hobby->getHobbyDesc(),
            $hobby->getHobVerified());
    }
}
?>