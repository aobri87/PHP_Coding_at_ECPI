<?php
//updated: 22 Feb 2022
//written by: Andrew O'Brien
require_once('database.php');

//class for doing queries on the certification table; provides
//functions for getting all certification, getting an individual certification, adding a
//certification, updating a certification, and deleting a certification
class CertificationDB
{
    //Get all certification in the DB; returns false if the
    //database connection fails
    public static function getCertifications()
    {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the certification
            //table with the categories table to get the role
            //info for the certification object
            $query = 'SELECT * FROM certification';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //Get all certification in the DB; returns false if the
    //database connection fails
    public static function getVeriCertifications($uId)
    {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the certification
            //table with the categories table to get the role
            //info for the certification object
            $query = "SELECT *
                    FROM certification A
                    WHERE VERIFIED = 1 AND NOT EXISTS
                    (SELECT CERT_ID FROM user_certification B WHERE B.CERT_ID = A.CERT_ID AND B.USER_ID = '$uId')";

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific certification by their CERT_ID
    public static function getCertification($CERT_ID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM certification
                    WHERE CERT_ID = '$CERT_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a certification by their CERT_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteCertification($CERT_ID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM certification
                    WHERE CERT_ID = '$CERT_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a certification to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addCertification($cName, $cOrg, $cDesc, $cVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - CERT_ID is an
            //auto-increment field, so no need to
            //specify it
            $query =
                "INSERT INTO certification (CERT_NAME, CERT_ORGANIZATION, CERT_DESC, VERIFIED)
                VALUES ('$cName', '$cOrg', '$cDesc', '$cVerified')";
            $query2 =
                "SELECT * FROM certification where CERT_ID = LAST_INSERT_ID()";

            //execute the query
            $dbConn->query($query);
            $result = $dbConn->query($query2);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to update a certification's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateCertification($cId, $cName, $cOrg, $cDesc, $cVerified)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query =
                "UPDATE certification SET
                    CERT_NAME = '$cName',
                    CERT_ORGANIZATION = '$cOrg',
                    CERT_DESC = '$cDesc',
                    VERIFIED = '$cVerified'
                WHERE CERT_ID = '$cId'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
