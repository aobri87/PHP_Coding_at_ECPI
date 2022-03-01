<?php
//updated: 7 Feb 2022
//written by: Andrew O'Brien

include_once('business.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/business_db.php");

class BusinessController {
    //helper function for taking all information
    //from a business info query (row) and converting 
    //it into a Contact object
    private static function rowToBusiness($row) {
        $business = new Business($row['BUS_NAME'],
            $row['BUS_DESC'],
            $row['ADD_ID'],
            $row['VERIFIED']);
        $business->setBusId($row['BUS_ID']);
        return $business;
    }

    //function to get all business in the database
    public static function getAllBusinesses() {
        $queryRes = BusinessDB::getBusinesses();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $business = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "business")
                $business[] = self::rowToBusiness($row);
            }

            return $business;
        } else {
            return false;
        }
    }

    //function to get a specific business by their BUS_ID
    public static function getBusinessById($BUS_ID) {
        $queryRes = BusinessDB::getBusiness($BUS_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToBusiness($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a business by their BUS_ID
    public static function deleteBusinessById($BUS_ID) {
        //no special processing needed - just use the
        //DB function
        return BusinessDB::deleteBusiness($BUS_ID);
    }

    //function to add a business to the DB
    public static function addABusiness($business) {
        return BusinessDB::addBusiness(
            $business->getBusName(),
            $business->getBusDesc(),
            $business->getBusAddId(),
            $business->getBusVerified());
    }

    //function to update a business's information
    public static function updateABusiness($business) {
        return BusinessDB::updateBusiness(
            $business->getBusId(),
            $business->getBusName(),
            $business->getBusDesc(),
            $business->getBusAddId(),
            $business->getBusVerified());
    }
}
?>