<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien

include_once('address.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/address_db.php");

class AddressController {
    //helper function for taking all information
    //from a contact info query (row) and converting 
    //it into a Contact object
    private static function rowToAddress($row) {
        $address = new Address($row['ADD_STREET'],
            $row['ADD_STREET2'],
            $row['ADD_CITY'],
            $row['ADD_STATE'],
            $row['ADD_ZIP'],
            $row['ADD_HPHONE'],
            $row['ADD_BPHONE'],
            $row['ADD_CPHONE'],
            $row['ADD_WEB'],
            $row['ADD_EMAIL']);
        $address->setAddressId($row['ADD_ID']);
        return $address;
    }

    //function to get all contact in the database
    public static function getAllAddresses() {
        $queryRes = AddressDB::getAddresses();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $address = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "contact")
                $address[] = self::rowToAddress($row);
            }

            return $address;
        } else {
            return false;
        }
    }

    //function to get a specific contact by their ADD_ID
    public static function getAddressById($ADD_ID) {
        $queryRes = AddressDB::getAddress($ADD_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToAddress($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a contact by their ADD_ID
    public static function deleteAddressById($ADD_ID) {
        //no special processing needed - just use the
        //DB function
        return AddressDB::deleteAddress($ADD_ID);
    }

    //function to add a contact to the DB
    public static function addAAddress($address) {
        $queryRes = AddressDB::addAddress(
            $address->getAddressLine1(),
            $address->getAddressLine2(),
            $address->getCity(),
            $address->getState(),
            $address->getAddressZip(),
            $address->getHomePhone(),
            $address->getBusinessPhone(),
            $address->getCellPhone(),
            $address->getWebAddress(),
            $address->getEMail());
        
        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToAddress($queryRes);
        } else {
            return false;
        }
    }

    //function to update a contact's information
    public static function updateAAddress($address) {
        return AddressDB::updateAddress(
            $address->getAddressId(),
            $address->getAddressLine1(),
            $address->getAddressLine2(),
            $address->getCity(),
            $address->getState(),
            $address->getAddressZip(),
            $address->getHomePhone(),
            $address->getBusinessPhone(),
            $address->getCellPhone(),
            $address->getWebAddress(),
            $address->getEMail());
    }
}
?>