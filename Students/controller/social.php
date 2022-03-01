<?php
//updated: 2 Feb 2022
//written by: Andrew O'Brien

//Social class to represent a single entry in the
//Socials table
class Social {

    private $SOC_ID;
    private $SOC_NAME;
    private $SOC_WEB;
    private $VERIFIED;
    
    public function __construct($SOC_NAME, 
        $SOC_WEB, $VERIFIED, $SOC_ID = null)
    {
        $this->name = $SOC_NAME;
        $this->webAddress = $SOC_WEB;
        $this->verified = $VERIFIED;
        $this->socialId = $SOC_ID;
    }

    //get and set the contact properties
    public function getSocId(){
        return $this->socialId;
    }
    public function setSocId($value) {
        $this->socialId = $value;
    }

    public function getSocName() {
        return $this->name;
    }
    public function setSocName($value) {
        $this->name = $value;
    }

    public function getSocWeb() {
        return $this->webAddress;
    }
    public function setSocWeb($value) {
        $this->webAddress = $value;
    }

    public function getSocVerified() {
        return $this->verified;
    }
    public function setSocVerified($value) {
        $this->verified = $value;
    }
}
?>