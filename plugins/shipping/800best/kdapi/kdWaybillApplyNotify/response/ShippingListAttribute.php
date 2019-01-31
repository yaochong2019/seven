<?php
namespace kdWaybillApplyNotify\response;

class ShippingListAttribute
{
	var $code;
/**
     * @var array{kdWaybillApplyNotify\response\ShippingListAttributeValue}
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