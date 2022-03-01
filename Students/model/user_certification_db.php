<?php
//updated: 22 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing queries on the user_certification table; provides
//functions for getting all user_certification, getting an individual user_certification, adding a
//user_certification, updating a user_certification, and deleting a user_certification
class User_CertificationDB
{
    //Get all user_certification in the DB; returns false if the
    //database connection fails
    public static function getUser_Certifications()
    {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the user_certification
            //table with the categories table to get the role
            //info for the user_certification object
            $query = 'SELECT * FROM user_certification';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific user_certification by their USER_ID
    public static function getUser_CertificationByUser($USER_ID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user_certification
                    WHERE USER_ID = '$USER_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    //function to get a specific user_certification by their CERT_ID
    public static function getUser_CertificationByCert($CERT_ID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM user_certification
                    WHERE CERT_ID = '$CERT_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to get a specific user_certification by their CERT_ID
    public static function getUser_CertificationSpecific($USER_ID, $CERT_ID, $CERT_DATE, $CERT_EXP_DATE)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT certification.*, user_certification.CERT_DATE, user_certification.CERT_EXP_DATE
                        FROM certification
                        LEFT JOIN user_certification ON certification.CERT_ID = user_certification.CERT_ID
                        WHERE user_certification.USER_ID = '$USER_ID'
                            AND user_certification.CERT_ID = '$CERT_ID'
                            AND CERT_DATE = '$CERT_DATE'
                            AND CERT_EXP_DATE = '$CERT_EXP_DATE'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a user_certification by their USER_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteUser_Certification($USER_ID, $CERT_ID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM user_certification
                    WHERE USER_ID = '$USER_ID' AND CERT_ID = '$CERT_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a user_certification to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addUser_Certification($uId, $cId, $cDate, $cExpDate)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - USER_ID is an
            //auto-increment field, so no need to
            //specify it
            $query =
                "INSERT INTO user_certification (USER_ID, CERT_ID, CERT_DATE, CERT_EXP_DATE)
                VALUES ('$uId', '$cId', '$cDate', '$cExpDate')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a user_certification's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateUser_Certification($uId, $cId, $cDate, $cExpDate, $newDate, $newExpDate)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query =
                "UPDATE user_certification SET
                    USER_ID = '$uId',
                    CERT_ID = '$cId',
                    CERT_DATE = '$newDate',
                    CERT_EXP_DATE = '$newExpDate'
                WHERE USER_ID = '$uId' AND CERT_ID = '$cId' AND CERT_DATE ='$cDate' AND CERT_EXP_DATE = '$cExpDate'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to get all certifications info for a user by their USER_ID from the certification table
    public static function getUser_CertificationForUser($USER_ID)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT certification.*, user_certification.CERT_DATE, user_certification.CERT_EXP_DATE
                        FROM certification
                        LEFT JOIN user_certification ON certification.CERT_ID = user_certification.CERT_ID
                        WHERE user_certification.USER_ID = '$USER_ID'
                        ORDER BY user_certification.CERT_DATE ASC";

            //return the associative qrray
            return $dbConn->query($query);
        } else {
            return false;
        }
    }
}
