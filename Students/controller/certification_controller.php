<?php
//updated: 22 Feb 2022
//written by: Andrew O'Brien

include_once('certification.php');
include_once($_SERVER['DOCUMENT_ROOT'] . "/students/model/certification_db.php");

class CertificationController
{
    //helper function for taking all information
    //from a certification info query (row) and converting 
    //it into a Contact object
    private static function rowToCertification($row)
    {
        $certification = new Certification(
            $row['CERT_NAME'],
            $row['CERT_ORGANIZATION'],
            $row['CERT_DESC'],
            $row['VERIFIED']
        );
        $certification->setCertId($row['CERT_ID']);
        return $certification;
    }

    //function to get all certification in the database
    public static function getAllVeriCertifications($uId)
    {
        $queryRes = CertificationDB::getVeriCertifications($uId);

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $certification = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "certification")
                $certification[] = self::rowToCertification($row);
            }

            return $certification;
        } else {
            return false;
        }
    }

    //function to get all certification in the database
    public static function getAllCertifications()
    {
        $queryRes = CertificationDB::getCertifications();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $certification = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "certification")
                $certification[] = self::rowToCertification($row);
            }

            return $certification;
        } else {
            return false;
        }
    }

    //function to get a specific certification by their CERT_ID
    public static function getCertificationById($CERT_ID)
    {
        $queryRes = CertificationDB::getCertification($CERT_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToCertification($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a certification by their CERT_ID
    public static function deleteCertificationById($CERT_ID)
    {
        //no special processing needed - just use the
        //DB function
        return CertificationDB::deleteCertification($CERT_ID);
    }

    //function to add a certification to the DB
    public static function addACertification($certification)
    {
        $queryRes = CertificationDB::addCertification(
            $certification->getCertName(),
            $certification->getCertOrg(),
            $certification->getCertDesc(),
            $certification->getCertVerified()
        );
        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToCertification($queryRes);
        } else {
            return false;
        }
    }

    //function to update a certification's information
    public static function updateACertification($certification)
    {
        return CertificationDB::updateCertification(
            $certification->getCertId(),
            $certification->getCertName(),
            $certification->getCertOrg(),
            $certification->getCertDesc(),
            $certification->getCertVerified()
        );
    }
}
