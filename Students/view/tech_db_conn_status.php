<?php
require_once('../model/database.php');

//set error reporting to errors only
error_reporting(E_ERROR);

//create an instance of the Database class
$db = new Database();
?>

<html>
    <head>
        <title>ECPI Student Tracker</title>
    </head>

    <body>
        <h1>ECPI Student Tracker</h1>
        <h1>Database Connection Status</h1>
        <ul>
                <li><?php echo "Database Name: "
                    . $db->getDbName(); ?></li>
                <li><?php echo "Database User: "
                    . $db->getDbUser(); ?></li>
                <li><?php echo "Database User USER_PWORD: "
                    . $db->getDbUserPw(); ?></li>
            </ul>
        <?php if (strlen($db->getDbError())) : ?>
            <h2><?php echo $db->getDbError(); ?></h2>
            
        <?php else : ?>
            <h2><?php echo "Successfully connected to "
                . $db->getDbName(); ?></h2>
        <?php endif; ?>
        <h3><a href="tech.php">Home</a></h3>
    </body>
</html>