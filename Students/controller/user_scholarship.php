<?php
//updated: 24 Feb 2022
//written by: Andrew O'Brien

//User_Scholarship class to represent a single entry in the
//Levels table
class User_Scholarship
{
    //class properties - match the columns in the
    //Levels table; control access via get/set 
    //methods and the constructor
    private $USER_ID;
    private $SCH_ID;

    public function __construct($USER_ID, $SCH_ID)
    {
        $this->USER_ID = $USER_ID;
        $this->SCH_ID = $SCH_ID;
    }

    public function getUSUserId()
    {
        return $this->USER_ID;
    }
    public function setUSUserId($value)
    {
        $this->USER_ID = $value;
    }

    public function getUSScholarshipId()
    {
        return $this->SCH_ID;
    }
    public function setUSScholarshipId($value)
    {
        $this->SCH_ID = $value;
    }
}
