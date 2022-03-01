<?php
//updated: 7 Feb 2022
//written by: Andrew O'Brien

include_once('business_task.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/business_task_db.php");

class Business_TaskController {
    //helper function for taking all information
    //from a business_task info query (row) and converting 
    //it into a Contact object
    private static function rowToBusiness_Task($row) {
        $business_task = new Business_Task($row['BUS_ID'],
            $row['TSK_ID']);
        return $business_task;
    }

    //function to get all business_task in the database
    public static function getAllBusiness_Tasks() {
        $queryRes = Business_TaskDB::getBusiness_Tasks();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $business_task = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "business_task")
                $business_task[] = self::rowToBusiness_Task($row);
            }

            return $business_task;
        } else {
            return false;
        }
    }

    //function to get a specific business_task by their BUS_ID
    public static function getBusiness_TaskByBusId($BUS_ID) {
        $queryRes = Business_TaskDB::getBusiness_TaskByBus($BUS_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToBusiness_Task($queryRes);
        } else {
            return false;
        }
    }
        //function to get a specific business_task by their TSK_ID
    public static function getBusiness_TaskByTskId($TSK_ID) {
        $queryRes = Business_TaskDB::getBusiness_TaskByTsk($TSK_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToBusiness_Task($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a business_task by their BUS_ID
    public static function deleteBusiness_TaskByBusId($BUS_ID) {
        //no special processing needed - just use the
        //DB function
        return Business_TaskDB::deleteBusiness_TaskByBus($BUS_ID);
    }
    //function to delete a business_task by their TSK_ID
    public static function deleteBusiness_TaskByTskId($TSK_ID) {
        //no special processing needed - just use the
        //DB function
        return Business_TaskDB::deleteBusiness_TaskByTsk($TSK_ID);
    }

    //function to add a business_task to the DB
    public static function addABusiness_Task($business_task) {
        return Business_TaskDB::addBusiness_Task(
            $business_task->getBTBusId(),
            $business_task->getBTTskId());
    }

    //function to update a business_task's information
    public static function updateABusiness_Task($business_task) {
        return Business_TaskDB::updateBusiness_Task(
            $business_task->getBTBusId(),
            $business_task->getBTTskId());
    }
}
?>