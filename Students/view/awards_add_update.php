<?php
//updated: 22 Feb 2022
//written by: Andrew O'Brien
session_start();
require_once('../controller/awards.php');
require_once('../controller/awards_controller.php');
require_once('../controller/user_awards.php');
require_once('../controller/user_awards_controller.php');
require_once('../controller/validator.php');

$userID = $_SESSION['userID'];
$admin = $_SESSION['admin'];
$student = $_SESSION['student'];
$family = $_SESSION['family'];
$tech = $_SESSION['tech'];
$awdDate = $_SESSION['awdDate'];
$awdAdd = $_SESSION['awdAdd'];

//default awards for add - empty strings and first level
//in list
$awards = new Awards('', '', '', '');
$awards2 = new Award('', '', '', '', '');
$awards->setAwdId(-1);
$pageTitle = "Add a New Award";
//validation 
//Declare and clear variables for error message
$aName_error = 'Required';
$aOrg_error = 'Required';
$aDesc_error = 'Required';

//Retrieve the awardsId from the query string and
//and use it to create a awards object for that aNo
if (isset($_GET['aNo'])) {
    $awards =
        AwardsController::getAwardById($_GET['aNo']);
    $awards2 =
        User_AwardsController::getUser_AwardsForSpecific($userID, $_GET['aNo'], $awdDate);
    if ($admin) {
        $pageTitle = "Update an Existing Award";
    } else if ($student) {
        $pageTitle = "Update Award Date";
    }
    //Declare and clear variables for error message
    $aName_error = '';
    $aOrg_error = '';
    $aDesc_error = '';
}

if (isset($_POST['save'])) {
    //save button - perform add or update
    //awardsFirstNameOptions are 1, 2 ,3
    $upAwards = new Awards($_POST['aName'], $_POST['aOrg'], $_POST["aDesc"], $_POST['aVeri']);
    $upAwards->setAwdId($_POST['aNo']);
    if ($awdAdd) {
        $upAwards2 = new User_Awards($userID, $_GET['aNo'], $_POST['aDate']);
    } else {
        $upAwards2 = new User_Awards($userID, $_GET['aNo'], $awards2->getAwd2Date());
    }

    //validate the values entered
    //$aDesc_error = OBrien_validation\stringValid($awards->getFirstName(), 2, $aDesc_error);
    //$aZip_error = OBrien_validation\stringValid($awards->getLastName(), 2, $aZip_error);
    //$aName_error = OBrien_validation\stringValid($awards->getAwardsName(), 4, $aName_error);
    //$aOrg_error = OBrien_validation\passValid($awards->getPassword(), $aOrg_error);
    //$hPhone_error = OBrien_validation\birthValid($awards->getDateOfBirth(),$hPhone_error);
    //$bPhone_error = OBrien_validation\emailValid($awards->getRace(),$bPhone_error);
    //$USER_GENDER_error = OBrien_validation\extValid($awards->getDateOfBirth(),$USER_GENDER_error);       

    //currently commented out to test code
    //if (strlen($aDesc_error) === 0 && strlen($aZip_error) === 0
    //        && strlen($aName_error) === 0 && strlen($aOrg_error) === 0
    //        && strlen($hPhone_error) === 0 && strlen($bPhone_error) === 0 
    //        && strlen($USER_GENDER_error) === 0) {
    if ($upAwards->getAwdId() === '-1') {
        //add
        $newAward = AwardsController::addAAward($upAwards);
        if ($student) {
            $upAwards2->setUAAwdId($newAward->getAwdId());
            $upAwards2->setUAAwdDate($_POST['aDate']);
            User_AwardsController::addAUser_Awards($upAwards2);
            header('Location: ./manage_awards.php?uNo=' . $userID);
        } else {
            header('Location: ./manage_awards.php');
        }
    } else if ($admin) {
        //update
        AwardsController::updateAAward($upAwards);
        header('Location: ./manage_awards.php');
    } else if ($student && !$awdAdd) {
        //update
        User_AwardsController::updateAUser_Awards($upAwards2, $_POST['aDate']);
        header('Location: ./manage_awards.php?uNo=' . $userID);
    } else if ($student && $awdAdd) {
        //update
        User_AwardsController::addAUser_Awards($upAwards2);
        header('Location: ./manage_awards.php?uNo=' . $userID);
    }
    unset($_SESSION['awdAdd']);
    unset($_POST['save']);
}
//}

