<?php
//updated: 22 Feb 2022
//written by: Andrew O'Brien
session_start();
require_once('../controller/certification.php');
require_once('../controller/certification_controller.php');
require_once('../controller/user_certification.php');
require_once('../controller/user_certification_controller.php');
require_once('../controller/validator.php');

$userID = $_SESSION['userID'];
$admin = $_SESSION['admin'];
$student = $_SESSION['student'];
$family = $_SESSION['family'];
$tech = $_SESSION['tech'];
$certDate = $_SESSION['certDate'];
$certExpDate = $_SESSION['certExpDate'];
$certAdd = $_SESSION['certAdd'];

//default certification for add - empty strings and first level
//in list
$certification = new Certification('', '', '', '', '');
$certification2 = new Certification2('', '', '', '', '', '', '');
$certification->setCertId(-1);
$pageTitle = "Add a New Certification";
//validation 
//Declare and clear variables for error message
$cName_error = 'Required';
$cOrg_error = 'Required';
$cDesc_error = 'Required';
$cDate_error = 'Required';
$cExpDate_error = '';

//Retrieve the certificationId from the query string and
//and use it to create a certification object for that cNo
if (isset($_GET['cNo'])) {
    $certification =
        CertificationController::getCertificationById($_GET['cNo']);
    $certification2 =
        User_CertificationController::getUser_CertificationForSpecific($userID, $_GET['cNo'], $certDate, $certExpDate);
    $pageTitle = "Update an Existing Certification";
    //Declare and clear variables for error message
    $cName_error = '';
    $cOrg_error = '';
    $cDesc_error = '';
}

if (isset($_POST['save'])) {
    //save button - perform add or update
    //certificationFirstNameOptions are 1, 2 ,3
    $upCertification = new Certification($_POST['cName'], $_POST['cOrg'], $_POST['cDesc'], $_POST['cVeri']);
    $upCertification->setCertId($_POST['cNo']);
    if ($certAdd) {
        $upCertification2 = new User_Certification($userID, $_GET['cNo'], $_POST['cDate'], $_POST['cExpDate']);
    } else {
        $upCertification2 = new User_Certification($userID, $_GET['cNo'], $certification2->getCertDate(), $certification2->getCertExpDate());
    }

    //validate the values entered
    //$cDesc_error = OBrien_validation\stringValid($certification->getFirstName(), 2, $cDesc_error);
    //$aZip_error = OBrien_validation\stringValid($certification->getLastName(), 2, $aZip_error);
    //$cName_error = OBrien_validation\stringValid($certification->getCertificationName(), 4, $cName_error);
    //$cOrg_error = OBrien_validation\passValid($certification->getPassword(), $cOrg_error);
    //$hPhone_error = OBrien_validation\birthValid($certification->getDateOfBirth(),$hPhone_error);
    //$bPhone_error = OBrien_validation\emailValid($certification->getRace(),$bPhone_error);
    //$USER_GENDER_error = OBrien_validation\extValid($certification->getDateOfBirth(),$USER_GENDER_error);       

    //currently commented out to test code
    //if (strlen($cDesc_error) === 0 && strlen($aZip_error) === 0
    //        && strlen($cName_error) === 0 && strlen($cOrg_error) === 0
    //        && strlen($hPhone_error) === 0 && strlen($bPhone_error) === 0 
    //        && strlen($USER_GENDER_error) === 0) {
    if ($upCertification->getCertId() === '-1') {
        //add
        $newCert = CertificationController::addACertification($upCertification);
        if ($student) {
            $upCertification2->setUCCertId($newCert->getCertId());
            User_CertificationController::addAUser_Certification($upCertification2);
            header('Location: ./manage_certification.php?uNo=' . $userID);
        } else {
            header('Location: ./manage_certification.php');
        }
    } else if ($admin) {
        //update
        CertificationController::updateACertification($upCertification);
        header('Location: ./manage_certification.php');
    } else if ($student && !$certAdd) {
        //update
        User_CertificationController::updateAUser_Certification($upCertification2, $_POST['cDate'], $_POST['cExpDate']);
        header('Location: ./manage_certification.php?uNo=' . $userID);
    } else if ($student && $certAdd) {
        //update
        User_CertificationController::addAUser_Certification($upCertification2);
        header('Location: ./manage_certification.php?uNo=' . $userID);
    }
    unset($_SESSION['certAdd']);
    unset($_POST['save']);
}
//}

