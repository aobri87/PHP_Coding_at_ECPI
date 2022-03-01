<?php
//updated: 1 Feb 2022
//written by: Andrew O'Brien
require_once('database.php');

//class for doing queries on the address table; provides
//functions for getting all address, getting an individual address, adding a
//address, updating a address, and deleting a address
class AddressDB {
    //Get all address in the DB; returns false if the
    //database connection fails
    public static function getAddresses() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string; join the address
            //table with the categories table to get the role
            //info for the address object
            $query = 'SELECT * FROM address';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific address by their ADD_ID
    public static function getAddress($ADD_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM address
                    WHERE ADD_ID = '$ADD_ID'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a address by their ADD_ID
    //returns True on success, False on failure or
    //datbase connection failure
    public static function deleteAddress($ADD_ID) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM address
                    WHERE ADD_ID = '$ADD_ID'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a address to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addAddress($aStreet, $aStreet2, $aCity, $aState, $aZip, $aHPhone, $aBPhone, $aCPhone, $aWeb, $aEMail)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - ADD_ID is an
            //auto-increment field, so no need to
            //specify it
            $query = 
                "INSERT INTO address (ADD_STREET, ADD_STREET2, ADD_CITY, ADD_STATE, ADD_ZIP, ADD_HPHONE, ADD_BPHONE, ADD_CPHONE, ADD_WEB, ADD_EMAIL)
                VALUES ('$aStreet', '$aStreet2', '$aCity', '$aState', '$aZip', '$aHPhone', '$aBPhone', '$aCPhone', '$aWeb', '$aEMail');";
            $query2 =
                "SELECT * FROM address where ADD_ID = LAST_INSERT_ID()";

            //execute the query
            $dbConn->query($query);
            $result = $dbConn->query($query2 );
            //return the associative qrray
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to update a address's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateAddress($aId, $aStreet, $aStreet2, $aCity, $aState, $aZip, $aHPhone, $aBPhone, $aCPhone, $aWeb, $aEMail)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 
                "UPDATE address SET
                    ADD_STREET = '$aStreet',
                    ADD_STREET2 = '$aStreet2',
                    ADD_CITY = '$aCity',
                    ADD_STATE = '$aState',
                    ADD_ZIP = '$aZip',
                    ADD_HPHONE = '$aHPhone',
                    ADD_BPHONE = '$aBPhone',
                    ADD_CPHONE = '$aCPhone',
                    ADD_WEB = '$aWeb',
                    ADD_EMAIL = '$aEMail'
                WHERE ADD_ID = '$aId'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
}
?>