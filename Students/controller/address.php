<?php
//updated: 2 Feb 2022
//written by: Andrew O'Brien

//Address class to represent a single entry in the
//Addresss table
class Address {
    //class properties - match the columns in the 
    //Addresss table with one exception - the DB stores
    //addressLine2No - for the contact class we want both the
    //addressLine2No and the addressLine2Name, so we'll just store 
    //a addressLine2 class object
    private $ADD_ID;
    private $ADD_STREET;
    private $ADD_STREET2;
    private $ADD_CITY;
    private $ADD_STATE;
    private $ADD_ZIP;
    private $ADD_HPHONE;
    private $ADD_BPHONE;
    private $ADD_CPHONE;
    private $ADD_WEB;
    private $ADD_EMAIL;
    
    public function __construct($ADD_STREET, $ADD_STREET2,
        $ADD_CITY, $ADD_STATE, $ADD_ZIP, $ADD_HPHONE,
        $ADD_BPHONE, $ADD_CPHONE, $ADD_WEB, $ADD_EMAIL, $ADD_ID = null)
    {
        $this->addressLine1 = $ADD_STREET;
        $this->addressLine2 = $ADD_STREET2;
        $this->city = $ADD_CITY;
        $this->state = $ADD_STATE;
        $this->zip = $ADD_ZIP;
        $this->homePhone = $ADD_HPHONE;
        $this->businessPhone = $ADD_BPHONE;
        $this->cellPhone = $ADD_CPHONE;
        $this->webAddress = $ADD_WEB;
        $this->eMail = $ADD_EMAIL;
        $this->addressID = $ADD_ID;
    }

    //get and set the contact properties
    public function getAddressId(){
        return $this->addressId;
    }
    public function setAddressId($value) {
        $this->addressId = $value;
    }

    public function getAddressLine1() {
        return $this->addressLine1;
    }
    public function setAddressLine1($value) {
        $this->addressLine1 = $value;
    }

    public function getAddressLine2() {
        return $this->addressLine2;
    }
    public function setAddressLine2($value) {
        $this->addressLine2 = $value;
    }

    public function getCity() {
        return $this->city;
    }
    public function setCity($value) {
        $this->city = $value;
    }

    public function getState() {
        return $this->state;
    }
    public function setState($value) {
        $this->state = $value;
    }

    public function getAddressZip() {
        return $this->zip;
    }
    public function setAddressZip($value) {
        $this->zip = $value;
    }

    public function getHomePhone() {
        return $this->homePhone;
    }
    public function setHomePhone($value) {
        $this->homePhone = $value;
    }

    public function getBusinessPhone() {
        return $this->businessPhone;
    }
    public function setBusinessPhone($value) {
        $this->businessPhone = $value;
    }

    public function getCellPhone() {
        return $this->cellPhone;
    }
    public function setCellPhone($value) {
        $this->cellPhone = $value;
    }

    public function getEMail() {
        return $this->eMail;
    }
    public function setEMail($value) {
        $this->eMail = $value;
    }

    public function getWebAddress() {
        return $this->webAddress;
    }
    public function setWebAddress($value) {
        $this->webAddress = $value;
    }
}
?>