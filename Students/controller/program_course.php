<?php
//updated: 7 Feb 2022
//written by: Andrew O'Brien

//Program_Course class to represent a single entry in the
//program_course table
class Program_Course {
    //class properties - match the columns in the
    //program_course table; control access via get/set 
    //methods and the constructor
    private $course;
    private $proId;
    
    public function __construct($proId, $course) {
        $this->proId = $proId;
        $this->course = $course;
    }

    public function getPCProgramId() {
        return $this->proId;
    }
    public function setPCProgramId($value) {
        $this->proId = $value;
    }

    public function getPCCourse() {
        return $this->course;
    }
    public function setPCCourse($value) {
        $this->course = $value;
    }
}
?>