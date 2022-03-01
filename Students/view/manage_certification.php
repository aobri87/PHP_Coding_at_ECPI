<?php
//updated: 22 Feb 2022
//written by: Andrew O'Brien
session_start();

require_once('../controller/user.php');
require_once('../controller/user_controller.php');
require_once('../controller/certification.php');
require_once('../controller/certification_controller.php');
require_once('../controller/user_certification.php');
require_once('../controller/user_certification_controller.php');
$userID = $_SESSION['userID'];
$admin = $_SESSION['admin'];
$student = $_SESSION['student'];
$family = $_SESSION['family'];
$tech = $_SESSION['tech'];
$_SESSION['certAdd'] = FALSE;
$_SESSION['certDate'] = FALSE;
$_SESSION['certExpDate'] = FALSE;
$pageTitle = "Manage Certifications";
$sectionTitle = "Add Certification";
if (isset($_GET['uNo'])) {
    $user =
        UserController::getUserByNo($_GET['uNo']);
    $pageTitle = "Manage Your Certifications";
}

if (isset($_POST['update'])) {
    //update button pressed for a user
    if (isset($_POST['cNoUpd'])) {
        $_SESSION['certDate'] = $_POST['certDate'];
        $_SESSION['certExpDate'] = $_POST['certExpDate'];

        header('Location: ./certification_add_update.php?cNo=' . $_POST['cNoUpd']);
    }
    unset($_POST['update']);
    unset($_POST['cNoUpd']);
}

if (isset($_POST['delete'])) {
    //delte button pressed for a user
    if (isset($_POST['cNoDel'])) {
        if (isset($_GET['uNo'])) {
            User_CertificationController::deleteUser_Certification($userID, $_POST['cNoDel'], $_POST['certDate']);
        } else {
            CertificationController::deleteCertificationById($_POST['cNoDel']);
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
                        echo './manage_certification.php';
                    } else {
                        echo './certification_add_update.php';
                    } ?>"><?php echo $sectionTitle; ?></a></h2>
    <table>
        <tr>
            <th>Cert Name</th>
            <th>Cert Organization</th>
            <th>Cert Description</th>
            <?php if ($student && isset($_GET['uNo']) || $admin) echo "<th>Cert Date</th>" ?>
            <?php if ($student && isset($_GET['uNo']) || $admin) echo "<th>Cert Exp Date</th>" ?>
            <?php if ($student && isset($_GET['uNo']) || $admin) echo "<th>Verified Status</th>" ?>
            <th>&nbsp;</th>
            <?php if ($student && isset($_GET['uNo'])) echo "<th>&nbsp;</th>"; ?>
        </tr>
        <?php if (isset($_GET['uNo'])) {
            foreach (User_CertificationController::getUser_CertificationForUserId($userID) as $cert) : ?>
                <tr>
                    <td><?php echo $cert->getCertName(); ?></td>
                    <td><?php echo $cert->getCertOrg(); ?></td>
                    <td><?php echo $cert->getCertDesc(); ?></td>
                    <td><?php echo $cert->getCertDate(); ?></td>
                    <td><?php if ($cert->getCertExpDate() !== '0000-00-00') {
                            echo $cert->getCertExpDate();
                        } else {
                            echo 'No Exp Date';
                        } ?></td>
                    <td><?php if ($cert->getCertVerified() === "1") {
                            echo "Verified";
                        } else {
                            echo "Not-Verified";
                        }; ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="cNoUpd" value="<?php echo $cert->getCertId(); ?>" />
                            <input type="hidden" name="certDate" value="<?php echo $cert->getCertDate(); ?>" />
                            <input type="hidden" name="certExpDate" value="<?php echo $cert->getCertExpDate(); ?>" />
                            <input type="submit" value="Update" name="update" />
                        </form>
                    </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="cNoDel" value="<?php echo $cert->getCertId(); ?>" />
                            <input type="hidden" name="certDate" value="<?php echo $cert->getCertDate(); ?>" />
                            <input type="hidden" name="certExpDate" value="<?php echo $cert->getCertExpDate(); ?>" />
                            <input type="submit" value="Delete" name="delete" />
                        </form>
                    </td>
                </tr>
            <?php endforeach;
        } else if (!isset($_GET['uNo']) && $student) {
            foreach (CertificationController::getAllVeriCertifications($userID) as $cert) : ?>
                <tr>
                    <td><?php echo $cert->getCertName(); ?></td>
                    <td><?php echo $cert->getCertOrg(); ?></td>
                    <td><?php echo $cert->getCertDesc(); ?></td>

                    <td>
                        <form method="POST">
                            <input type="hidden" name="cNoUpd" value="<?php echo $cert->getCertId(); ?>" />
                            <input type="submit" value="Add" name="update" />
                            <?php $_SESSION['certAdd'] = TRUE; ?>
                        </form>
                    </td>

                </tr>
            <?php endforeach;
        } else if (!isset($_GET['uNo'])) {
            foreach (CertificationController::getAllCertifications() as $cert) : ?>
                <tr>
                    <td><?php echo $cert->getCertName(); ?></td>
                    <td><?php echo $cert->getCertOrg(); ?></td>
                    <td><?php echo $cert->getCertDesc(); ?></td>
                    <td><?php if ($cert->getCertVerified() === "1") {
                            echo "Verified";
                        } else {
                            echo "Not-Verified";
                        }; ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="cNoUpd" value="<?php echo $cert->getCertId(); ?>" />
                            <input type="submit" value="Update" name="update" />
                        </form>
                    </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="cNoDel" value="<?php echo $cert->getCertId(); ?>" />
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