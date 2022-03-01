<?php
//updated: 8 Feb 2022
//written by: Andrew O'Brien

include_once('task.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/task_db.php");

class TaskController {
    //helper function for taking all information
    //from a task info query (row) and converting 
    //it into a Contact object
    private static function rowToTask($row) {
        $task = new Task(
            $row['TSK_NAME'],
            $row['TSK_DESC'],
            $row['TSK_CAT'],
            $row['TSK_SUB_CAT'],
            $row['VERIFIED']);
        $task->setTskId($row['TSK_ID']);
        return $task;
    }

    //function to get all task in the database
    public static function getAllTasks() {
        $queryRes = TaskDB::getTasks();

        if ($queryRes) {
            //process the results into an array with
            //the CategoryNo and the CategoryName - allows the
            //UI to not care about the DB structure
            $task = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //Contact objects (i.e. "task")
                $task[] = self::rowToTask($row);
            }

            return $task;
        } else {
            return false;
        }
    }

    //function to get a specific task by their TSK_ID 
    public static function getTaskById($TSK_ID) {
        $queryRes = TaskDB::getTask($TSK_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToTask($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a task by their TSK_ID  and COURSE
    public static function deleteTaskById($TSK_ID) {
        //no special processing needed - just use the
        //DB function
        return TaskDB::deleteTask($TSK_ID);
    }

    //function to add a task to the DB
    public static function addATask($task) {
        return TaskDB::addTask(
            $task->getTskName(),
            $task->getTskDesc(),
            $task->getTskCat(),
            $task->getTskSubCat(),
            $task->getTskVerified());
    }

    //function to update a task's information
    public static function updateATask($task) {
        return TaskDB::updateTask(
            $task->getTskId(),
            $task->getTskName(),
            $task->getTskDesc(),
            $task->getTskCat(),
            $task->getTskSubCat(),
            $task->getTskVerified());
    }
}
?>