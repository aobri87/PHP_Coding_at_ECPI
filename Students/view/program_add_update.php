<?php
//updated: 14 Feb 2022
//written by: Andrew O'Brien

require_once('../controller/program.php');
require_once('../controller/program_controller.php');
require_once('../controller/validator.php');

$programs = ProgramController::getAllPrograms();


    //default program for add - empty strings and first level
    //in list
    $program = new Program('', '');
    $program->setProgramID(-1);
    $pageTitle = "Add a New Program";
    //validation 
    //Declare and clear variables for error message
    $pName_error = 'Required';
    $pHours_error = 'Required';
    
    //Retrieve the programId from the query string and
    //and use it to create a program object for that pNo
    if (isset($_GET['pNo'])) {
        $program = 
            ProgramController::getProgramById($_GET['pNo']);
        $pageTitle = "Update an Existing Program";
        //Declare and clear variables for error message
        $pName_error = '';
        $pHours_error = '';
    }

    if (isset($_POST['save'])) {
        //save button - perform add or update
        //programFirstNameOptions are 1, 2 ,3
        $upProgram = new Program($_POST['pName'], $_POST['pHours']);
        $upProgram->setProgramId($_POST['pNo']); 

        //validate the values entered
        //$pHours_error = OBrien_validation\stringValid($program->getFirstName(), 2, $pHours_error);
        //$aZip_error = OBrien_validation\stringValid($program->getLastName(), 2, $aZip_error);
        //$pName_error = OBrien_validation\stringValid($program->getProgramName(), 4, $pName_error);
        //$cOrg_error = OBrien_validation\passValid($program->getPassword(), $cOrg_error);
        //$hPhone_error = OBrien_validation\birthValid($program->getDateOfBirth(),$hPhone_error);
        //$bPhone_error = OBrien_validation\emailValid($program->getRace(),$bPhone_error);
        //$USER_GENDER_error = OBrien_validation\extValid($program->getDateOfBirth(),$USER_GENDER_error);       
        
        //currently commented out to test code
        //if (strlen($pHours_error) === 0 && strlen($aZip_error) === 0
        //        && strlen($pName_error) === 0 && strlen($cOrg_error) === 0
        //        && strlen($hPhone_error) === 0 && strlen($bPhone_error) === 0 
        //        && strlen($USER_GENDER_error) === 0) {
            if ($upProgram->getProgramID() === '-1') {
                //add
                ProgramController::addAProgram($upProgram);
                //header('Location: ./admin_manage_programs.php');
            } else {
                //update
                ProgramController::updateAProgram($upProgram);
                //header('Location: ./admin_manage_programs.php');
                }
            }
    //}

    if (isset($_POST['cancel'])) {
        //cancel button - just go back to list
        header('Location: ./admin_manage_programs.php');
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
            <h3>Program Name: <input type="text" name="pName"
                value="<?php echo $program-> getProgramName(); ?>">
                <?php if (strlen($pName_error) > 0)
                    echo "<span style='color: red;'>{$pName_error}</span>"; ?>
            </h3>
            <h3>Program Hours: <input type="text" name="pHours"
                value="<?php echo $program->getProgramHours(); ?>">
                <?php if (strlen($pHours_error) > 0)
                    echo "<span style='color: red;'>{$pHours_error}</span>"; ?>
            </h3>
            <input type="hidden" name="pNo"
                value="<?php echo $program->getProgramID(); ?>" >
            <input type="submit" value="Save" name="save">
            <input type="submit" value="Cancel" name="cancel">
        </form>
    </body>
</html>