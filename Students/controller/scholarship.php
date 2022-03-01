<?php
//updated: 24 Feb 2022
//written by: Andrew O'Brien

//Scholarship class to represent a single entry in the
//Scholarships table
class Scholarship {

    private $SCH_ID;
    private $SCH_NAME;
    private $SCH_AMOUNT;
    private $SCH_DESC;
    private $ADD_ID;
    private $SCH_ORG;
    private $VERIFIED;
    
    public function __construct($SCH_NAME, $SCH_AMOUNT,
        $SCH_DESC, $ADD_ID, $SCH_ORG, $VERIFIED, $SCH_ID = null)
    {
        $this->name = $SCH_NAME;
        $this->amount = $SCH_AMOUNT;
        $this->desc = $SCH_DESC;
        $this->addId = $ADD_ID;
        $this->org = $SCH_ORG;
        $this->verified = $VERIFIED;
        $this->schId = $SCH_ID;
    }

    //get and set the contact properties
    public function getSchId(){
        return $this->schId;
    }
    public function setSchId($value) {
        $this->schId = $value;
    }

    public function getSchName() {
        return $this->name;
    }
    public function setSchName($value) {
        $this->name = $value;
    }

    public function getSchAmount() {
        return $this->amount;
    }
    public function setSchAmount($value) {
        $this->amount = $value;
    }

    public function getSchDesc() {
        return $this->desc;
    }
    public function setSchDesc($value) {
        $this->desc = $value;
    }

    public function getSchAddId() {
        return $this->addId;
    }
    public function setSchAddId($value) {
        $this->addId = $value;
    }

    public function getSchOrg() {
        return $this->org;
    }
    public function setSchOrg($value) {
        $this->org = $value;
    }

    public function getSchVerified() {
        return $this->verified;
    }
    public function setSchVerified($value) {
        $this->verified = $value;
    }
}
