<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien

include_once('user.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/user_db.php");
include_once('role.php');
include_once($_SERVER['DOCUMENT_ROOT']."/students/model/role_db.php");

class UserController {
    //helper function for taking all information
    //from a user info query (row) and converting 
    //it into a User object
    private static function rowToUser($row) {
        $user = new User($row['USER_UNAME'],
            $row['USER_PWORD'],
            $row['USER_FNAME'],
            $row['USER_MNAME'],
            $row['USER_LNAME'],
            $row['USER_DOB'],
            $row['USER_RACE'],
            $row['USER_GENDER'],
            new Role($row['ROL_ID'], $row['ROL_NAME'], $row['ROL_DESC']),
            $row['USER_REL'],
            $row['ADD_ID']);
        $user->setUserId($row['USER_ID']);
        return $user;
    }

    //function to get all user in the database
    public static function getAllUsers() {
        $queryRes = UserDB::getUsers();

        if ($queryRes) {
            //process the results into an array with
            //the UserNo and the UserName - allows the
            //UI to not care about the DB structure
            $user = array();
            foreach ($queryRes as $row) {
                //process each row into an array of
                //User objects (i.e. "user")
                $user[] = self::rowToUser($row);
            }

            return $user;
        } else {
            return false;
        }
    }

    //function to get a specific user by their USER_ID
    public static function getUserByNo($USER_ID) {
        $queryRes = UserDB::getUser($USER_ID);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser($queryRes);
        } else {
            return false;
        }
    }

    //function to get a specific user by their USER_NAME
    public static function getUserByUName($USER_NAME) {
        $queryRes = UserDB::getUserName($USER_NAME);

        if ($queryRes) {
            //this query only returns a single row, so
            //just process it
            return self::rowToUser($queryRes);
        } else {
            return false;
        }
    }

    //function to delete a user by their USER_ID
    public static function deleteUser($USER_ID) {
        //no special processing needed - just use the
        //DB function
        return UserDB::deleteUser($USER_ID);
    }

    //function to add a user to the DB
    public static function addAUser($user) {
        return UserDB::addUser(
            $user->getUserName(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getMiddleName(),
            $user->getLastName(),
            $user->getDateOfBirth(),
            $user->getRace(),
            $user->getGender(),
            $user->getRoleNo(),
            $user->getUserRel(),
            $user->getAddressId());
    }

    //function to update a user's information
    public static function updateAUser($user) {
        return UserDB::updateUser(
            $user->getUserId(),
            $user->getUserName(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getMiddleName(),
            $user->getLastName(),
            $user->getDateOfBirth(),
            $user->getRace(),
            $user->getGender(),
            $user->getRoleNo(),
            $user->getUserRel(),
            $user->getAddressId());
    }
    //function to update a user's information
    public static function updateAUserAddress($user) {
        return UserDB::updateUserAddress(
            $user->getUserId(),
            $user->getAddressId());
    }

    public static function validUser($USER_UNAME, $USER_PWORD) {
        $queryRes = UserDB::getUserByUserName($USER_UNAME);

        if ($queryRes) {
            //process the user row
            $user = self::rowToUser($queryRes);
            if ($user->getPassword() === $USER_PWORD) {
                return $user->getRoleNo()->getRoleID();
            } else {
                return false;
            }
        } else {
            //either no such user or db connect failed - 
            //either way, can't validate the user
            return false;
        }
    }
}
?>