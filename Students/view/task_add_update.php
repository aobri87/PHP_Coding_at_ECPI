<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien

require_once('../controller/task.php');
require_once('../controller/task_controller.php');
require_once('../controller/validator.php');

$tasks = TaskController::getAllTasks();


    //default task for add - empty strings and first level
    //in list
    $task = new Task('', '', '', '', '');
    $task->setTskId(-1);
    $pageTitle = "Add a New Task";
    //validation 
    //Declare and clear variables for error message
    $tName_error = 'Required';
    $tDesc_error = 'Required';
    $tCat_error = 'Required';
    $tSubCat_error = '';
    
    //Retrieve the taskId from the query string and
    //and use it to create a task object for that tNo
    if (isset($_GET['tNo'])) {
        $task = 
            TaskController::getTaskById($_GET['tNo']);
        $pageTitle = "Update an Existing Task";
        //Declare and clear variables for error message
        $tName_error = '';
        $tDesc_error = '';
        $tCat_error = '';
        $tSubCat_error = '';
    }

    if (isset($_POST['save'])) {
        //save button - perform add or update
        //taskFirstNameOptions are 1, 2 ,3
        $upTask = new Task($_POST['tName'], $_POST['tDesc'], $_POST['tCat'], $_POST['tSubCat'], $_POST['sVeri']);
        $upTask->setTskId($_POST['tNo']); 

        //validate the values entered
        //$tDesc_error = OBrien_validation\stringValid($task->getFirstName(), 2, $tDesc_error);
        //$aZip_error = OBrien_validation\stringValid($task->getLastName(), 2, $aZip_error);
        //$tName_error = OBrien_validation\stringValid($task->getTaskName(), 4, $tName_error);
        //$tCat_error = OBrien_validation\passValid($task->getPassword(), $tCat_error);
        //$hPhone_error = OBrien_validation\birthValid($task->getDateOfBirth(),$hPhone_error);
        //$bPhone_error = OBrien_validation\emailValid($task->getRace(),$bPhone_error);
        //$USER_GENDER_error = OBrien_validation\extValid($task->getDateOfBirth(),$USER_GENDER_error);       
        
        //currently commented out to test code
        //if (strlen($tDesc_error) === 0 && strlen($aZip_error) === 0
        //        && strlen($tName_error) === 0 && strlen($tCat_error) === 0
        //        && strlen($hPhone_error) === 0 && strlen($bPhone_error) === 0 
        //        && strlen($USER_GENDER_error) === 0) {
            if ($upTask->getTskId() === '-1') {
                //add
                TaskController::addATask($upTask);
                //header('Location: ./admin_manage_tasks.php');
            } else {
                //update
                TaskController::updateATask($upTask);
                //header('Location: ./admin_manage_tasks.php');
                }
            }
    //}

    if (isset($_POST['cancel'])) {
        //cancel button - just go back to list
        header('Location: ./admin_manage_tasks.php');
    }



?>
<html>
    <head>
        <title>ECPI Student Tracker</title>
    </head>

    <body>
        <h1>ECPI Student Tracker</h1>
        <h2><?php echo $pageTitle; ?></h2>
        <form method='POST'>
            <h3>Task Name: <input type="text" name="tName"
                value="<?php echo $task->getTskName(); ?>">
                <?php if (strlen($tName_error) > 0)
                    echo "<span style='color: red;'>{$tName_error}</span>"; ?>
            </h3>
            <h3>Task Description: <textarea name="tDesc" rows="4" cols="30"
                value="<?php echo $task->getTskDesc(); ?>"><?php echo $task->getTskDesc(); ?></textarea>
                <?php if (strlen($tDesc_error) > 0)
                    echo "<span style='color: red;'>{$tDesc_error}</span>"; ?>
            </h3>
            <h3>Task Category: <input type="text" name="tCat"
                value="<?php echo $task->getTskCat(); ?>" minlength="2">
                <?php if (strlen($tCat_error) > 0)
                    echo "<span style='color: red;'>{$tCat_error}</span>"; ?>
            </h3>
            <h3>Task Sub-Category: <input type="text" name="tSubCat"
                value="<?php echo $task->getTskSubCat(); ?>" minlength="2">
                <?php if (strlen($tSubCat_error) > 0)
                    echo "<span style='color: red;'>{$tSubCat_error}</span>"; ?>
            </h3>
            <h3>Verified Status: <select name="sVeri">
                    <option value="0" <?php if ("0" === $task->getTskVerified()) { echo 'selected'; } ?>>
                        Not-Verified
                    </option>
                    <option value="1" <?php if ("1" === $task->getTskVerified()) { echo 'selected'; } ?>>
                        Verified
                    </option>
                </select>
            </h3> 
            <input type="hidden" name="tNo"
                value="<?php echo $task->getTskId(); ?>" >
            <input type="submit" value="Save" name="save">
            <input type="submit" value="Cancel" name="cancel">
        </form>
    </body>
</html>