<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien

require_once('../controller/hobby.php');
require_once('../controller/hobby_controller.php');
require_once('../controller/validator.php');

$hobbies = HobbyController::getAllHobbies();


    //default hobby for add - empty strings and first level
    //in list
    $hobby = new Hobby('', '', '');
    $hobby->setHobbyId(-1);
    $pageTitle = "Add a New Hobby";
    //validation 
    //Declare and clear variables for error message
    $hName_error = 'Required';
    $hDesc_error = 'Required';
    
    //Retrieve the hobbyId from the query string and
    //and use it to create a hobby object for that hNo
    if (isset($_GET['hNo'])) {
        $hobby = 
            HobbyController::getHobbyById($_GET['hNo']);
        $pageTitle = "Update an Existing Hobby";
        //Declare and clear variables for error message
        $hName_error = '';
        $hDesc_error = '';
    }

    if (isset($_POST['save'])) {
        //save button - perform add or update
        //hobbyFirstNameOptions are 1, 2 ,3
        $upHobby = new Hobby($_POST['hName'], $_POST['hDesc'], $_POST['hVeri']);
        $upHobby->setHobbyId($_POST['hNo']); 

        //validate the values entered
        //$hDesc_error = OBrien_validation\stringValid($hobby->getFirstName(), 2, $hDesc_error);
        //$aZip_error = OBrien_validation\stringValid($hobby->getLastName(), 2, $aZip_error);
        //$hName_error = OBrien_validation\stringValid($hobby->getHobbyName(), 4, $hName_error);
        //$cOrg_error = OBrien_validation\passValid($hobby->getPassword(), $cOrg_error);
        //$hPhone_error = OBrien_validation\birthValid($hobby->getDateOfBirth(),$hPhone_error);
        //$bPhone_error = OBrien_validation\emailValid($hobby->getRace(),$bPhone_error);
        //$USER_GENDER_error = OBrien_validation\extValid($hobby->getDateOfBirth(),$USER_GENDER_error);       
        
        //currently commented out to test code
        //if (strlen($hDesc_error) === 0 && strlen($aZip_error) === 0
        //        && strlen($hName_error) === 0 && strlen($cOrg_error) === 0
        //        && strlen($hPhone_error) === 0 && strlen($bPhone_error) === 0 
        //        && strlen($USER_GENDER_error) === 0) {
            if ($upHobby->getHobbyID() === '-1') {
                //add
                HobbyController::addAHobby($upHobby);
                //header('Location: ./admin_manage_hobbies.php');
            } else {
                //update
                HobbyController::updateAHobby($upHobby);
                //header('Location: ./admin_manage_hobbies.php');
                }
            }
    //}

    if (isset($_POST['cancel'])) {
        //cancel button - just go back to list
        header('Location: ./admin_manage_hobbies.php');
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
            <h3>Hobby Name: <input type="text" name="hName"
                value="<?php echo $hobby->getHobbyName(); ?>">
                <?php if (strlen($hName_error) > 0)
                    echo "<span style='color: red;'>{$hName_error}</span>"; ?>
            </h3>
            <h3>Hobby Description: <textarea name="hDesc" rows="4" cols="30"
                value="<?php echo $hobby->getHobbyDesc(); ?>"><?php echo $hobby->getHobbyDesc(); ?></textarea>
                <?php if (strlen($hDesc_error) > 0)
                    echo "<span style='color: red;'>{$hDesc_error}</span>"; ?>
            </h3>
            <h3>Verified Status: <select name="hVeri">
                    <option value="0" <?php if ("0" === $hobby->getHobVerified()) { echo 'selected'; } ?>>
                        Not-Verified
                    </option>
                    <option value="1" <?php if ("1" === $hobby->getHobVerified()) { echo 'selected'; } ?>>
                        Verified
                    </option>
                </select>
            </h3> 
            <input type="hidden" name="hNo"
                value="<?php echo $hobby->getHobbyID(); ?>" >
            <input type="submit" value="Save" name="save">
            <input type="submit" value="Cancel" name="cancel">
        </form>
    </body>
</html>