<?php
//updated: 24 Feb 2022
//written by: Andrew O'Brien
session_start();
require_once('../controller/user.php');
require_once('../controller/user_controller.php');
require_once('../controller/validator.php');
require_once('../controller/role.php');
require_once('../controller/role_controller.php');

$role = RoleController::getAllRoles();
//$users required for unique genders
$users = UserController::getAllUsers();
$admin = $_SESSION['admin'];
$student = $_SESSION['student'];
$family = $_SESSION['family'];
$tech = $_SESSION['tech'];


//default user for add - empty strings and first level
//in list
$user = new User('', '', '', '', '', date('Y-m-d'), '', '', $role[1], '', '', '');
$user->setUserId(-1);
$pageTitle = "Add a New User";
//validation 
//Declare and clear variables for error message
$uName_error = 'Required';
$uPass_error = 'Required';
$uFName_error = 'Required';
$uLName_error = 'Required';
$uDOB_error = 'Required';
$uRace_error = 'Required';
$USER_GENDER_error = 'Required';


//Retrieve the userId from the query string and
//and use it to create a user object for that uNo
if (isset($_GET['uNo'])) {
    $user =
        UserController::getUserByNo($_GET['uNo']);
    $pageTitle = "Update an Existing User";
    //Declare and clear variables for error message
    $uName_error = '';
    $uPass_error = '';
    $uFName_error = '';
    $uLName_error = '';
    $uDOB_error = '';
    $uRace_error = '';
    $USER_GENDER_error = '';
}

if (isset($_POST['save'])) {
    //save button - perform add or update
    //userFirstNameOptions are 1, 2 ,3
    if (isset($_GET['uNo'])) {
        $a = UserController::getUserByNo($_GET['uNo']);

        $upUser = new User(
            $_POST['uId'],
            $_POST['uPass'],
            $_POST['uFName'],
            $_POST['uMName'],
            $_POST['uLName'],
            $_POST['uDOB'],
            $_POST['uRace'],
            $_POST['uGender'],
            $_POST['uLNo'],
            $a->getUserRel(),
            $a->getAddressId()
        );
    } else {
        $upUser = new User(
            $_POST['uId'],
            $_POST['uPass'],
            $_POST['uFName'],
            $_POST['uMName'],
            $_POST['uLName'],
            $_POST['uDOB'],
            $_POST['uRace'],
            $_POST['uGender'],
            $_POST['uLNo'],
            NULL,
            NULL
        );
    }

    $upUser->setUserId($_POST['uNo']);

    //validate the values entered
    //$uFName_error = OBrien_validation\stringValid($user->getFirstName(), 2, $uFName_error);
    //$uLName_error = OBrien_validation\stringValid($user->getLastName(), 2, $uLName_error);
    //$uName_error = OBrien_validation\stringValid($user->getUserName(), 4, $uName_error);
    //$uPass_error = OBrien_validation\passValid($user->getPassword(), $uPass_error);
    //$uDOB_error = OBrien_validation\birthValid($user->getDateOfBirth(),$uDOB_error);
    //$uRace_error = OBrien_validation\emailValid($user->getRace(),$uRace_error);
    //$USER_GENDER_error = OBrien_validation\extValid($user->getDateOfBirth(),$USER_GENDER_error);       

    //currently commented out to test code
    //if (strlen($uFName_error) === 0 && strlen($uLName_error) === 0
    //        && strlen($uName_error) === 0 && strlen($uPass_error) === 0
    //        && strlen($uDOB_error) === 0 && strlen($uRace_error) === 0 
    //        && strlen($USER_GENDER_error) === 0) {
    if ($upUser->getUserId() === '-1') {
        //add
        UserController::addAUser($upUser);
        header('Location: ./admin_manage_users.php');
    } else {
        //update
        UserController::updateAUser($upUser);
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
        header('Location: ./admin_manage_users.php');
    } else if ($student === true) {
        header('Location: ./student.php');
    } else if ($family === true) {
        header('Location: ./family.php');
    } else if ($tech === true) {
        header('Location: ./tech.php');
    };
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
        <h3>User Name: <input type="text" name="uId" value="<?php echo $user->getUserName(); ?>">
            <?php if (strlen($uName_error) > 0)
                echo "<span style='color: red;'>{$uName_error}</span>"; ?>
        </h3>
        <h3>Password: <input type="text" name="uPass" value="<?php echo $user->getPassword(); ?>" minlength="2">
            <?php if (strlen($uPass_error) > 0)
                echo "<span style='color: red;'>{$uPass_error}</span>"; ?>
        </h3>
        <h3>First Name: <input type="text" name="uFName" value="<?php echo $user->getFirstName(); ?>">
            <?php if (strlen($uFName_error) > 0)
                echo "<span style='color: red;'>{$uFName_error}</span>"; ?>
        </h3>
        <h3>Middle Name: <input type="text" name="uMName" value="<?php echo $user->getMiddleName(); ?>">
        </h3>
        <h3>Last Name: <input type="text" name="uLName" value="<?php echo $user->getLastName(); ?>" minlength="2">
            <?php if (strlen($uLName_error) > 0)
                echo "<span style='color: red;'>{$uLName_error}</span>"; ?>
        </h3>
        <h3>Date of Birth: <input type="date" name="uDOB" value="<?php echo $user->getDateOfBirth(); ?>">
            <?php if (strlen($uDOB_error) > 0)
                echo "<span style='color: red;'>{$uDOB_error}</span>"; ?>
        </h3>
        <h3>Race: <input type="text" name="uRace" value="<?php echo $user->getRace(); ?>">
            <?php if (strlen($uRace_error) > 0)
                echo "<span style='color: red;'>{$uRace_error}</span>"; ?>
        </h3>
        <h3>Gender: <select name="uGender">
                <?php
                //$arr = array();
                //foreach($users as $gen){$arr[] = $gen->getGender();}
                //$unique_gender = array_unique($arr);

                //foreach($unique_gender as $gender) : 
                ?>
                <option value="Male" <?php if ("Male" === $user->getGender()) {
                                            echo 'selected';
                                        } ?>>
                    Male
                </option>
                <option value="Female" <?php if ("Female" === $user->getGender()) {
                                            echo 'selected';
                                        } ?>>
                    Female
                </option>
                <option value="Non-Binary" <?php if ("Non-Binary" === $user->getGender()) {
                                                echo 'selected';
                                            } ?>>
                    Non-Binary
                </option>
                <option value="Other" <?php if ("Other" === $user->getGender()) {
                                            echo 'selected';
                                        } ?>>
                    Other
                </option>
            </select>
        </h3>
        <h3>Role: <select name="uLNo">
                <?php foreach ($role as $level) : ?>
                    <option value="<?php echo $level->getRoleID(); ?>" <?php if (
                                                                            $level->getRoleID() ===
                                                                            $user->getRoleNo()->getRoleID()
                                                                        ) {
                                                                            echo 'selected';
                                                                        } ?>>
                        <?php echo $level->getRoleName(); ?></option>
                <?php endforeach ?>
            </select>
        </h3>
        <input type="hidden" name="uNo" value="<?php echo $user->getUserId(); ?>">
        <input type="submit" value="Save" name="save">
        <input type="submit" value="Cancel" name="cancel">
    </form>
    <?php include 'manage_awards.php'; ?>
</body>

</html>