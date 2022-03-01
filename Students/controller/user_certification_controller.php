<?php
//updated: 22 Feb 2022
//written by: Andrew O'Brien

include_once('user_certification.php');
include_once($_SERVER['DOCUMENT_ROOT'] . "/students/model/user_certification_db.php");

class User_CertificationController
{
    //helper function for taking all information
    //from a user_certification info query (row) and converting 
    //it into a Contact object
    private static function rowToUser_Certification($row)
    {
        $user_certification = new User_Certification(
            $row['USER_ID'],
            $row['CERT_ID'],
            $row['CERT_DATE'],
            $row['CERT_EXP_DATE']
        );
        return $user_certification;
    }

    //helper function for taking all information
    //from a user_certification info query (row) and converting 
    //it into a Contact object
    private static function rowToCertification($row)
    {
        $certification = new Certification2(
            $row['CERT_NAME'],
            $row['CERT_ORGANIZATION'],
            $row['CERT_DESC'],
            $row['CERT_DATE'],
            $row['CERT_EXP_DATE'],
            $row['VERIFIED']
        );
        $certification->setCertId($row['CERT_ID']);
        return $certification;
    }


    //function to get all user_certification in the database
    public static function getAllUser_Certifications()
    {
        $queryRes = User_CertificationDB::getUser_Certifications();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $user_certification = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "user_certification")
                $user_certification[] = self::rowToUser_Certification($row);
            }

            return $user_certification;
        } else {
            return false;
        }
    }

    //function to get a specific user_certification by their USER_ID 
    public static function getUser_CertificationByUserId($USER_ID)
    {
        $queryRes = User_CertificationDB::getUser_CertificationByUser($USER_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser_Certification($queryRes);
        } else {
            return false;
        }
    }
    //function to get a specific user_certification by their CERT_ID 
    public static function getUser_CertificationByCertId($CERT_ID)
    {
        $queryRes = User_CertificationDB::getUser_CertificationByCert($CERT_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser_Certification($queryRes);
        } else {
            return false;
        }
    }
    //function to get a specific user_certification by their CERT_ID 
    public static function getUser_CertificationForSpecific($USER_ID, $CERT_ID, $CERT_DATE, $CERT_EXP_DATE)
    {
        $queryRes = User_CertificationDB::getUser_CertificationSpecific($USER_ID, $CERT_ID, $CERT_DATE, $CERT_EXP_DATE);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToCertification($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a user_certification by their USER_ID  and CERT_ID
    public static function deleteUser_Certification($USER_ID, $CERT_ID)
    {
        //no special processing needed - just use the
        //DB function
        return User_CertificationDB::deleteUser_Certification($USER_ID, $CERT_ID);
    }


    //function to add a user_certification to the DB
    public static function addAUser_Certification($user_certification)
    {
        return User_CertificationDB::addUser_Certification(
            $user_certification->getUCUserId(),
            $user_certification->getUCCertId(),
            $user_certification->getUCCertDate(),
            $user_certification->getUCCertExpDate()
        );
    }

    //function to update a user_certification's information
    public static function updateAUser_Certification($user_certification, $cDate, $cExpDate)
    {
        return User_CertificationDB::updateUser_Certification(
            $user_certification->getUCUserId(),
            $user_certification->getUCCertId(),
            $user_certification->getUCCertDate(),
            $user_certification->getUCCertExpDate(),
            $cDate,
            $cExpDate
        );
    }

    //function to get all user_certification in the database
    public static function getUser_CertificationForUserId($USER_ID)
    {
        $queryRes = User_CertificationDB::getUser_CertificationForUser($USER_ID);

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $certification = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "user_certification")
                $certification[] = self::rowToCertification($row);
            }

            return $certification;
        } else {
            return false;
        }
    }
}
