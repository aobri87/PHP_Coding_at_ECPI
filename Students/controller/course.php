<?php
//updated: 7 Feb 2022
//written by: Andrew O'Brien

//Course class to represent a single entry in the
//course table
class Course {
    //class properties - match the columns in the
    //course table; control access via get/set 
    //methods and the constructor
    private $cour;
    private $courTopic;
    private $courHours;
    
    public function __construct($cour, $courTopic, $courHours) {
        $this->cour = $cour;
        $this->courTopic = $courTopic;
        $this->courHours = $courHours;
    }

    public function getCourseID() {
        return $this->cour;
    }
    public function setCourseID($value) {
        $this->cour = $value;
    }

    public function getCourseTopic() {
        return $this->courTopic;
    }
    public function setCourseTopic($value) {
        $this->courTopic = $value;
    }

    public function getCourseHours() {
        return $this->courHours;
    }
    public function setCourseHours($value) {
        $this->courHours = $value;
    }
}
?>