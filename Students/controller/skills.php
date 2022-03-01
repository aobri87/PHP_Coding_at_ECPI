<?php
//updated: 2 Feb 2022
//written by: Andrew O'Brien

//Skills class to represent a single entry in the
//Skills table
class Skills {

    private $SKL_ID;
    private $SKL_NAME;
    private $SKL_DESC;
    private $SKL_CAT;
    private $SKL_SUB_CAT;
    private $VERIFIED;
    
    public function __construct($SKL_NAME, $SKL_DESC, 
        $SKL_CAT, $SKL_SUB_CAT, $VERIFIED, $SKL_ID = null)
    {
        $this->name = $SKL_NAME;
        $this->desc = $SKL_DESC;
        $this->cat = $SKL_CAT;
        $this->subCat = $SKL_SUB_CAT;
        $this->verified = $VERIFIED;
        $this->sklId = $SKL_ID;
    }

    //get and set the contact properties
    public function getSklId(){
        return $this->sklId;
    }
    public function setSklId($value) {
        $this->sklId = $value;
    }

    public function getSklName() {
        return $this->name;
    }
    public function setSklName($value) {
        $this->name = $value;
    }

    public function getSklDesc() {
        return $this->desc;
    }
    public function setSklDesc($value) {
        $this->desc = $value;
    }

    public function getSklCat() {
        return $this->cat;
    }
    public function setSklCat($value) {
        $this->cat = $value;
    }

    public function getSklSubCat() {
        return $this->subCat;
    }
    public function setSklSubCat($value) {
        $this->subCat = $value;
    }

    public function getSklVerified() {
        return $this->verified;
    }
    public function setSklVerified($value) {
        $this->verified = $value;
    }
}
?>