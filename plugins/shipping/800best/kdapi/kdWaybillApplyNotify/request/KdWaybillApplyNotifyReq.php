<?php

include_once dirname(dirname(dirname(__FILE__)) ). '/BaseRequest.php';
class KdWaybillApplyNotifyReq implements BaseRequest
{
	var $deliveryConfirm;
/**
     * @var array{kdWaybillApplyNotify\request\EDIPrintDetailList}
     */
	var $EDIPrintDetailList;
	var $storeCode;
	var $msgId;
/**
     * @var {kdWaybillApplyNotify\request\Auth}
     */
	var $auth;

    public function getDeliveryConfirm()
    {
        return $this->deliveryConfirm;
    }

    public function setDeliveryConfirm($value)
    {
        $this->deliveryConfirm = $value;
    }

    public function getEDIPrintDetailList()
    {
        return $this->EDIPrintDetailList;
    }

    public function setEDIPrintDetailList($value)
    {
        $this->EDIPrintDetailList = $value;
    }

    public function getStoreCode()
    {
        return $this->storeCode;
    }

    public function setStoreCode($value)
    {
        $this->storeCode = $value;
    }

    public function getMsgId()
    {
        return $this->msgId;
    }

    public function setMsgId($value)
    {
        $this->msgId = $value;
    }

    public function getAuth()
    {
        return $this->auth;
    }

    public function setAuth($value)
    {
        $this->auth = $value;
    }

    public function obtainServiceType()
    {
        return "KD_WAYBILL_APPLY_NOTIFY";
    }
}