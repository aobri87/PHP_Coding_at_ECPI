<?php
//updated: 16 Feb 2022
//written by: Andrew O'Brien

//Hobby class to represent a single entry in the
//hobby table
class Hobby {
    //class properties - match the columns in the
    //hobby table; control access via get/set 
    //methods and the constructor
    private $hobId;
    private $hobName;
    private $hobDesc;
    private $hobVeri;
    
    public function __construct($hobName, $hobDesc, $hobVeri, $hobId = null) {
        $this->hobName = $hobName;
        $this->hobDesc = $hobDesc;
        $this->verified = $hobVeri;
        $this->hobId = $hobId;
    }

    public function getHobbyID() {
        return $this->hobId;
    }
    public function setHobbyID($value) {
        $this->hobId = $value;
    }

    public function getHobbyName() {
        return $this->hobName;
    }
    public function setHobbyName($value) {
        $this->hobName = $value;
    }

    public function getHobbyDesc() {
        return $this->hobDesc;
    }
    public function setHobbyDesc($value) {
        $this->hobDesc = $value;
    }

    public function getHobVerified() {
        return $this->verified;
    }
    public function setHobVerified($value) {
        $this->verified = $value;
    }
}
?>