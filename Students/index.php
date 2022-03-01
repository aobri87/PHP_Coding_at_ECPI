<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien

session_start();
require_once('controller/user.php');
require_once('controller/user_controller.php');
require_once('util/security.php');

Security::checkHTTPS();

//set the message related to login/logout functionality
$login_msg = isset($_SESSION['logout_msg']) ?
    $_SESSION['logout_msg'] : '';

if (isset($_POST['uName']) & isset($_POST['pw'])) {
    //login and password fields were set
    $user_level = UserController::validUser(
        $_POST['uName'], $_POST['pw']);
        $user = UserController::getUserByUName($_POST['uName']);

    if ($user_level === '1') {
        $_SESSION['admin'] = true;
        $_SESSION['student'] = false;
        $_SESSION['family'] = false;
        $_SESSION['tech'] = false;
        header("Location: view/admin.php");
    } else if ($user_level === '2') {
        $_SESSION['admin'] = false;
        $_SESSION['student'] = true;
        $_SESSION['family'] = false;
        $_SESSION['tech'] = false;
        $_SESSION['userID'] = $user->getUserId();
        header("Location: view/student.php");
    } else if ($user_level === '3') {
        $_SESSION['admin'] = false;
        $_SESSION['student'] = false;
        $_SESSION['family'] = true;
        $_SESSION['tech'] = false;
        header("Location: view/family.php");
    } else if ($user_level === '4') {
        $_SESSION['admin'] = false;
        $_SESSION['student'] = false;
        $_SESSION['family'] = false;
        $_SESSION['tech'] = true;
        header("Location: view/tech.php");
    } else {
        $login_msg = 'Failed Authentication - try again.';
    }
} 
?>
<html>
    <head>
        <title>ECPI Student Tracker Log-in</title>
    </head>

    <body>
        <h1>ECPI Student Tracker Log-in</h1>
        <form method='POST'>
            <h3>Login ID: <input type="text"
                name="uName"></h3>
            <h3>Password: <input type="password" name="pw"></h3>
            <input type="submit" value="Login" name="login">
        </form>
        <h2><?php echo $login_msg; ?></h2>
    </body>
</html>