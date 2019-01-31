<?php

class KdWaybillApplyNotifyRsp
{
	var $errorCode;
	var $errorDescription;
	var $result;
/**
     * @var array{kdWaybillApplyNotify\response\EDIPrintDetailList}
     */
	var $EDIPrintDetailList;

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function setErrorCode($value)
    {
        $this->errorCode = $value;
    }

    public function getErrorDescription()
    {
        return $this->errorDescription;
    }

    public function setErrorDescription($value)
    {
        $this->errorDescription = $value;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setResult($value)
    {
        $this->result = $value;
    }

    public function getEDIPrintDetailList()
    {
        return $this->EDIPrintDetailList;
    }

    public function setEDIPrintDetailList($value)
    {
        $this->EDIPrintDetailList = $value;
    }

}