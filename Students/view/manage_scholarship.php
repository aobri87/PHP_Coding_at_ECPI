<?php
//updated: 24 Feb 2022
//written by: Andrew O'Brien
session_start();

require_once('../controller/user.php');
require_once('../controller/user_controller.php');
require_once('../controller/scholarship.php');
require_once('../controller/scholarship_controller.php');
require_once('../controller/user_scholarship.php');
require_once('../controller/user_scholarship_controller.php');
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
if (isset($_GET['uNo'])) {
    $user =
        UserController::getUserByNo($_GET['uNo']);
    $pageTitle = "Manage Your Scholarships";
}

/* commented out because it is not needed at this time.
if (isset($_POST['update'])) {
    //update button pressed for a user
    if (isset($_POST['cNoUpd'])) {
        $_SESSION['schDate'] = $_POST['schDate'];
        $_SESSION['schExpDate'] = $_POST['schExpDate'];

        header('Location: ./scholarship_add_update.php?cNo=' . $_POST['cNoUpd']);
    }
    unset($_POST['update']);
    unset($_POST['cNoUpd']);
}
*/
if (isset($_POST['add'])) {
    //update button pressed for a user
    if (isset($_POST['cNoUpd'])) {
        $user_scholarship = new User_Scholarship($userID, $_POST['cNoUpd']);
        User_ScholarshipController::addAUser_Scholarship($user_scholarship);

        header('Location: ./manage_scholarship.php?uNo=' . $userID);
    }
    unset($_POST['add']);
    unset($_POST['cNoUpd']);
}

if (isset($_POST['delete'])) {
    //delte button pressed for a user
    if (isset($_POST['cNoDel'])) {
        if (isset($_GET['uNo'])) {
            User_ScholarshipController::deleteUser_Scholarship($userID, $_POST['cNoDel']);
        } else {
            ScholarshipController::deleteScholarshipById($_POST['cNoDel']);
        }
    }
    unset($_POST['delete']);
    unset($_POST['cNoDel']);
}
?>
<html>

<head>
    <title>ECPI Student Tracker</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
    <h1>ECPI Student Tracker</h1>
    <h2><?php echo $pageTitle; ?></h2>
    <h2><a href="<?php if ($student && isset($_GET['uNo']) || $admin) {
                        echo './manage_scholarship.php';
                    } else {
                        echo './scholarship_add_update.php';
                    } ?>"><?php echo $sectionTitle; ?></a></h2>
    <table>
        <tr>
            <th>Sch Name</th>
            <th>Sch Amount</th>
            <th>Sch Description</th>
            <th>Sch Organization</th>
            <?php if ($student && isset($_GET['uNo']) || $admin) echo "<th>Verified Status</th>" ?>
            <th>&nbsp;</th>
        </tr>
        <?php if (isset($_GET['uNo'])) {
            foreach (User_ScholarshipController::getUser_ScholarshipForUserId($userID) as $sch) : ?>
                <tr>
                    <td><?php echo $sch->getSchName(); ?></td>
                    <td><?php echo $sch->getSchAmount(); ?></td>
                    <td><?php echo $sch->getSchDesc(); ?></td>
                    <td><?php echo $sch->getSchOrg(); ?></td>
                    <td><?php if ($sch->getSchVerified() === "1") {
                            echo "Verified";
                        } else {
                            echo "Not-Verified";
                        }; ?></td>
                    <!-- commented out because it is not needed at this time. Also the php code here is commented out
                    <td>
                        <form method="POST">
                            <input type="hidden" name="cNoUpd" value="<?php //echo $sch->getSchId(); 
                                                                        ?>" />
                            <input type="submit" value="Update" name="update" />
                        </form>
                    </td>
                    -->
                    <td>
                        <form method="POST">
                            <input type="hidden" name="cNoDel" value="<?php echo $sch->getSchId(); ?>" />
                            <input type="submit" value="Delete" name="delete" />
                        </form>
                    </td>
                </tr>
            <?php endforeach;
        } else if (!isset($_GET['uNo']) && $student) {
            foreach (ScholarshipController::getAllVeriScholarships($userID) as $sch) : ?>
                <tr>
                    <td><?php echo $sch->getSchName(); ?></td>
                    <td><?php echo $sch->getSchAmount(); ?></td>
                    <td><?php echo $sch->getSchDesc(); ?></td>
                    <td><?php echo $sch->getSchOrg(); ?></td>

                    <td>
                        <form method="POST">
                            <input type="hidden" name="cNoUpd" value="<?php echo $sch->getSchId(); ?>" />
                            <input type="submit" value="Add" name="add" />
                            <?php $_SESSION['schAdd'] = TRUE; ?>
                        </form>
                    </td>

                </tr>
            <?php endforeach;
        } else if (!isset($_GET['uNo'])) {
            foreach (ScholarshipController::getAllScholarships() as $sch) : ?>
                <tr>
                    <td><?php echo $sch->getSchName(); ?></td>
                    <td><?php echo $sch->getSchOrg(); ?></td>
                    <td><?php echo $sch->getSchDesc(); ?></td>
                    <td><?php if ($sch->getSchVerified() === "1") {
                            echo "Verified";
                        } else {
                            echo "Not-Verified";
                        }; ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="cNoUpd" value="<?php echo $sch->getSchId(); ?>" />
                            <input type="submit" value="Update" name="update" />
                        </form>
                    </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="cNoDel" value="<?php echo $sch->getSchId(); ?>" />
                            <input type="submit" value="Delete" name="delete" />
                        </form>
                    </td>
                </tr>
        <?php endforeach;
        }
        ?>
    </table>
    <h3><a href="<?php if ($admin === TRUE) {
                        echo 'admin.php';
                    } else if ($student === TRUE) {
                        echo 'student.php';
                    } ?>">Home</a></h3>
</body>

</html>