<?php
//updated: 2 Feb 2022
//written by: Andrew O'Brien

//Task class to represent a single entry in the
//Tasks table
class Task {

    private $TSK_ID;
    private $TSK_NAME;
    private $TSK_DESC;
    private $TSK_CAT;
    private $TSK_SUB_CAT;
    private $VERIFIED;
    
    public function __construct($TSK_NAME, $TSK_DESC, 
        $TSK_CAT, $TSK_SUB_CAT, $VERIFIED, $TSK_ID = null)
    {
        $this->name = $TSK_NAME;
        $this->desc = $TSK_DESC;
        $this->cat = $TSK_CAT;
        $this->subCat = $TSK_SUB_CAT;
        $this->verified = $VERIFIED;
        $this->tskId = $TSK_ID;
    }

    //get and set the contact properties
    public function getTskId(){
        return $this->tskId;
    }
    public function setTskId($value) {
        $this->tskId = $value;
    }

    public function getTskName() {
        return $this->name;
    }
    public function setTskName($value) {
        $this->name = $value;
    }

    public function getTskDesc() {
        return $this->desc;
    }
    public function setTskDesc($value) {
        $this->desc = $value;
    }

    public function getTskCat() {
        return $this->cat;
    }
    public function setTskCat($value) {
        $this->cat = $value;
    }

    public function getTskSubCat() {
        return $this->subCat;
    }
    public function setTskSubCat($value) {
        $this->subCat = $value;
    }

    public function getTskVerified() {
        return $this->verified;
    }
    public function setTskVerified($value) {
        $this->verified = $value;
    }
}
?>