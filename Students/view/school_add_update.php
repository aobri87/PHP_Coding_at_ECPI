<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien

require_once('../controller/school.php');
require_once('../controller/school_controller.php');
require_once('../controller/validator.php');

$schools = SchoolController::getAllSchools();


    //default school for add - empty strings and first level
    //in list
    $school = new School('', '', '');
    $school->setSkhId(-1);
    $pageTitle = "Add a New School";
    //validation 
    //Declare and clear variables for error message
    $sName_error = 'Required';
    $sAddId_error = 'Required';
    $sVeri_error = 'Required';
    
    //Retrieve the schoolId from the query string and
    //and use it to create a school object for that sNo
    if (isset($_GET['sNo'])) {
        $school = 
            SchoolController::getSchoolById($_GET['sNo']);
        $pageTitle = "Update an Existing School";
        //Declare and clear variables for error message
        $sName_error = '';
        $sAddId_error = '';
        $sVeri_error = '';
    }

    if (isset($_POST['save'])) {
        //save button - perform add or update
        if (isset($_GET['sNo'])) {
            $a = SchoolController::getSchoolById($_GET['sNo']);
            $upSchool = new School($_POST['sName'], $a->getSkhAddId(), $_POST['sVeri']);
        } else {
            $upSchool = new School($_POST['sName'], NULL, $_POST['sVeri']);
        }
        $upSchool->setSkhId($_POST['sNo']); 

        //validate the values entered
        //$sVeri_error = OBrien_validation\stringValid($school->getFirstName(), 2, $sVeri_error);
        //$aZip_error = OBrien_validation\stringValid($school->getLastName(), 2, $aZip_error);
        //$sName_error = OBrien_validation\stringValid($school->getSchoolName(), 4, $sName_error);
        //$sAddId_error = OBrien_validation\passValid($school->getPassword(), $sAddId_error);
        //$hPhone_error = OBrien_validation\birthValid($school->getDateOfBirth(),$hPhone_error);
        //$bPhone_error = OBrien_validation\emailValid($school->getRace(),$bPhone_error);
        //$USER_GENDER_error = OBrien_validation\extValid($school->getDateOfBirth(),$USER_GENDER_error);       
        
        //currently commented out to test code
        //if (strlen($sVeri_error) === 0 && strlen($aZip_error) === 0
        //        && strlen($sName_error) === 0 && strlen($sAddId_error) === 0
        //        && strlen($hPhone_error) === 0 && strlen($bPhone_error) === 0 
        //        && strlen($USER_GENDER_error) === 0) {
            if ($upSchool->getSkhId() === '-1') {
                //add
                SchoolController::addASchool($upSchool);
                //header('Location: ./admin_manage_schools.php');
            } else {
                //update
                SchoolController::updateASchool($upSchool);
                //header('Location: ./admin_manage_schools.php');
                }
            }
    //}

    if (isset($_POST['cancel'])) {
        //cancel button - just go back to list
        header('Location: ./admin_manage_schools.php');
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
            <h3>School Name: <input type="text" name="sName"
                value="<?php echo $school->getSkhName(); ?>">
                <?php if (strlen($sName_error) > 0)
                    echo "<span style='color: red;'>{$sName_error}</span>"; ?>
            </h3>
            <h3>Verified Status: <select name="sVeri">
                    <option value="0" <?php if ("0" === $school->getSkhVerified()) { echo 'selected'; } ?>>
                        Not-Verified
                    </option>
                    <option value="1" <?php if ("1" === $school->getSkhVerified()) { echo 'selected'; } ?>>
                        Verified
                    </option>
                </select>
            </h3> 
            <input type="hidden" name="sNo"
                value="<?php echo $school->getSkhId(); ?>" >
            <input type="submit" value="Save" name="save">
            <input type="submit" value="Cancel" name="cancel">
        </form>
    </body>
</html>