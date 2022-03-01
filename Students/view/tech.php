<?php
session_start();
require_once('../util/security.php');

//confirm user is authorized for the page
Security::checkAuthority('tech');

//user clicked the logout button
if (isset($_POST['logout'])) {
    Security::logout();
}
?>
<html>
    <head>
        <title>ECPI Student Tracker</title>
    </head>

    <body>
        <h1>ECPI Student Tracker</h1>
        <h2>Manage Incidents</h2>
        <ul>
            <li><h2><a href="../view/tech_incident_management.php">
                View Open Incidents</a></h2></li>
            <li><h2><a href="../view/tech_db_conn_status.php">
                View DB Status</a></h2></li>
        </ul>
        <form method='POST'>
            <input type="submit" value="Logout" name="logout">
        </form>
    </body>
</html>
