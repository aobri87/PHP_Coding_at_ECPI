<?php
//updated: 7 Feb 2022
//written by: Andrew O'Brien

//Cohort class to represent a single entry in the
//cohort table
class Cohort {
    //class properties - match the columns in the
    //cohort table; control access via get/set 
    //methods and the constructor
    private $cohId;
    private $cohName;
    private $cohDesc;
    
    public function __construct($cohName, $cohDesc, $cohId = null) {
        $this->cohName = $cohName;
        $this->cohDesc = $cohDesc;
        $this->cohId = $cohId;
    }

    public function getCohortID() {
        return $this->cohId;
    }
    public function setCohortID($value) {
        $this->cohId = $value;
    }

    public function getCohortName() {
        return $this->cohName;
    }
    public function setCohortName($value) {
        $this->cohName = $value;
    }

    public function getCohortDesc() {
        return $this->cohDesc;
    }
    public function setCohortDesc($value) {
        $this->cohDesc = $value;
    }
}
?>