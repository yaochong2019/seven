<?php

include_once 'Param.php';
include_once 'HttpService.php';
include_once 'Sign.php';
include_once 'Parser.php';
class Client
{
    var $url;
    var $partnerID;
    var $partnerKey;
    var $format = "XML";

    function __construct($url, $partnerID, $partnerKey, $format){
        $this->url = $url;
        $this->partnerID = $partnerID;
        $this->partnerKey = $partnerKey;
        if($format){
            $this->format = $format;
        }
    }

    public function executed($request){
        $param = new Param();
        		$param->setServiceType($request->obtainServiceType());
		$param->setBizData($this->makeBizData($request));
		$param->setPartnerKey($this->partnerKey);
		$param->setPartnerID($this->partnerID);

        $data = array(
            			'serviceType'=>$param->getServiceType(),
			'bizData'=>$param->getBizData(),
			'partnerID'=>$param->getPartnerID(),
			'sign'=>Sign::makeSign($param),

            //'customsCode' => "3105",
            //'billMode' => "保税",

        );
        $paramArray = http_build_query($data);
        $response = HttpService::service($paramArray, $this->url);
        return $response;
    }

    private function makeBizData($request)
    {
        if (strcasecmp($this->format, "XML") == 0) {
            $bizData = Parser::coverObject2Xml($request);
        }else {
            $bizData = Parser::coverObject2Json($request);
        }

        return $bizData;
    }
}