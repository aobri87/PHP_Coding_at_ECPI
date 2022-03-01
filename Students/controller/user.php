<?php 
//updated: 7 Feb 2022
//written by: Andrew O'Brien

//Class to represent an entry in the users table
class User {
    //properties - match the columns in the users table
    private $USER_ID;
    private $USER_UNAME; 
    private $USER_PWORD;
    private $USER_FNAME;
    private $USER_MNAME;
    private $USER_LNAME;
    private $USER_DOB;
    private $USER_RACE;
    private $USER_GENDER; 
    private $ROL_ID;
    private $USER_REL;
    private $ADD_ID;

    public function __construct($USER_UNAME, $USER_PWORD, $USER_FNAME, $USER_MNAME, $USER_LNAME,
        $USER_DOB, $USER_RACE, $USER_GENDER, $ROL_ID, $USER_REL, $ADD_ID, $USER_ID = null)
    {
        $this->USER_UNAME = $USER_UNAME; 
        $this->password = $USER_PWORD; 
        $this->firstName = $USER_FNAME;
        $this->middleName = $USER_MNAME;
        $this->lastName = $USER_LNAME;
        $this->dateOfBirth = $USER_DOB;
        $this->race = $USER_RACE; 
        $this->gender = $USER_GENDER; 
        $this->roleID = $ROL_ID;
        $this->userRel = $USER_REL;
        $this->addressId = $ADD_ID;
        $this->userId = $USER_ID;
    }

    //get and set the user properties
    public function getUserId() {
        return $this->userId;
    }
    public function setUserId($value) {
        $this->userId = $value;
    }

    public function getUserName() {
        return $this->USER_UNAME;
    }
    public function setUserName($value) {
        $this->USER_UNAME = $value;
    }

    public function getPassword() {
        return $this->password;
    }
    public function setPassword($value) {
        $this->password = $value;
    }

    public function getFirstName() {
        return $this->firstName;
    }
    public function setFirstName($value) {
        $this->firstName = $value;
    }

    public function getMiddleName() {
        return $this->middleName;
    }
    public function setMiddleName($value) {
        $this->middleName = $value;
    }

    public function getLastName() {
        return $this->lastName;
    }
    public function setLastName($value) {
        $this->lastName = $value;
    }

    public function getDateOfBirth() {
        return $this->dateOfBirth;
    }
    public function setDateOfBirth($value) {
        $this->dateOfBirth = $value;
    }

    public function getRace() {
        return $this->race;
    }
    public function setRace($value) {
        $this->race = $value;
    }

    public function getGender() {
        return $this->gender;
    }
    public function setGender($value) {
        $this->gender = $value;
    }

    public function getRoleNo() {
        return $this->roleID;
    }
    public function setRoleNo($value) {
        $this->roleID = $value;
    }

    public function getUserRel() {
        return $this->userRel;
    }
    public function setUserRel($value) {
        $this->userRel = $value;
    }

    public function getAddressId() {
        return $this->addressId;
    }
    public function setAddressId($value) {
        $this->addressId = $value;
    }
}
?>
