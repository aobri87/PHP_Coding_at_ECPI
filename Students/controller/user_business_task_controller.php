<?php
//updated: 9 Feb 2022
//written by: Andrew O'Brien

include_once('user_business_task.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/user_business_task_db.php");

class User_Business_TaskController {
    //helper function for taking all information
    //from a user_business_task info query (row) and converting 
    //it into a Contact object
    private static function rowToUser_Business_Task($row) {
        $user_business_task = new User_Business_Task($row['USER_ID'],
            $row['TSK_ID'],
            $row['BUS_ID'],
            $row['SKH_ID'],
            $row['UBT_SDATE'],
            $row['UBT_EDATE'],
            $row['UBT_TYPE']);
        return $user_business_task;
    }

    //function to get all user_business_task in the database
    public static function getAllUser_Business_Tasks() {
        $queryRes = User_Business_TaskDB::getUser_Business_Tasks();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $user_business_task = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "user_business_task")
                $user_business_task[] = self::rowToUser_Business_Task($row);
            }

            return $user_business_task;
        } else {
            return false;
        }
    }

    //function to get a specific user_business_task by their USER_ID 
    public static function getUser_Business_TaskByUserId($USER_ID) {
        $queryRes = User_Business_TaskDB::getUser_Business_TaskByUser($USER_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser_Business_Task($queryRes);
        } else {
            return false;
        }
    }
    //function to get a specific user_business_task by their SKH_ID 
    public static function getUser_Business_TaskBySchoolId($SKH_ID) {
        $queryRes = User_Business_TaskDB::getUser_Business_TaskBySchool($SKH_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser_Business_Task($queryRes);
        } else {
            return false;
        }
    }
    //function to get a specific user_business_task by their BUS_ID 
    public static function getUser_Business_TaskByBusinessId($BUS_ID) {
        $queryRes = User_Business_TaskDB::getUser_Business_TaskByBusiness($BUS_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser_Business_Task($queryRes);
        } else {
            return false;
        }
    }
    //function to get a specific user_business_task by their TSK_ID 
    public static function getUser_Business_TaskByTskId($TSK_ID) {
        $queryRes = User_Business_TaskDB::getUser_Business_TaskByTask($TSK_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser_Business_Task($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a user_business_task by their USER_ID  and TSK_ID
    public static function deleteUser_Business_Task($USER_ID, $TSK_ID) {
        //no special processing needed - just use the DB function
        return User_Business_TaskDB::deleteUser_Business_Task($USER_ID, $TSK_ID);
    }
    //function to delete a user_business_task by their SKH_ID  and TSK_ID
    public static function deleteUser_Business_TaskBySchoolId($SKH_ID, $TSK_ID) {
        //no special processing needed - just use the DB function
        return User_Business_TaskDB::deleteUser_Business_TaskBySchool($SKH_ID, $TSK_ID);
    }
    //function to delete a user_business_task by their BUS_ID  and TSK_ID
    public static function deleteUser_Business_Task($BUS_ID, $TSK_ID) {
        //no special processing needed - just use the DB function
        return User_Business_TaskDB::deleteUser_Business_Task($BUS_ID, $TSK_ID);
    }

    //function to add a user_business_task to the DB
    public static function addAUser_Business_Task($user_business_task) {
        return User_Business_TaskDB::addUser_Business_Task(
            $user_business_task->getUBTUserId(),
            $user_business_task->getUBTTaskId(),
            $user_business_task->getUBTBusinessId(),
            $user_business_task->getUBTSchoolId(),
            $user_business_task->getUBTStartDate(),
            $user_business_task->getUBTEndDate(),
            $user_business_task->getUBTType());
    }

    //function to update a user_business_task's information
    public static function updateAUser_Business_Task($user_business_task) {
        return User_Business_TaskDB::updateUser_Business_Task(
            $user_business_task->getUBTUserId(),
            $user_business_task->getUBTTaskId(),
            $user_business_task->getUBTBusinessId(),
            $user_business_task->getUBTSchoolId(),
            $user_business_task->getUBTStartDate(),
            $user_business_task->getUBTEndDate(),
            $user_business_task->getUBTType());
    }
}
?>