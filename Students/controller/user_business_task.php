<?php
//updated: 2 Feb 2022
//written by: Andrew O'Brien

//User_Business_Task class to represent a single entry in the
//User_Business_Tasks table
class User_Business_Task {

    private $USER_ID;
    private $TSK_ID;
    private $BUS_ID;
    private $SKH_ID;
    private $UBT_SDATE;
    private $UBT_EDATE;
    private $UBT_TYPE;
    
    public function __construct($USER_ID, $TSK_ID, $BUS_ID,
        $SKH_ID, $UBT_SDATE, $UBT_EDATE, $UBT_TYPE)
    {
        $this->userId = $USER_ID;
        $this->taskId = $TSK_ID;
        $this->businessId = $BUS_ID;
        $this->schoolId = $SKH_ID;
        $this->startDate = $UBT_SDATE;
        $this->endDate = $UBT_EDATE;
        $this->type = $UBT_TYPE;
    }

    //get and set the contact properties
    public function getUBTUserId(){
        return $this->userId;
    }
    public function setUBTUserId($value) {
        $this->userId = $value;
    }

    public function getUBTTaskId() {
        return $this->taskId;
    }
    public function setUBTTaskId($value) {
        $this->taskId = $value;
    }

    public function getUBTBusinessId() {
        return $this->businessId;
    }
    public function setUBTBusinessId($value) {
        $this->businessId = $value;
    }

    public function getUBTSchoolId() {
        return $this->schoolId;
    }
    public function setUBTSchoolId($value) {
        $this->schoolId = $value;
    }

    public function getUBTStartDate() {
        return $this->startDate;
    }
    public function setUBTStartDate($value) {
        $this->startDate = $value;
    }

    public function getUBTEndDate() {
        return $this->endDate;
    }
    public function setUBTEndDate($value) {
        $this->endDate = $value;
    }

    public function getUBTType() {
        return $this->type;
    }
    public function setUBTType($value) {
        $this->type = $value;
    }
}
?>