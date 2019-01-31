<?php
namespace kdWaybillApplyNotify\request;

class ShippingListAttribute
{
	var $code;
/**
     * @var array{kdWaybillApplyNotify\request\ShippingListAttributeValue}
     */
	var $shippingListAttributeValue;

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($value)
    {
        $this->code = $value;
    }

    public function getShippingListAttributeValue()
    {
        return $this->shippingListAttributeValue;
    }

    public function setShippingListAttributeValue($value)
    {
        $this->shippingListAttributeValue = $value;
    }

}