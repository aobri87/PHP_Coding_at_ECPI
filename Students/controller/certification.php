<?php
//updated: 22 Feb 2022
//written by: Andrew O'Brien

//Certification class to represent a single entry in the
//Certifications table
class Certification
{

    private $CERT_ID;
    private $CERT_NAME;
    private $CERT_ORGANIZATION;
    private $CERT_DESC;
    private $VERIFIED;

    public function __construct(
        $CERT_NAME,
        $CERT_ORGANIZATION,
        $CERT_DESC,
        $VERIFIED,
        $CERT_ID = null
    ) {
        $this->name = $CERT_NAME;
        $this->organization = $CERT_ORGANIZATION;
        $this->desc = $CERT_DESC;
        $this->verified = $VERIFIED;
        $this->certId = $CERT_ID;
    }

    //get and set the certification properties
    public function getCertId()
    {
        return $this->certId;
    }
    public function setCertId($value)
    {
        $this->certId = $value;
    }

    public function getCertName()
    {
        return $this->name;
    }
    public function setCertName($value)
    {
        $this->name = $value;
    }

    public function getCertOrg()
    {
        return $this->organization;
    }
    public function setCertOrg($value)
    {
        $this->organization = $value;
    }

    public function getCertDesc()
    {
        return $this->desc;
    }
    public function setCertDesc($value)
    {
        $this->desc = $value;
    }

    public function getCertVerified()
    {
        return $this->verified;
    }
    public function setCertVerified($value)
    {
        $this->verified = $value;
    }
}
class Certification2
{

    private $CERT_ID;
    private $CERT_NAME;
    private $CERT_ORGANIZATION;
    private $CERT_DESC;
    private $CERT_DATE;
    private $CERT_EXP_DATE;
    private $VERIFIED;

    public function __construct(
        $CERT_NAME,
        $CERT_ORGANIZATION,
        $CERT_DESC,
        $CERT_DATE,
        $CERT_EXP_DATE,
        $VERIFIED,
        $CERT_ID = null
    ) {
        $this->name = $CERT_NAME;
        $this->organization = $CERT_ORGANIZATION;
        $this->desc = $CERT_DESC;
        $this->date = $CERT_DATE;
        $this->expDate = $CERT_EXP_DATE;
        $this->verified = $VERIFIED;
        $this->certId = $CERT_ID;
    }

    //get and set the certification properties
    public function getCertId()
    {
        return $this->certId;
    }
    public function setCertId($value)
    {
        $this->certId = $value;
    }

    public function getCertName()
    {
        return $this->name;
    }
    public function setCertName($value)
    {
        $this->name = $value;
    }

    public function getCertOrg()
    {
        return $this->organization;
    }
    public function setCertOrg($value)
    {
        $this->organization = $value;
    }

    public function getCertDesc()
    {
        return $this->desc;
    }
    public function setCertDesc($value)
    {
        $this->desc = $value;
    }


    public function getCertDate()
    {
        return $this->date;
    }
    public function setCertDate($value)
    {
        $this->date = $value;
    }

    public function getCertExpDate()
    {
        return $this->expDate;
    }
    public function setCertExpDate($value)
    {
        $this->expDate = $value;
    }

    public function getCertVerified()
    {
        return $this->verified;
    }
    public function setCertVerified($value)
    {
        $this->verified = $value;
    }
}
