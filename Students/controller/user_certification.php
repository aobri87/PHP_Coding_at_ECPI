<?php
//updated: 22 Feb 2022
//written by: Andrew O'Brien

//User_Certification class to represent a single entry in the
//User_Certifications table
class User_Certification
{

    private $USER_ID;
    private $CERT_ID;
    private $CERT_DATE;
    private $CERT_EXP_DATE;

    public function __construct(
        $USER_ID,
        $CERT_ID,
        $CERT_DATE,
        $CERT_EXP_DATE
    ) {
        $this->UCUserId = $USER_ID;
        $this->UCCertId = $CERT_ID;
        $this->UCCertDate = $CERT_DATE;
        $this->UCCertExpDate = $CERT_EXP_DATE;
    }

    //get and set the contact properties
    public function getUCUserId()
    {
        return $this->UCUserId;
    }
    public function setUCUserId($value)
    {
        $this->UCUserId = $value;
    }

    public function getUCCertId()
    {
        return $this->UCCertId;
    }
    public function setUCCertId($value)
    {
        $this->UCCertId = $value;
    }

    public function getUCCertDate()
    {
        return $this->UCCertDate;
    }
    public function setUCCertDate($value)
    {
        $this->UCCertDate = $value;
    }

    public function getUCCertExpDate()
    {
        return $this->UCCertExpDate;
    }
    public function setUCCertExpDate($value)
    {
        $this->UCCertExpDate = $value;
    }
}
