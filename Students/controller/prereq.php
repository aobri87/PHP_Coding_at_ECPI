<?php
//updated: 7 Feb 2022
//written by: Andrew O'Brien

//Prereq class to represent a single entry in the
//prereq table
class Prereq {
    //class properties - match the columns in the
    //prereq table; control access via get/set 
    //methods and the constructor
    private $course;
    private $prereq;
    
    public function __construct($course, $prereq) {
        $this->course = $course;
        $this->prereq = $prereq;
    }

    public function getPrereqCourse() {
        return $this->course;
    }
    public function setPrereqCourse($value) {
        $this->course = $value;
    }

    public function getPrereqPrereq() {
        return $this->prereq;
    }
    public function setPrereqPrereq($value) {
        $this->prereq = $value;
    }
}
?>