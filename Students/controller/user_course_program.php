<?php 
//updated: 7 Feb 2022
//written by: Andrew O'Brien

//Class to represent an entry in the users table
class User_Course_Program {
    //properties - match the columns in the users table
    private $uId;
    private $course; 
    private $programId;
    private $cohortId;
    private $term;
    private $schedule;
    private $grade;
    private $remarks;

    public function __construct($uId, $course, $programId, $cohortId, $term, $schedule,
        $grade, $remarks)
    {
        $this->userId = $uId;
        $this->course = $course; 
        $this->programId = $programId; 
        $this->cohortId = $cohortId;
        $this->term = $term;
        $this->schedule = $schedule;
        $this->grade = $grade;
        $this->remarks = $remarks; 
    }

    //get and set the user properties
    public function getUCPUserId() {
        return $this->userId;
    }
    public function setUCPUserId($value) {
        $this->userId = $value;
    }

    public function getUCPCourse() {
        return $this->course;
    }
    public function setUCPCourse($value) {
        $this->course = $value;
    }

    public function getUCPProgramId() {
        return $this->programId;
    }
    public function setUCPProgramId($value) {
        $this->programId = $value;
    }

    public function getUCPCohortId() {
        return $this->cohortId;
    }
    public function setUCPCohortId($value) {
        $this->cohortId = $value;
    }

    public function getUCPTerm() {
        return $this->term;
    }
    public function setUCPTerm($value) {
        $this->term = $value;
    }

    public function getUCPSchedule() {
        return $this->schedule;
    }
    public function setUCPSchedule($value) {
        $this->schedule = $value;
    }

    public function getUCPGrade() {
        return $this->grade;
    }
    public function setUCPGrade($value) {
        $this->grade = $value;
    }

    public function getUCPRemarks() {
        return $this->remarks;
    }
    public function setUCPRemarks($value) {
        $this->remarks = $value;
    }
}
?>
