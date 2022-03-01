<?php
//updated: 14 Feb 2022
//written by: Andrew O'Brien

require_once('../controller/skills.php');
require_once('../controller/skill_controller.php');
require_once('../controller/validator.php');

$skillss = SkillsController::getAllSkills();


    //default skills for add - empty strings and first level
    //in list
    $skills = new Skills('', '', '', '', '');
    $skills->setSklId(-1);
    $pageTitle = "Add a New Skill";
    //validation 
    //Declare and clear variables for error message
    $sName_error = 'Required';
    $sDesc_error = 'Required';
    $sCat_error = 'Required';
    $sSubCat_error = '';
    
    //Retrieve the skillsId from the query string and
    //and use it to create a skills object for that sNo
    if (isset($_GET['sNo'])) {
        $skills = 
            SkillsController::getSkillsById($_GET['sNo']);
        $pageTitle = "Update an Existing Skill";
        //Declare and clear variables for error message
        $sName_error = '';
        $sDesc_error = '';
        $sCat_error = '';
        $sSubCat_error = '';
    }

    if (isset($_POST['save'])) {
        //save button - perform add or update
        //skillsFirstNameOptions are 1, 2 ,3
        $upSkills = new Skills($_POST['sName'], $_POST['sDesc'], $_POST['sCat'], $_POST['sSubCat'], $_POST['sVeri']);
        $upSkills->setSklId($_POST['sNo']); 

        //validate the values entered
        //$sDesc_error = OBrien_validation\stringValid($skills->getFirstName(), 2, $sDesc_error);
        //$aZip_error = OBrien_validation\stringValid($skills->getLastName(), 2, $aZip_error);
        //$sName_error = OBrien_validation\stringValid($skills->getSkillsName(), 4, $sName_error);
        //$sCat_error = OBrien_validation\passValid($skills->getPassword(), $sCat_error);
        //$hPhone_error = OBrien_validation\birthValid($skills->getDateOfBirth(),$hPhone_error);
        //$bPhone_error = OBrien_validation\emailValid($skills->getRace(),$bPhone_error);
        //$USER_GENDER_error = OBrien_validation\extValid($skills->getDateOfBirth(),$USER_GENDER_error);       
        
        //currently commented out to test code
        //if (strlen($sDesc_error) === 0 && strlen($aZip_error) === 0
        //        && strlen($sName_error) === 0 && strlen($sCat_error) === 0
        //        && strlen($hPhone_error) === 0 && strlen($bPhone_error) === 0 
        //        && strlen($USER_GENDER_error) === 0) {
            if ($upSkills->getSklId() === '-1') {
                //add
                SkillsController::addASkills($upSkills);
                //header('Location: ./admin_manage_skillss.php');
            } else {
                //update
                SkillsController::updateASkills($upSkills);
                //header('Location: ./admin_manage_skillss.php');
                }
            }
    //}

    if (isset($_POST['cancel'])) {
        //cancel button - just go back to list
        header('Location: ./admin_manage_skillss.php');
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
            <h3>Skill Name: <input type="text" name="sName"
                value="<?php echo $skills->getSklName(); ?>">
                <?php if (strlen($sName_error) > 0)
                    echo "<span style='color: red;'>{$sName_error}</span>"; ?>
            </h3>
            <h3>Skill Description: <textarea name="sDesc" rows="4" cols="30"
                value="<?php echo $skills->getSklDesc(); ?>"><?php echo $skills->getSklDesc(); ?></textarea>
                <?php if (strlen($sDesc_error) > 0)
                    echo "<span style='color: red;'>{$sDesc_error}</span>"; ?>
            </h3>
            <h3>Skill Category: <input type="text" name="sCat"
                value="<?php echo $skills->getSklCat(); ?>" minlength="2">
                <?php if (strlen($sCat_error) > 0)
                    echo "<span style='color: red;'>{$sCat_error}</span>"; ?>
            </h3>
            <h3>Skill Sub-Category: <input type="text" name="sSubCat"
                value="<?php echo $skills->getSklSubCat(); ?>" minlength="2">
                <?php if (strlen($sSubCat_error) > 0)
                    echo "<span style='color: red;'>{$sSubCat_error}</span>"; ?>
            </h3>
            <h3>Verified Status: <select name="sVeri">
                    <option value="0" <?php if ("0" === $skills->getSklVerified()) { echo 'selected'; } ?>>
                        Not-Verified
                    </option>
                    <option value="1" <?php if ("1" === $skills->getSklVerified()) { echo 'selected'; } ?>>
                        Verified
                    </option>
                </select>
            </h3> 
            <input type="hidden" name="sNo"
                value="<?php echo $skills->getSklId(); ?>" >
            <input type="submit" value="Save" name="save">
            <input type="submit" value="Cancel" name="cancel">
        </form>
    </body>
</html>