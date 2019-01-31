<?php
namespace kdWaybillApplyNotify\request;

class Auth
{
	var $username;
	var $pass;

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($value)
    {
        $this->username = $value;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function setPass($value)
    {
        $this->pass = $value;
    }

}