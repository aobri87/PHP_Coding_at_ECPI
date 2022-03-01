<?php
//updated: 14 Feb 2022
//written by: Andrew O'Brien

require_once('../controller/cohort.php');
require_once('../controller/cohort_controller.php');
require_once('../controller/validator.php');

$cohorts = CohortController::getAllCohorts();


    //default cohort for add - empty strings and first level
    //in list
    $cohort = new Cohort('', '', '', '');
    $cohort->setCohortId(-1);
    $pageTitle = "Add a New Cohort";
    //validation 
    //Declare and clear variables for error message
    $cName_error = 'Required';
    $cDesc_error = 'Required';
    
    //Retrieve the cohortId from the query string and
    //and use it to create a cohort object for that cNo
    if (isset($_GET['cNo'])) {
        $cohort = 
            CohortController::getCohortById($_GET['cNo']);
        $pageTitle = "Update an Existing Cohort";
        //Declare and clear variables for error message
        $cName_error = '';
        $cDesc_error = '';
    }

    if (isset($_POST['save'])) {
        //save button - perform add or update
        //cohortFirstNameOptions are 1, 2 ,3
        $upCohort = new Cohort($_POST['cName'], $_POST['cDesc']);
        $upCohort->setCohortId($_POST['cNo']); 

        //validate the values entered
        //$cDesc_error = OBrien_validation\stringValid($cohort->getFirstName(), 2, $cDesc_error);
        //$aZip_error = OBrien_validation\stringValid($cohort->getLastName(), 2, $aZip_error);
        //$cName_error = OBrien_validation\stringValid($cohort->getCohortName(), 4, $cName_error);
        //$cOrg_error = OBrien_validation\passValid($cohort->getPassword(), $cOrg_error);
        //$hPhone_error = OBrien_validation\birthValid($cohort->getDateOfBirth(),$hPhone_error);
        //$bPhone_error = OBrien_validation\emailValid($cohort->getRace(),$bPhone_error);
        //$USER_GENDER_error = OBrien_validation\extValid($cohort->getDateOfBirth(),$USER_GENDER_error);       
        
        //currently commented out to test code
        //if (strlen($cDesc_error) === 0 && strlen($aZip_error) === 0
        //        && strlen($cName_error) === 0 && strlen($cOrg_error) === 0
        //        && strlen($hPhone_error) === 0 && strlen($bPhone_error) === 0 
        //        && strlen($USER_GENDER_error) === 0) {
            if ($upCohort->getCohortID() === '-1') {
                //add
                CohortController::addACohort($upCohort);
                //header('Location: ./admin_manage_cohorts.php');
            } else {
                //update
                CohortController::updateACohort($upCohort);
                //header('Location: ./admin_manage_cohorts.php');
                }
            }
    //}

    if (isset($_POST['cancel'])) {
        //cancel button - just go back to list
        header('Location: ./admin_manage_cohorts.php');
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
            <h3>Cohort Name: <input type="text" name="cName"
                value="<?php echo $cohort->getCohortName(); ?>">
                <?php if (strlen($cName_error) > 0)
                    echo "<span style='color: red;'>{$cName_error}</span>"; ?>
            </h3>
            <h3>Cohort Description: <textarea name="cDesc" rows="4" cols="30"
                value="<?php echo $cohort->getCohortDesc(); ?>"><?php echo $cohort->getCohortDesc(); ?></textarea>
                <?php if (strlen($cDesc_error) > 0)
                    echo "<span style='color: red;'>{$cDesc_error}</span>"; ?>
            </h3>
            <input type="hidden" name="cNo"
                value="<?php echo $cohort->getCohortID(); ?>" >
            <input type="submit" value="Save" name="save">
            <input type="submit" value="Cancel" name="cancel">
        </form>
    </body>
</html>