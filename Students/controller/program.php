<?php
//updated: 7 Feb 2022
//written by: Andrew O'Brien

//Program class to represent a single entry in the
//Levels table
class Program {
    //class properties - match the columns in the
    //Levels table; control access via get/set 
    //methods and the constructor
    private $progId;
    private $progName;
    private $progHours;
    
    public function __construct($progName, $progHours, $progId = null) {
        $this->progName = $progName;
        $this->progHours = $progHours;
        $this->progId = $progId;
    }

    public function getProgramID() {
        return $this->progId;
    }
    public function setProgramID($value) {
        $this->progId = $value;
    }

    public function getProgramName() {
        return $this->progName;
    }
    public function setProgramName($value) {
        $this->progName = $value;
    }

    public function getProgramHours() {
        return $this->progHours;
    }
    public function setProgramHours($value) {
        $this->progHours = $value;
    }
}
?>