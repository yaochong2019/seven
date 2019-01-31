<?php
include_once dirname(dirname(dirname(__FILE__)) ). '/BaseRequest.php';
class SyncBillInfoNotifyReq implements BaseRequest
{
	var $OperationType;
    /**
     * @var array{SyncBillInfoNotify\request\EntityList}
     */
	var $EntityList;

    public function getOperationType()
    {
        return $this->OperationType;
    }

    public function setOperationType($value)
    {
        $this->OperationType = $value;
    }

    public function getEntityList()
    {
        return $this->EntityList;
    }

    public function setEntityList($value)
    {
        $this->EntityList = $value;
    }

    public function obtainServiceType()
    {
        return "SYNC_BILL_INFO_Notify";
    }
}