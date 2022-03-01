<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien

require_once('../controller/social.php');
require_once('../controller/social_controller.php');
require_once('../controller/validator.php');

$socials = SocialController::getAllSocials();


    //default social for add - empty strings and first level
    //in list
    $social = new Social('', '', '');
    $social->setSocId(-1);
    $pageTitle = "Add a New Social";
    //validation 
    //Declare and clear variables for error message
    $sName_error = 'Required';
    $sWeb_error = 'Required';
    
    //Retrieve the socialId from the query string and
    //and use it to create a social object for that sNo
    if (isset($_GET['sNo'])) {
        $social = 
            SocialController::getSocialById($_GET['sNo']);
        $pageTitle = "Update an Existing Social";
        //Declare and clear variables for error message
        $sName_error = '';
        $sWeb_error = '';
    }

    if (isset($_POST['save'])) {
        //save button - perform add or update
        //socialFirstNameOptions are 1, 2 ,3
        $upSocial = new Social($_POST['sName'], $_POST['sWeb'], $_POST['sVeri']);
        $upSocial->setSocId($_POST['sNo']); 

        //validate the values entered
        //$aDesc_error = OBrien_validation\stringValid($social->getFirstName(), 2, $aDesc_error);
        //$aZip_error = OBrien_validation\stringValid($social->getLastName(), 2, $aZip_error);
        //$sName_error = OBrien_validation\stringValid($social->getSocialName(), 4, $sName_error);
        //$sWeb_error = OBrien_validation\passValid($social->getPassword(), $sWeb_error);
        //$hPhone_error = OBrien_validation\birthValid($social->getDateOfBirth(),$hPhone_error);
        //$bPhone_error = OBrien_validation\emailValid($social->getRace(),$bPhone_error);
        //$USER_GENDER_error = OBrien_validation\extValid($social->getDateOfBirth(),$USER_GENDER_error);       
        
        //currently commented out to test code
        //if (strlen($aDesc_error) === 0 && strlen($aZip_error) === 0
        //        && strlen($sName_error) === 0 && strlen($sWeb_error) === 0
        //        && strlen($hPhone_error) === 0 && strlen($bPhone_error) === 0 
        //        && strlen($USER_GENDER_error) === 0) {
            if ($upSocial->getSocId() === '-1') {
                //add
                SocialController::addASocial($upSocial);
                //header('Location: ./admin_manage_socials.php');
            } else {
                //update
                SocialController::updateASocial($upSocial);
                //header('Location: ./admin_manage_socials.php');
                }
            }
    //}

    if (isset($_POST['cancel'])) {
        //cancel button - just go back to list
        header('Location: ./admin_manage_socials.php');
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
            <h3>Social Network Name: <input type="text" name="sName"
                value="<?php echo $social->getSocName(); ?>">
                <?php if (strlen($sName_error) > 0)
                    echo "<span style='color: red;'>{$sName_error}</span>"; ?>
            </h3>
            <h3>Social Network Web-Address: <input type="text" name="sWeb"
                value="<?php echo $social->getSocWeb(); ?>" minlength="2">
                <?php if (strlen($sWeb_error) > 0)
                    echo "<span style='color: red;'>{$sWeb_error}</span>"; ?>
            </h3>
            <h3>Verified Status: <select name="sVeri">
                    <option value="0" <?php if ("0" === $social->getSocVerified()) { echo 'selected'; } ?>>
                        Not-Verified
                    </option>
                    <option value="1" <?php if ("1" === $social->getSocVerified()) { echo 'selected'; } ?>>
                        Verified
                    </option>
                </select>
            </h3> 
            <input type="hidden" name="sNo"
                value="<?php echo $social->getSocId(); ?>" >
            <input type="submit" value="Save" name="save">
            <input type="submit" value="Cancel" name="cancel">
        </form>
    </body>
</html>