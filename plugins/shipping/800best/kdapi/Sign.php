<?php

include_once 'Param.php';
class Sign
{
    public static function makeSign($param){
        		$signString = $param->getBizData() . $param->getPartnerKey();
		$sign = Sign::md5Sign($signString);

        //$sign = Sign::md5Sign($signString);
        //$sign = Sign::base64Encode($signString);
        return $sign;
    }

    public static function base64Encode($signString){
         $md5String = md5($signString,true);
         return base64_encode($md5String);
    }

    public static function md5Sign($signString){
        return md5($signString,false);
    }
}