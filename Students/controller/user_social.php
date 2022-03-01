<?php
//updated: 2 Feb 2022
//written by: Andrew O'Brien

//User_Social class to represent a single entry in the
//User_Social table
class User_Social {
    //class properties - match the columns in the
    //Levels table; control access via get/set 
    //methods and the constructor
    private $USER_ID;
    private $SOC_ID;
    private $USOC_ID;
    
    public function __construct($USER_ID, $SOC_ID, $USOC_ID) {
        $this->USER_ID = $USER_ID;
        $this->SOC_ID = $SOC_ID;
        $this->USOC_ID = $USOC_ID;
    }

    public function getUSOCUserId() {
        return $this->USER_ID;
    }
    public function setUSOCUserId($value) {
        $this->USER_ID = $value;
    }

    public function getUSOCSocId() {
        return $this->SOC_ID;
    }
    public function setUSOCSocId($value) {
        $this->SOC_ID = $value;
    }

    public function getUSOCUserSocId() {
        return $this->USOC_ID;
    }
    public function setUSOCUserSocId($value) {
        $this->USOC_ID = $value;
    }
}
?>