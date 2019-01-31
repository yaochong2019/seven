<?php

class Param
{
	var $serviceType;
	var $bizData;
	var $partnerKey;
	var $partnerID;
	var $sign;

    //var $customsCode;
    //var $billMode;



    public function getServiceType()
    {
        return $this->serviceType;
    }

    public function setServiceType($value)
    {
        $this->serviceType = $value;
    }

    public function getBizData()
    {
        return $this->bizData;
    }

    public function setBizData($value)
    {
        $this->bizData = $value;
    }

    public function getPartnerKey()
    {
        return $this->partnerKey;
    }

    public function setPartnerKey($value)
    {
        $this->partnerKey = $value;
    }

    public function getPartnerID()
    {
        return $this->partnerID;
    }

    public function setPartnerID($value)
    {
        $this->partnerID = $value;
    }

    public function getSign()
    {
        return $this->sign;
    }

    public function setSign($value)
    {
        $this->sign = $value;
    }

    
    /* 
    public function getCustomsCode()
    {
        return $this->CustomsCode;
    }

    public function setCustomsCode($value)
    {
        $this->CustomsCode = $value;
    }

    public function getBillMode()
    {
        return $this->BillMode;
    }

    public function setBillMode($value)
    {
        $this->BillMode = $value;
    }
    */
}