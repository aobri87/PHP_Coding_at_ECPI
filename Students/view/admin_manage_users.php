<?php
//updated: 24 Feb 2022
//written by: Andrew O'Brien

require_once('../controller/user.php');
require_once('../controller/user_controller.php');
require_once('../controller/role.php');
require_once('../controller/role_controller.php');


if (isset($_POST['update'])) {
    //update button pressed for a user
    if (isset($_POST['cNoUpd'])) {
        header('Location: ./admin_add_update_user.php?uNo=' . $_POST['cNoUpd']);
    }
    unset($_POST['update']);
    unset($_POST['cNoUpd']);
}

if (isset($_POST['delete'])) {
    //delte button pressed for a user
    if (isset($_POST['cNoDel'])) {
        UserController::deleteUser($_POST['cNoDel']);
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
    <h2>Manage User Accounts</h2>
    <h2><a href="./admin_add_update_user.php">Add User</a></h2>
    <table>
        <tr>
            <th>User Name</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Race</th>
            <th>Gender</th>
            <th>Role</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach (UserController::getAllUsers() as $user) : ?>
            <tr>
                <td><?php echo $user->getUserName(); ?></td>
                <td><?php echo $user->getFirstName(); ?></td>
                <td><?php echo $user->getMiddleName(); ?></td>
                <td><?php echo $user->getLastName(); ?></td>
                <td><?php echo $user->getDateOfBirth(); ?></td>
                <td><?php echo $user->getRace(); ?></td>
                <td><?php echo $user->getGender(); ?></td>
                <td><?php echo $user->getRoleNo()->getRoleName(); ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="cNoUpd" value="<?php echo $user->getUserId(); ?>" />
                        <input type="submit" value="Update" name="update" />
                    </form>
                </td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="cNoDel" value="<?php echo $user->getUserId(); ?>" />
                        <input type="submit" value="Delete" name="delete" />
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h3><a href="admin.php">Home</a></h3>
</body>

</html>