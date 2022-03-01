<?php
//updated: 2 Feb 2022
//written by: Andrew O'Brien

//Business_Task class to represent a single entry in the
//Levels table
class Business_Task {
    //class properties - match the columns in the
    //Levels table; control access via get/set 
    //methods and the constructor
    private $BUS_ID;
    private $TSK_ID;
    
    public function __construct($BUS_ID, $TSK_ID) {
        $this->BUS_ID = $BUS_ID;
        $this->TSK_ID = $TSK_ID;
    }

    public function getBTBusId() {
        return $this->BUS_ID;
    }
    public function setBTBusId($value) {
        $this->BUS_ID = $value;
    }

    public function getBTTskId() {
        return $this->TSK_ID;
    }
    public function setBTTskId($value) {
        $this->TSK_ID = $value;
    }s
}
?>