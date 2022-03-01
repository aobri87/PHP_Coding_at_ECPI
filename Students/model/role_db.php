<?php
//updated: 1 Feb 2022
//written by: Andrew O'Brien

require_once('database.php');

//class for doing roles table queries; only gets all
//existing roles for now
class RoleDB {
    //get all roles in the DB; returns fals if the
    //database connection fails
    public static function getRoles() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 'SELECT * FROM roles';

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }
}
?>