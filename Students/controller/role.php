<?php
//updated: 1 Feb 2022
//written by: Andrew O'Brien

//Role class to represent a single entry in the
//Roles table
class Role {
    //class properties - match the columns in the
    //Roles table; control access via get/set 
    //methods and the constructor
    private $ROL_ID;
    private $ROL_NAME;
    private $ROL_DESC;
    
    public function __construct($ROL_ID, $ROL_NAME, $ROL_DESC) {
        $this->ROL_ID = $ROL_ID;
        $this->ROL_NAME = $ROL_NAME;
        $this->ROL_DESC = $ROL_DESC;
    }

    public function getRoleID() {
        return $this->ROL_ID;
    }
    public function setRoleID($value) {
        $this->ROL_ID = $value;
    }

    public function getRoleName() {
        return $this->ROL_NAME;
    }
    public function setRoleName($value) {
        $this->ROL_NAME = $value;
    }

    public function getRoleDesc() {
        return $this->ROL_DESC;
    }
    public function setRoleDesc($value) {
        $this->ROL_DESC = $value;
    }
}
?>