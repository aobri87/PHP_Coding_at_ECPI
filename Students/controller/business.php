<?php
//updated: 2 Feb 2022
//written by: Andrew O'Brien

//Business class to represent a single entry in the
//Businesss table
class Business {

    private $BUS_ID;
    private $BUS_NAME;
    private $BUS_DESC;
    private $ADD_ID;
    private $VERIFIED;
    
    public function __construct($BUS_NAME, $BUS_DESC, 
        $ADD_ID, $VERIFIED, $BUS_ID = null)
    {
        $this->name = $BUS_NAME;
        $this->desc = $BUS_DESC;
        $this->addressId = $ADD_ID;
        $this->verified = $VERIFIED;
        $this->businessId = $BUS_ID;
    }

    //get and set the contact properties
    public function getBusId(){
        return $this->businessId;
    }
    public function setBusId($value) {
        $this->businessId = $value;
    }

    public function getBusName() {
        return $this->name;
    }
    public function setBusName($value) {
        $this->name = $value;
    }

    public function getBusAddId() {
        return $this->addressId;
    }
    public function setBusAddId($value) {
        $this->addressId = $value;
    }

    public function getBusDesc() {
        return $this->desc;
    }
    public function setBusDesc($value) {
        $this->desc = $value;
    }

    public function getBusVerified() {
        return $this->verified;
    }
    public function setBusVerified($value) {
        $this->verified = $value;
    }
}
?>