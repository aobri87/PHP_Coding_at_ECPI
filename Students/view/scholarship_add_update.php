<?php
//updated: 24 Feb 2022
//written by: Andrew O'Brien
session_start();
require_once('../controller/scholarship.php');
require_once('../controller/scholarship_controller.php');
require_once('../controller/user_scholarship.php');
require_once('../controller/user_scholarship_controller.php');
require_once('../controller/validator.php');

$userID = $_SESSION['userID'];
$admin = $_SESSION['admin'];
$student = $_SESSION['student'];
$family = $_SESSION['family'];
$tech = $_SESSION['tech'];
$schDate = $_SESSION['schDate'];
$schExpDate = $_SESSION['schExpDate'];
$schAdd = $_SESSION['schAdd'];

//default scholarship for add - empty strings and first level
//in list
$scholarship = new Scholarship('', '', '', '', '', '', '');
$scholarship->setSchId(-1);
$pageTitle = "Add a New Scholarship";
//validation 
//Declare and clear variables for error message
$sName_error = 'Required';
$sOrg_error = 'Required';
$sDesc_error = 'Required';
$sDate_error = 'Required';
$sExpDate_error = '';

//Retrieve the scholarshipId from the query string and
//and use it to create a scholarship object for that sNo
if (isset($_GET['sNo'])) {
    $scholarship =
        ScholarshipController::getScholarshipById($_GET['sNo']);
    $pageTitle = "Update an Existing Scholarship";
    //Declare and clear variables for error message
    $sName_error = '';
    $sOrg_error = '';
    $sDesc_error = '';
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
    //$aZip_error = OBrien_validation\stringValid($scholarship->getLastName(), 2, $aZip_error);
    //$sName_error = OBrien_validation\stringValid($scholarship->getScholarshipName(), 4, $sName_error);
    //$sOrg_error = OBrien_validation\passValid($scholarship->getPassword(), $sOrg_error);
    //$hPhone_error = OBrien_validation\birthValid($scholarship->getDateOfBirth(),$hPhone_error);
    //$bPhone_error = OBrien_validation\emailValid($scholarship->getRace(),$bPhone_error);
    //$USER_GENDER_error = OBrien_validation\extValid($scholarship->getDateOfBirth(),$USER_GENDER_error);       

    //currently commented out to test code
    //if (strlen($sDesc_error) === 0 && strlen($aZip_error) === 0
    //        && strlen($sName_error) === 0 && strlen($sOrg_error) === 0
    //        && strlen($hPhone_error) === 0 && strlen($bPhone_error) === 0 
    //        && strlen($USER_GENDER_error) === 0) {
    if ($upScholarship->getSchId() === '-1') {
        //add
        if ($student) {
            User_ScholarshipController::addAUser_Scholarship2($upScholarship, $userID);
            header('Location: ./manage_scholarship.php?uNo=' . $userID);
        } else {
            ScholarshipController::addAScholarship($upScholarship);
            header('Location: ./manage_scholarship.php');
        }
    } else if ($admin) {
        //update
        ScholarshipController::updateAScholarship($upScholarship);
        header('Location: ./manage_scholarship.php');
    }
    unset($_SESSION['schAdd']);
    unset($_POST['save']);
}
//}

if (isset($_POST['cancel'])) {
    //cancel button - just go back to list
    if ($student) {
        header('Location: ./manage_scholarship.php?uNo=' . $userID);
    } else {
        header('Location: ./manage_scholarship.php');
    }
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
        <h3>Scholarship Name: <input type="text" name="sName" value="<?php echo $scholarship->getSchName(); ?>" <?php if (isset($_GET['sNo'])) {
                                                                                                                    if ($student) echo "readonly";
                                                                                                                } ?>>
            <?php if (strlen($sName_error) > 0)
                echo "<span style='color: red;'>{$sName_error}</span>"; ?>
        </h3>
        <h3>Scholarhip Amount: <input type="text" name="sAmount" value="<?php echo $scholarship->getSchAmount(); ?>" minlength="2" minlength=" 2" <?php if (isset($_GET['sNo'])) {
                                                                                                                                                        if ($student) echo "readonly";
                                                                                                                                                    } ?>>
            <?php if (strlen($sOrg_error) > 0)
                echo "<span style='color: red;'>{$sOrg_error}</span>"; ?>
        </h3>
        <h3>Scholarship Description: <textarea name="sDesc" rows="4" cols="30" value="<?php echo $scholarship->getSchDesc(); ?>" <?php if (isset($_GET['sNo'])) {
                                                                                                                                        if ($student) echo "readonly";
                                                                                                                                    } ?>><?php echo $scholarship->getSchDesc(); ?></textarea>
            <?php if (strlen($sDesc_error) > 0)
                echo "<span style='color: red;'>{$sDesc_error}</span>"; ?>
        </h3>
        <h3>Scholarhip Organization: <input type="text" name="sOrg" value="<?php echo $scholarship->getSchOrg(); ?>" minlength="2">
            <?php if (strlen($sOrg_error) > 0)
                echo "<span style='color: red;'>{$sOrg_error}</span>"; ?>
        </h3>
        <?php if (isset($_GET['sNo'])) {
            echo "<h3>Verified Status:";
        } ?>
        <?php if ($student) {
            if ("0" === $scholarship->getSchVerified()) {
                echo '<input type="text" name="cVeri" value="Not-Verified" readonly >';
            } else if ("1" === $scholarship->getSchVerified()) {
                echo '<input type="text" name="cVeri" value="Verified" readonly>';
            }
        }
        if ($admin) {
            if ("0" === $scholarship->getSchVerified()) {
                echo '<select name="cVeri">
                    <option value="0" selected>
                        Not-Verified
                    </option>
                    <option value="1">
                        Verified
                    </option>
                </select>}';
            } else if ("1" === $scholarship->getSchVerified()) {
                echo '<select name="cVeri">
                    <option value="0">
                        Not-Verified
                    </option>
                    <option value="1" selected>
                        Verified
                    </option>
                </select>}';
            }
        } ?>
        <?php if (isset($_GET['sNo'])) {
            echo "</h3>";
        } ?>
        <input type="hidden" name="sNo" value="<?php echo $scholarship->getSchId(); ?>">
        <input type="submit" value="Save" name="save">
        <input type="submit" value="Cancel" name="cancel">
    </form>
</body>

</html>