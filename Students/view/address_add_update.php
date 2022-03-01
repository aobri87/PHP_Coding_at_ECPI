<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien
session_start();
require_once('../controller/address.php');
require_once('../controller/address_controller.php');
require_once('../controller/validator.php');
require_once('../controller/user.php');
require_once('../controller/user_controller.php');

$userID = $_SESSION['userID'];
$user = UserController::getUserByNo($userID);
$addresss = AddressController::getAllAddresses();
$admin = $_SESSION['admin'];
$student = $_SESSION['student'];
$family = $_SESSION['family'];
$tech = $_SESSION['tech'];

//default address for add - empty strings and first level
//in list
$address = new Address('', '', '', '', '', '', '', '', '', '');
$address->setAddressId(-1);
$pageTitle = "Add a New Address";
//validation 
//Declare and clear variables for error message
$aLine1_error = 'Required';
$aZip_error = 'Required';
$aCity_error = 'Required';
$aZip_error = 'Required';
$hPhone_error = '';
$bPhone_error = '';
$cPhone_error = '';
$aEmail_error = '';
$aWeb_error = '';


//Retrieve the addressId from the query string and
//and use it to create a address object for that aNo
if (isset($_GET['aNo']) && ($_GET['aNo']) !== '') {
    $address =
        AddressController::getAddressById($_GET['aNo']);
    $pageTitle = "Update an Existing Address";
    //Declare and clear variables for error message
    $aLine1_error = '';
    $aZip_error = '';
    $aCity_error = '';
    $aZip_error = '';
    $hPhone_error = '';
    $bPhone_error = '';
    $cPhone_error = '';
    $aEmail_error = '';
    $aWeb_error = '';
}

if (isset($_POST['save'])) {
    //save button - perform add or update
    //addressFirstNameOptions are 1, 2 ,3
    $upAddress = new Address(
        $_POST['aLine1'],
        $_POST['aLine2'],
        $_POST['aCity'],
        $_POST['aState'],
        $_POST['aZip'],
        $_POST['hPhone'],
        $_POST['bPhone'],
        $_POST['cPhone'],
        $_POST['aEmail'],
        $_POST['aWeb']
    );
    $upAddress->setAddressId($_POST['aNo']);

    //validate the values entered
    //$aCity_error = OBrien_validation\stringValid($address->getFirstName(), 2, $aCity_error);
    //$aZip_error = OBrien_validation\stringValid($address->getLastName(), 2, $aZip_error);
    //$aLine1_error = OBrien_validation\stringValid($address->getAddressName(), 4, $aLine1_error);
    //$aZip_error = OBrien_validation\passValid($address->getPassword(), $aZip_error);
    //$hPhone_error = OBrien_validation\birthValid($address->getDateOfBirth(),$hPhone_error);
    //$bPhone_error = OBrien_validation\emailValid($address->getRace(),$bPhone_error);
    //$USER_GENDER_error = OBrien_validation\extValid($address->getDateOfBirth(),$USER_GENDER_error);       

    //currently commented out to test code
    //if (strlen($aCity_error) === 0 && strlen($aZip_error) === 0
    //        && strlen($aLine1_error) === 0 && strlen($aZip_error) === 0
    //        && strlen($hPhone_error) === 0 && strlen($bPhone_error) === 0 
    //        && strlen($USER_GENDER_error) === 0) {
    if ($upAddress->getAddressId() === '-1') {
        //add
        $newAddress = AddressController::addAAddress($upAddress);
        if ($admin === true) {
            header('Location: ./admin_manage_users.php');
        } else if ($student === true) {
            $user->setAddressId($newAddress->getAddressId());
            UserController::updateAUserAddress($user);
            header('Location: ./student.php');
        } else if ($family === true) {
            header('Location: ./family.php');
        } else if ($tech === true) {
            header('Location: ./tech.php');
        }
    } else {
        //update
        AddressController::updateAAddress($upAddress);
        if ($admin === true) {
            header('Location: ./admin_manage_users.php');
        } else if ($student === true) {
            header('Location: ./student.php');
        } else if ($family === true) {
            header('Location: ./family.php');
        } else if ($tech === true) {
            header('Location: ./tech.php');
        }
    }
}
//}

if (isset($_POST['cancel'])) {
    //cancel button - just go back to list
    if ($admin === true) {
        header('Location: ./admin.php');
    } else if ($student === true) {
        header('Location: ./student.php');
    } else if ($family === true) {
        header('Location: ./family.php');
    } else if ($tech === true) {
        header('Location: ./tech.php');
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
        <h3>Address Line1: <input type="text" name="aLine1" value="<?php echo $address->getAddressLine1(); ?>">
            <?php if (strlen($aLine1_error) > 0)
                echo "<span style='color: red;'>{$aLine1_error}</span>"; ?>
        </h3>
        <h3>Address Line2: <input type="text" name="aLine2" value="<?php echo $address->getAddressLine2(); ?>" minlength="2">
        </h3>
        <h3>City: <input type="text" name="aCity" value="<?php echo $address->getCity(); ?>">
            <?php if (strlen($aCity_error) > 0)
                echo "<span style='color: red;'>{$aCity_error}</span>"; ?>
        </h3>
        <h3>State: <input type="text" name="aState" value="<?php echo $address->getState(); ?>">
            <?php if (strlen($aZip_error) > 0)
                echo "<span style='color: red;'>{$aZip_error}</span>"; ?>
        </h3>
        <h3>Zip: <input type="text" name="aZip" value="<?php echo $address->getAddressZip(); ?>" minlength="2">
            <?php if (strlen($aZip_error) > 0)
                echo "<span style='color: red;'>{$aZip_error}</span>"; ?>
        </h3>
        <h3>Home Phone: <input type="text" name="hPhone" value="<?php echo $address->getHomePhone(); ?>">
            <?php if (strlen($hPhone_error) > 0)
                echo "<span style='color: red;'>{$hPhone_error}</span>"; ?>
        </h3>
        <h3>Business Phone: <input type="text" name="bPhone" value="<?php echo $address->getBusinessPhone(); ?>">
            <?php if (strlen($bPhone_error) > 0)
                echo "<span style='color: red;'>{$bPhone_error}</span>"; ?>
        </h3>
        <h3>Cell Phone: <input type="text" name="cPhone" value="<?php echo $address->getCellPhone(); ?>">
            <?php if (strlen($cPhone_error) > 0)
                echo "<span style='color: red;'>{$cPhone_error}</span>"; ?>
        </h3>
        <h3>E-Mail Address: <input type="text" name="aEmail" value="<?php echo $address->getEMail(); ?>">
            <?php if (strlen($aEmail_error) > 0)
                echo "<span style='color: red;'>{$aEmail_error}</span>"; ?>
        </h3>
        <h3>Web Address: <input type="text" name="aWeb" value="<?php echo $address->getWebAddress(); ?>">
            <?php if (strlen($aWeb_error) > 0)
                echo "<span style='color: red;'>{$aWeb_error}</span>"; ?>
        </h3>
        <input type="hidden" name="aNo" value="<?php echo $address->getAddressId(); ?>">
        <input type="submit" value="Save" name="save">
        <input type="submit" value="Cancel" name="cancel">
    </form>
</body>

</html>