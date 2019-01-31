<?php
namespace kdWaybillApplyNotify\request;

class ShippingListAttributeValue
{
	var $name;
	var $value;

    public function getName()
    {
        return $this->name;
    }

    public function setName($value)
    {
        $this->name = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

}