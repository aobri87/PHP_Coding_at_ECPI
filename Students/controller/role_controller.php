<?php
//updated: 1 Feb 2022
//written by: Andrew O'Brien

include_once('role.php');
include_once('../model/role_db.php');

class RoleController {
    public static function getAllRoles () {
        $queryRes = RoleDB::getRoles();

        if ($queryRes) {
            //process the results into an array of
            //Role objects
            $roles = array();
            foreach ($queryRes as $row) {
                $roles[] = new Role($row['ROL_ID'],
                    $row['ROL_NAME'], $row['ROL_DESC']);
            }

            //return the array of Role information
            return $roles;
        } else {
            return false;
        }
    }
}
?>