if (isset($_POST['cancel'])) {
    //cancel button - just go back to list
    if ($student) {
        header('Location: ./manage_awards.php?uNo=' . $userID);
    } else {
        header('Location: ./manage_awards.php');
    }
}



?>
<html>

<head>
    <title>ECPI Student Tracker</title>
</head>

<body>
    <h1>ECPI Student Tracker </h1>
    <h2><?php echo $pageTitle; ?></h2>
    <form method='POST'>
        <h3>Award Name: <input type="text" name="aName" value="<?php echo $awards->getAwdName(); ?>" <?php if (isset($_GET['aNo'])) {
                                                                                                            if ($student) echo "readonly";
                                                                                                        } ?>>
            <?php if (strlen($aName_error) > 0)
                echo "<span style='color: red;'>{$aName_error}</span>"; ?>
        </h3>
        <h3>Awarding Organization: <input type="text" name="aOrg" value="<?php echo $awards->getAwdOrg(); ?>" minlength="2" <?php if (isset($_GET['aNo'])) {
                                                                                                                                if ($student) echo "readonly";
                                                                                                                            } ?>>
            <?php if (strlen($aOrg_error) > 0)
                echo "<span style='color: red;'>{$aOrg_error}</span>"; ?>
        </h3>
        <h3>Award Description: <textarea name="aDesc" rows="4" cols="30" value="<?php echo $awards->getAwdDesc(); ?>" <?php if (isset($_GET['aNo'])) {
                                                                                                                            if ($student) echo "readonly";
                                                                                                                        } ?>><?php echo $awards->getAwdDesc(); ?></textarea>
            <?php if (strlen($aDesc_error) > 0)
                echo "<span style='color: red;'>{$aDesc_error}</span>"; ?>
        </h3>
        <?php if ($student) {
            if ($awdAdd) {
                echo
                '<h3>Award Date: <input type="date" name="aDate">';
            } else {
                echo
                '<h3>Award Date: <input type="date" name="aDate" value="' . $awards2->getAwd2Date() . '" >';
            }
            if (strlen($aDesc_error) > 0) {
                echo "<span style='color: red;'>{$aDesc_error}</span>";
            }
            echo "</h3>";
        }
        ?>
        <?php if (isset($_GET['aNo'])) {
            echo "<h3>Verified Status:";
        } ?>
        <?php if ($student) {
            if ("0" === $awards->getAwdVerified()) {
                echo '<input type="text" name="aVeri" value="Not-Verified" readonly >';
            } else if ("1" === $awards->getAwdVerified()) {
                echo '<input type="text" name="aVeri" value="Verified" readonly>';
            }
        }
        if ($admin) {
            if ("0" === $awards->getAwdVerified()) {
                echo '<select name="aVeri">
                    <option value="0" selected>
                        Not-Verified
                    </option>
                    <option value="1">
                        Verified
                    </option>
                </select>}';
            } else if ("1" === $awards->getAwdVerified()) {
                echo '<select name="aVeri">
                    <option value="0">
                        Not-Verified
                    </option>
                    <option value="1" selected>
                        Verified
                    </option>
                </select>}';
            }
        } ?>
        <?php if (isset($_GET['aNo'])) {
            echo "</h3>";
        } ?>
        <input type="hidden" name="aNo" value="<?php echo $awards->getAwdId(); ?>">
        <input type="submit" value="Save" name="save">
        <input type="submit" value="Cancel" name="cancel">
    </form>
</body>

</html>