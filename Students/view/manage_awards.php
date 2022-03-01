<?php
//updated: 22 Feb 2022
//written by: Andrew O'Brien
session_start();

require_once('../controller/user.php');
require_once('../controller/user_controller.php');
require_once('../controller/awards.php');
require_once('../controller/awards_controller.php');
require_once('../controller/user_awards.php');
require_once('../controller/user_awards_controller.php');
$userID = $_SESSION['userID'];
$admin = $_SESSION['admin'];
$student = $_SESSION['student'];
$family = $_SESSION['family'];
$tech = $_SESSION['tech'];
$_SESSION['awdAdd'] = FALSE;
$pageTitle = "Manage Awards";
$sectionTitle = "Add Award";
if (isset($_GET['uNo'])) {
    $user =
        UserController::getUserByNo($_GET['uNo']);
    $pageTitle = "Manage Your Awards";
}

if (isset($_POST['update'])) {
    //update button pressed for a user
    if (isset($_POST['uNoUpd'])) {
        $_SESSION['awdDate'] = $_POST['awdDate'];

        header('Location: ./awards_add_update.php?aNo=' . $_POST['uNoUpd']);
    }
    unset($_POST['update']);
    unset($_POST['uNoUpd']);
}

if (isset($_POST['delete'])) {
    //delte button pressed for a user
    if (isset($_POST['uNoDel'])) {
        if (isset($_GET['uNo'])) {
            User_AwardsController::deleteUser_Awards($userID, $_POST['uNoDel'], $_POST['awdDate']);
        } else {
            AwardsController::deleteAwardById($_POST['uNoDel']);
        }
    }
    unset($_POST['delete']);
    unset($_POST['uNoDel']);
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
                        echo './manage_awards.php';
                    } else {
                        echo './awards_add_update.php';
                    } ?>"><?php echo $sectionTitle; ?></a></h2>
    <table>
        <tr>
            <th>Award Name</th>
            <th>Awarding Organization</th>
            <th>Award Description</th>
            <?php if ($student && isset($_GET['uNo'])) echo "<th>Award Date</th>" ?>
            <?php if ($admin && isset($_GET['uNo'])) echo "<th>Award Date</th>" ?>
            <?php if ($student && isset($_GET['uNo']) || $admin) echo "<th>Verified Status</th>" ?>
            <th>&nbsp;</th>
            <?php if ($student && isset($_GET['uNo'])) echo "<th>&nbsp;</th>"; ?>
        </tr>
        <?php if (isset($_GET['uNo'])) {
            foreach (User_AwardsController::getUser_AwardsForUserId($userID) as $award) : ?>
                <tr>
                    <td><?php echo $award->getAwd2Name(); ?></td>
                    <td><?php echo $award->getAwd2Org(); ?></td>
                    <td><?php echo $award->getAwd2Desc(); ?></td>
                    <td><?php echo $award->getAwd2Date(); ?></td>
                    <td><?php if ($award->getAwd2Verified() === "1") {
                            echo "Verified";
                        } else {
                            echo "Not-Verified";
                        }; ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="uNoUpd" value="<?php echo $award->getAwd2Id(); ?>" />
                            <input type="hidden" name="awdDate" value="<?php echo $award->getAwd2Date(); ?>" />
                            <input type="submit" value="Update" name="update" />
                        </form>
                    </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="uNoDel" value="<?php echo $award->getAwd2Id(); ?>" />
                            <input type="hidden" name="awdDate" value="<?php echo $award->getAwd2Date(); ?>" />
                            <input type="submit" value="Delete" name="delete" />
                        </form>
                    </td>
                </tr>
            <?php endforeach;
        } else if (!isset($_GET['uNo']) && $student) {
            foreach (AwardsController::getAllVeriAwards($userID) as $award) : ?>
                <tr>
                    <td><?php echo $award->getAwdName(); ?></td>
                    <td><?php echo $award->getAwdOrg(); ?></td>
                    <td><?php echo $award->getAwdDesc(); ?></td>

                    <td>
                        <form method="POST">
                            <input type="hidden" name="uNoUpd" value="<?php echo $award->getAwdId(); ?>" />
                            <input type="submit" value="Add" name="update" />
                            <?php $_SESSION['awdAdd'] = TRUE; ?>
                        </form>
                    </td>

                </tr>
            <?php endforeach;
        } else if (!isset($_GET['uNo'])) {
            foreach (AwardsController::getAllAwards() as $award) : ?>
                <tr>
                    <td><?php echo $award->getAwdName(); ?></td>
                    <td><?php echo $award->getAwdOrg(); ?></td>
                    <td><?php echo $award->getAwdDesc(); ?></td>
                    <td><?php if ($award->getAwdVerified() === "1") {
                            echo "Verified";
                        } else {
                            echo "Not-Verified";
                        }; ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="uNoUpd" value="<?php echo $award->getAwdId(); ?>" />
                            <input type="submit" value="Update" name="update" />
                        </form>
                    </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="uNoDel" value="<?php echo $award->getAwdId(); ?>" />
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