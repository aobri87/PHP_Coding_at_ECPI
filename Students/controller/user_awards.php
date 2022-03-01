<?php
//updated: 2 Feb 2022
//written by: Andrew O'Brien

//User_Awards class to represent a single entry in the
//Levels table
class User_Awards {
    //class properties - match the columns in the
    //Levels table; control access via get/set 
    //methods and the constructor
    private $USER_ID;
    private $AWD_ID;
    private $AWD_DATE;
    
    public function __construct($USER_ID, $AWD_ID, $AWD_DATE) {
        $this->USER_ID = $USER_ID;
        $this->AWD_ID = $AWD_ID;
        $this->AWD_DATE = $AWD_DATE;
    }

    public function getUAUserId() {
        return $this->USER_ID;
    }
    public function setUAUserId($value) {
        $this->USER_ID = $value;
    }

    public function getUAAwdId() {
        return $this->AWD_ID;
    }
    public function setUAAwdId($value) {
        $this->AWD_ID = $value;
    }

    public function getUAAwdDate() {
        return $this->AWD_DATE;
    }
    public function setUAAwdDate($value) {
        $this->AWD_DATE = $value;
    }
}
?>