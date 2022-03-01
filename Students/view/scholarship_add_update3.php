<?php
//updated: 23 Feb 2022
//written by: Andrew O'Brien
session_start();
require_once('../controller/scholarship.php');
require_once('../controller/scholarship_controller.php');
require_once('../controller/validator.php');

$scholarships = ScholarshipController::getAllScholarships();
$userID = $_SESSION['userID'];
$admin = $_SESSION['admin'];
$student = $_SESSION['student'];
$family = $_SESSION['family'];
$tech = $_SESSION['tech'];
$_SESSION['schAdd'] = FALSE;
$_SESSION['schDate'] = FALSE;
$_SESSION['schExpDate'] = FALSE;
$pageTitle = "Manage Scholarships";
$sectionTitle = "Add Scholarship";

//default scholarship for add - empty strings and first level
//in list
$scholarship = new Scholarship('', '', '', '', '', '');
$scholarship->setSchId(-1);
$pageTitle = "Add a New Scholarship";
//validation 
//Declare and clear variables for error message
$sName_error = 'Required';
$sAmount_error = 'Required';
$sDesc_error = 'Required';
$sOrg_error = 'Required';


//Retrieve the scholarshipId from the query string and
//and use it to create a scholarship object for that sNo
if (isset($_GET['sNo'])) {
    $scholarship =
        ScholarshipController::getScholarshipById($_GET['sNo']);
    $pageTitle = "Update an Existing Scholarship";
    //Declare and clear variables for error message
    $sName_error = '';
    $sAmount_error = '';
    $sDesc_error = '';
    $sOrg_error = '';
}

if (isset($_POST['save'])) {
    //save button - perform add or update
    //scholarshipFirstNameOptions are 1, 2 ,3
    if (isset($_GET['sNo'])) {
        $a = ScholarshipController::getScholarshipById($_GET['sNo']);

        $upScholarship = new Scholarship(
            $_POST['sName'],
            $_POST['sAmount'],
            $_POST['sDesc'],
            $a->getSchAddId(),
            $_POST['sOrg'],
            $_POST['sVeri']
        );
    } else {
        $upScholarship = new Scholarship(
            $_POST['sName'],
            $_POST['sAmount'],
            $_POST['sDesc'],
            NULL,
            $_POST['sOrg'],
            $_POST['sVeri']
        );
    }

    $upScholarship->setSchId($_POST['sNo']);

    //validate the values entered
    //$sDesc_error = OBrien_validation\stringValid($scholarship->getFirstName(), 2, $sDesc_error);
    //$sOrg_error = OBrien_validation\stringValid($scholarship->getLastName(), 2, $sOrg_error);
    //$sName_error = OBrien_validation\stringValid($scholarship->getScholarshipName(), 4, $sName_error);
    //$sAmount_error = OBrien_validation\passValid($scholarship->getPassword(), $sAmount_error);
    //$uDOB_error = OBrien_validation\birthValid($scholarship->getDateOfBirth(),$uDOB_error);
    //$uRace_error = OBrien_validation\emailValid($scholarship->getRace(),$uRace_error);
    //$USER_GENDER_error = OBrien_validation\extValid($scholarship->getDateOfBirth(),$USER_GENDER_error);       

    //currently commented out to test code
    //if (strlen($sDesc_error) === 0 && strlen($sOrg_error) === 0
    //        && strlen($sName_error) === 0 && strlen($sAmount_error) === 0
    //        && strlen($uDOB_error) === 0 && strlen($uRace_error) === 0 
    //        && strlen($USER_GENDER_error) === 0) {
    if ($upScholarship->getSchId() === '-1') {
        //add
        ScholarshipController::addAScholarship($upScholarship);
        //header('Location: ./admin_manage_scholarships.php');
    } else {
        //update
        ScholarshipController::updateAScholarship($upScholarship);
        //header('Location: ./admin_manage_scholarships.php');
    }
}

if (isset($_POST['cancel'])) {
    //cancel button - just go back to list
    header('Location: ./admin_manage_scholarships.php');
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
        <h3>Scholarship Name: <input type="text" name="sName" value="<?php echo $scholarship->getSchName(); ?>">
            <?php if (strlen($sName_error) > 0)
                echo "<span style='color: red;'>{$sName_error}</span>"; ?>
        </h3>
        <h3>Scholarhip Amount: <input type="text" name="sAmount" value="<?php echo $scholarship->getSchAmount(); ?>" minlength="2">
            <?php if (strlen($sAmount_error) > 0)
                echo "<span style='color: red;'>{$sAmount_error}</span>"; ?>
        </h3>
        <h3>Scholarship Description: <textarea name="sDesc" rows="4" cols="30" value="<?php echo $scholarship->getSchDesc(); ?>"><?php echo $scholarship->getSchDesc(); ?></textarea>
            <?php if (strlen($sDesc_error) > 0)
                echo "<span style='color: red;'>{$sDesc_error}</span>"; ?>
        </h3>
        <h3>Scholarhip Organization: <input type="text" name="sOrg" value="<?php echo $scholarship->getSchOrg(); ?>" minlength="2">
            <?php if (strlen($sOrg_error) > 0)
                echo "<span style='color: red;'>{$sOrg_error}</span>"; ?>
        </h3>
        <h3>Verified Status: <select name="sVeri">
                <option value="0" <?php if ("0" === $scholarship->getSchVerified()) {
                                        echo 'selected';
                                    } ?>>
                    Not-Verified
                </option>
                <option value="1" <?php if ("1" === $scholarship->getSchVerified()) {
                                        echo 'selected';
                                    } ?>>
                    Verified
                </option>
            </select>
        </h3>
        <input type="hidden" name="sNo" value="<?php echo $scholarship->getSchId(); ?>">
        <input type="submit" value="Save" name="save">
        <input type="submit" value="Cancel" name="cancel">
    </form>
</body>

</html>