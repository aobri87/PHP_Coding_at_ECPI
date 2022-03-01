<?php
//updated: 14 Feb 2022
//written by: Andrew O'Brien

//Awards class to represent a single entry in the
//Awardss table
class Awards {

    private $AWD_ID;
    private $AWD_NAME;
    private $AWD_ORGANIZATION;
    private $AWD_DESC;
    private $VERIFIED;
    
    public function __construct($AWD_NAME, $AWD_ORGANIZATION,
        $AWD_DESC, $VERIFIED, $AWD_ID = null)
    {
        $this->name = $AWD_NAME;
        $this->organization = $AWD_ORGANIZATION;
        $this->desc = $AWD_DESC;
        $this->verified = $VERIFIED;
        $this->awardId = $AWD_ID;
    }

    //get and set the contact properties
    public function getAwdId(){
        return $this->awardId;
    }
    public function setAwdId($value) {
        $this->awardId = $value;
    }

    public function getAwdName() {
        return $this->name;
    }
    public function setAwdName($value) {
        $this->name = $value;
    }

    public function getAwdOrg() {
        return $this->organization;
    }
    public function setAwdOrg($value) {
        $this->organization = $value;
    }

    public function getAwdDesc() {
        return $this->desc;
    }
    public function setAwdDesc($value) {
        $this->desc = $value;
    }

    public function getAwdVerified() {
        return $this->verified;
    }
    public function setAwdVerified($value) {
        $this->verified = $value;
    }
}
class Award {

    private $AWD_ID;
    private $AWD_NAME;
    private $AWD_ORGANIZATION;
    private $AWD_DESC;
    private $AWD_DATE;
    private $VERIFIED;
    
    public function __construct($AWD_NAME, $AWD_ORGANIZATION,
        $AWD_DESC, $AWD_DATE, $VERIFIED, $AWD_ID = null)
    {
        $this->name = $AWD_NAME;
        $this->organization = $AWD_ORGANIZATION;
        $this->desc = $AWD_DESC;
        $this->date = $AWD_DATE;
        $this->verified = $VERIFIED;
        $this->awardId = $AWD_ID;
    }

    //get and set the contact properties
    public function getAwd2Id(){
        return $this->awardId;
    }
    public function setAwd2Id($value) {
        $this->awardId = $value;
    }

    public function getAwd2Name() {
        return $this->name;
    }
    public function setAwd2Name($value) {
        $this->name = $value;
    }

    public function getAwd2Org() {
        return $this->organization;
    }
    public function setAwd2Org($value) {
        $this->organization = $value;
    }

    public function getAwd2Desc() {
        return $this->desc;
    }
    public function setAwd2Desc($value) {
        $this->desc = $value;
    }

    public function getAwd2Verified() {
        return $this->verified;
    }
    public function setAwd2Verified($value) {
        $this->verified = $value;
    }

    public function getAwd2Date() {
        return $this->date;
    }
    public function setAwd2Date($value) {
        $this->date = $value;
    }
}
?>