<?php
//updated: 2 Feb 2022
//written by: Andrew O'Brien

//User_School class to represent a single entry in the
//User_Schools table
class User_School {

    private $USER_ID;
    private $SKH_ID;
    private $USKH_SDATE;
    private $USKH_EDATE;
    private $USKH_TYPE;
    
    public function __construct($USER_ID, $SKH_ID, 
        $USKH_SDATE, $USKH_EDATE, $USKH_TYPE)
    {
        $this->userId = $USER_ID;
        $this->schoolId = $SKH_ID;
        $this->startDate = $USKH_SDATE;
        $this->endDate = $USKH_EDATE;
        $this->type = $USKH_TYPE;
    }

    public function getUSKHUserId(){
        return $this->userId;
    }
    public function setUSKHUserId($value) {
        $this->userId = $value;
    }

    public function getUSKHSchoolId() {
        return $this->schoolId;
    }
    public function setUSKHSchoolId($value) {
        $this->schoolId = $value;
    }

    public function getUSKHStartDate() {
        return $this->startDate;
    }
    public function setUSKHStartDate($value) {
        $this->startDate = $value;
    }

    public function getUSKHEndDate() {
        return $this->endDate;
    }
    public function setUSKHEndDate($value) {
        $this->endDate = $value;
    }

    public function getUSKHType() {
        return $this->type;
    }
    public function setUSKHType($value) {
        $this->type = $value;
    }
}
?>