<?php
//updated: 14 Feb 2022
//written by: Andrew O'Brien

require_once('../controller/business.php');
require_once('../controller/business_controller.php');
require_once('../controller/validator.php');

$businesss = BusinessController::getAllBusinesses();


    //default business for add - empty strings and first level
    //in list
    $business = new Business('', '', '', '');
    $business->setBusId(-1);
    $pageTitle = "Add a New Business";
    //validation 
    //Declare and clear variables for error message
    $bName_error = 'Required';
    $addId_error = 'Required';
    $bDesc_error = 'Required';
    
    //Retrieve the businessId from the query string and
    //and use it to create a business object for that bNo
    if (isset($_GET['bNo'])) {
        $business = 
            BusinessController::getBusinessById($_GET['bNo']);
        $pageTitle = "Update an Existing Business";
        //Declare and clear variables for error message
        $bName_error = '';
        $addId_error = '';
        $bDesc_error = '';
    }

    if (isset($_POST['save'])) {
        //save button - perform add or update
        //businessFirstNameOptions are 1, 2 ,3
        $upBusiness = new Business($_POST['bName'], $_POST['addId'], $_POST['bDesc'], $_POST['aVeri']);
        $upBusiness->setBusId($_POST['bNo']); 

        //validate the values entered
        //$bDesc_error = OBrien_validation\stringValid($business->getFirstName(), 2, $bDesc_error);
        //$aZip_error = OBrien_validation\stringValid($business->getLastName(), 2, $aZip_error);
        //$bName_error = OBrien_validation\stringValid($business->getBusinessName(), 4, $bName_error);
        //$addId_error = OBrien_validation\passValid($business->getPassword(), $addId_error);
        //$hPhone_error = OBrien_validation\birthValid($business->getDateOfBirth(),$hPhone_error);
        //$bPhone_error = OBrien_validation\emailValid($business->getRace(),$bPhone_error);
        //$USER_GENDER_error = OBrien_validation\extValid($business->getDateOfBirth(),$USER_GENDER_error);       
        
        //currently commented out to test code
        //if (strlen($bDesc_error) === 0 && strlen($aZip_error) === 0
        //        && strlen($bName_error) === 0 && strlen($addId_error) === 0
        //        && strlen($hPhone_error) === 0 && strlen($bPhone_error) === 0 
        //        && strlen($USER_GENDER_error) === 0) {
            if ($upBusiness->getBusId() === '-1') {
                //add
                BusinessController::addABusiness($upBusiness);
                //header('Location: ./admin_manage_businesss.php');
            } else {
                //update
                BusinessController::updateABusiness($upBusiness);
                //header('Location: ./admin_manage_businesss.php');
                }
            }
    //}

    if (isset($_POST['cancel'])) {
        //cancel button - just go back to list
        header('Location: ./admin_manage_businesss.php');
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
            <h3>Business Name: <input type="text" name="bName"
                value="<?php echo $business->getBusName(); ?>">
                <?php if (strlen($bName_error) > 0)
                    echo "<span style='color: red;'>{$bName_error}</span>"; ?>
            </h3>

            <h3>Business Description: <textarea name="bDesc" rows="4" cols="30"
                value="<?php echo $business->getBusDesc(); ?>"><?php echo $business->getBusDesc(); ?></textarea>
                <?php if (strlen($bDesc_error) > 0)
                    echo "<span style='color: red;'>{$bDesc_error}</span>"; ?>
            </h3>

            <h3>Address Id: <input type="text" name="addId"
                value="<?php echo $business->getBusAddId(); ?>">
                <?php if (strlen($addId_error) > 0)
                    echo "<span style='color: red;'>{$addId_error}</span>"; ?>
            </h3>

            <h3>Verified Status: <select name="aVeri">
                    <option value="0" <?php if ("0" === $business->getBusVerified()) { echo 'selected'; } ?>>
                        Not-Verified
                    </option>
                    <option value="1" <?php if ("1" === $business->getBusVerified()) { echo 'selected'; } ?>>
                        Verified
                    </option>
                </select>
            </h3> 
            <input type="hidden" name="bNo"
                value="<?php echo $business->getBusId(); ?>" >
            <input type="submit" value="Save" name="save">
            <input type="submit" value="Cancel" name="cancel">
        </form>
    </body>
</html>