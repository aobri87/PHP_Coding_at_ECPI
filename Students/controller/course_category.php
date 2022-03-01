<?php
//updated: 7 Feb 2022
//written by: Andrew O'Brien

//Course_Category class to represent a single entry in the
//course_category table
class Course_Category {
    //class properties - match the columns in the
    //course_category table; control access via get/set 
    //methods and the constructor
    private $course;
    private $cat;
    
    public function __construct($course, $cat) {
        $this->course = $course;
        $this->cat = $cat;
    }

    public function getCCCourse() {
        return $this->course;
    }
    public function setCCCourse($value) {
        $this->course = $value;
    }

    public function getCCCategory() {
        return $this->cat;
    }
    public function setCCCategory($value) {
        $this->cat = $value;
    }
}
?>