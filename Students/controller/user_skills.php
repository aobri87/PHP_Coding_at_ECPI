<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien

//User_Skills class to represent a single entry in the
//User_Skills table
class User_Skills {
    //class properties - match the columns in the
    //Levels table; control access via get/set 
    //methods and the constructor
    private $USER_ID;
    private $SKL_ID;
    private $US_HOURS;
    
    public function __construct($USER_ID, $SKL_ID, $US_HOURS) {
        $this->USER_ID = $USER_ID;
        $this->SKL_ID = $SKL_ID;
        $this->US_HOURS = $US_HOURS;
    }

    public function getUSKLUserId() {
        return $this->USER_ID;
    }
    public function setUSKLUserId($value) {
        $this->USER_ID = $value;
    }

    public function getUSKLSkillId() {
        return $this->SKL_ID;
    }
    public function setUSKLSkillId($value) {
        $this->SKL_ID = $value;
    }

    public function getUSKLHours() {
        return $this->US_HOURS;
    }
    public function setUSKLHours($value) {
        $this->US_HOURS = $value;
    }
}
?>