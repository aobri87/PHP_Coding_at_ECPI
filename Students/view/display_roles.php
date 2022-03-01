<?php
require_once('../controller/role.php');
require_once('../controller/role_controller.php');

//temporary code to test the display - create an
//array with 2 roles to display - this will be
//replaced in the next GP when it gets the information
//from the database via the controller classes
//$roles = array (new Role(0, 'Role 0'), new Role(1, 'Role 1'));

?>
<html>
    <head>
        <title>Week3 GP2 - Andrew O'Brien</title>
        <link rel="stylesheet" type="text/css" href="styles.css"/>
    </head>

    <body>
        <h1>Week3 GP2 - Andrew O'Brien</h1>
        <h1>Available Roles</h1>
        <table>
            <tr>
                <th>Role No</th>
                <th>Role Name</th>
                <th>Role Desc</th>
            </tr>
            <?php foreach (RoleController::getAllRoles() as $role) : ?>
                <tr>
                    <td><?php echo $role->getRoleID(); ?></td>
                    <td><?php echo $role->getRoleName(); ?></td>
                    <td><?php echo $role->getRoleDesc(); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <h3><a href="../index.php">Home</a></h3>
    </body>
</html>