if (isset($_POST['cancel'])) {
    //cancel button - just go back to list
    if ($student) {
        header('Location: ./manage_certification.php?uNo=' . $userID);
    } else {
        header('Location: ./manage_certification.php');
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
        <h3>Certification Name: <input type="text" name="cName" value="<?php echo $certification->getCertName(); ?>" <?php if (isset($_GET['cNo'])) {
                                                                                                                            if ($student) echo "readonly";
                                                                                                                        } ?>>
            <?php if (strlen($cName_error) > 0)
                echo "<span style='color: red;'>{$cName_error}</span>"; ?>
        </h3>
        <h3>Certificationing Organization: <input type="text" name="cOrg" value="<?php echo $certification->getCertOrg(); ?>" minlength="2" <?php if (isset($_GET['cNo'])) {
                                                                                                                                                if ($student) echo "readonly";
                                                                                                                                            } ?>>
            <?php if (strlen($cOrg_error) > 0)
                echo "<span style='color: red;'>{$cOrg_error}</span>"; ?>
        </h3>
        <h3>Certification Description: <textarea name="cDesc" rows="4" cols="30" value="<?php echo $certification->getCertDesc(); ?>" <?php if (isset($_GET['cNo'])) {
                                                                                                                                            if ($student) echo "readonly";
                                                                                                                                        } ?>><?php echo $certification->getCertDesc(); ?></textarea>
            <?php if (strlen($cDesc_error) > 0)
                echo "<span style='color: red;'>{$cDesc_error}</span>"; ?>
        </h3>
        <?php if ($student) {
            if ($certAdd) {
                echo
                '<h3>Certification Date: <input type="date" name="cDate">';
            } else {
                echo
                '<h3>Certification Date: <input type="date" name="cDate" value="' . $certification2->getCertDate() . '" >';
            }
            if (strlen($cDesc_error) > 0) {
                echo "<span style='color: red;'>{$cDate_error}</span>";
            }
            echo "</h3>";
        } ?>
        <?php if ($student) {
            if ($certAdd) {
                echo
                '<h3>Certification Exp Date: <input type="date" name="cExpDate">';
            } else {
                echo
                '<h3>Certification Exp Date: <input type="date" name="cExpDate" value="' . $certification2->getCertExpDate() . '" >';
            }
            if (strlen($cDesc_error) > 0) {
                echo "<span style='color: red;'>{$cExpDate_error}</span>";
            }
            echo "</h3>";
        } ?>
        <?php if (isset($_GET['cNo'])) {
            echo "<h3>Verified Status:";
        } ?>
        <?php if ($student) {
            if ("0" === $certification->getCertVerified()) {
                echo '<input type="text" name="cVeri" value="Not-Verified" readonly >';
            } else if ("1" === $certification->getCertVerified()) {
                echo '<input type="text" name="cVeri" value="Verified" readonly>';
            }
        }
        if ($admin) {
            if ("0" === $certification->getCertVerified()) {
                echo '<select name="cVeri">
                    <option value="0" selected>
                        Not-Verified
                    </option>
                    <option value="1">
                        Verified
                    </option>
                </select>}';
            } else if ("1" === $certification->getCertVerified()) {
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
        <?php if (isset($_GET['cNo'])) {
            echo "</h3>";
        } ?>
        <input type="hidden" name="cNo" value="<?php echo $certification->getCertId(); ?>">
        <input type="submit" value="Save" name="save">
        <input type="submit" value="Cancel" name="cancel">
    </form>
</body>

</html>