<?php
//updated: 23 Feb 2022
//written by: Andrew O'Brien
session_start();
require_once('../util/security.php');
require_once('../controller/user.php');
require_once('../controller/user_controller.php');

//confirm user is authorized for the page
Security::checkAuthority('student');

//user clicked the logout button
if (isset($_POST['logout'])) {
    Security::logout();
}
$userID = $_SESSION['userID'];
$user = UserController::getUserByNo($userID);
$admin = $_SESSION['admin'];
$student = $_SESSION['student'];
$family = $_SESSION['family'];
$tech = $_SESSION['tech'];
?>
<html>

<head>
    <title>ECPI Student Tracker - Student</title>
</head>

<body>
    <h1>Welcome <?php echo $user->getFirstName(); ?>!</h1>
    <h2>Student Options</h2>
    <ul>
        <li>
            <h2><a href="../view/admin_add_update_user.php?uNo=<?php echo $user->getUserId(); ?>">
                    Manage User Account</a></h2>
        </li>
    </ul>
    <ul>
        <li>
            <h2><a href="../view/address_add_update.php?aNo=<?php echo $user->getAddressId(); ?>">
                    Manage Address</a></h2>
        </li>
    </ul>
    <ul>
        <li>
            <h2><a href="../view/manage_awards.php?uNo=<?php echo $user->getUserId(); ?>">
                    View and Edit Awards</a></h2>
        </li>
    </ul>
    <ul>
        <li>
            <h2><a href="../view/manage_certification.php?uNo=<?php echo $user->getUserId(); ?>">
                    View and Edit Certifications</a></h2>
        </li>
    </ul>
    <ul>
        <li>
            <h2><a href="../view/manage_scholarship.php?uNo=<?php echo $user->getUserId(); ?>">
                    View and Edit Scholarships</a></h2>
        </li>
    </ul>
    <form method='POST'>
        <input type="submit" value="Logout" name="logout">
    </form>
</body>

</html>