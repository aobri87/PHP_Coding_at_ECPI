<?php
//updated: 2 Feb 2022
//written by: Andrew O'Brien

//School class to represent a single entry in the
//Schools table
class School {

    private $SKH_ID;
    private $SKH_NAME;
    private $ADD_ID;
    private $VERIFIED;
    
    public function __construct($SKH_NAME, $ADD_ID, $VERIFIED, $SKH_ID = null)
    {
        $this->name = $SKH_NAME;
        $this->addressId = $ADD_ID;
        $this->verified = $VERIFIED;
        $this->schoolId = $SKH_ID;
    }

    //get and set the contact properties
    public function getSkhId(){
        return $this->schoolId;
    }
    public function setSkhId($value) {
        $this->schoolId = $value;
    }

    public function getSkhName() {
        return $this->name;
    }
    public function setSkhName($value) {
        $this->name = $value;
    }

    public function getSkhAddId() {
        return $this->addressId;
    }
    public function setSkhAddId($value) {
        $this->addressId = $value;
    }

    public function getSkhVerified() {
        return $this->verified;
    }
    public function setSkhVerified($value) {
        $this->verified = $value;
    }
}
?>