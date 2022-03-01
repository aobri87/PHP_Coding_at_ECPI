<?php
session_start();
require_once('../util/security.php');

//confirm user is authorized for the page
Security::checkAuthority('family');

//user clicked the logout button
if (isset($_POST['logout'])) {
    Security::logout();
}
?>
<html>
    <head>
        <title>ECPI Student Tracker - Family</title>
    </head>

    <body>
        <h1>ECPI Student Tracker</h1>
        <h2>Family Options</h2>
        <ul>
            <li><h2><a href="../view/admin_manage_users.php">
                Manage Students</a></h2></li>
        </ul>
        <ul>
            <li><h2><a href="../view/admin_image_management.php">
                Manage Images</a></h2></li>
        </ul>
        <ul>
            <li><h2><a href="../view/admin_image_management.php">
                Data Review</a></h2></li>
        </ul>
        <form method='POST'>
            <input type="submit" value="Logout" name="logout">
        </form>
    </body>
</html>
