<?php

class Parser
{
    /**
     * 对象转xml(根节点为request)
     * @param $obj
     * @return mixed|string
     */
    public static function coverObjectToXml($obj){
        $ref = new ReflectionClass($obj);
        $className = $ref->getName();
        $xmlString = Parser::coverObject2Xml($obj);
        $xmlString = str_replace("<" . lcfirst($className) . ">", "<request>", $xmlString);
        $xmlString = str_replace("</" . lcfirst($className) . ">", "</request>", $xmlString);
        return $xmlString;
    }

    /**
     * 对象转xml(根节点为类名)
     * @param $obj
     * @return string
     */
    public static function coverObject2Xml($obj) {
        $ref = new ReflectionClass($obj);
        $className = $ref->getName();
        $value =  Parser::object2XmlConvert($obj);
        if ("Req" == substr($className, -3)) {
            return "<?xml version=\"1.0\" encoding=\"UTF-8\"?>" . "<request>" . $value . "</request>";
        } else {
            return "<?xml version=\"1.0\" encoding=\"UTF-8\"?>" . "<response>" . $value . "</response>";
        }
    }
    private static function object2XmlConvert($obj) {
        $ref = new ReflectionClass($obj);
        $props = $ref->getProperties();
        $xmlStr = "";
        foreach ($props as $prop){
            $propName = $prop->getName();
            $method = $ref->getMethod("get".$propName);
            $propValue = $method->invokeArgs($obj,array());
            if (null === $propValue){
                continue;
            } else if (is_bool($propValue)) {
                if ($propValue) {
                    $xmlStr = $xmlStr . "<" . $propName . ">" . "true" . "</" . $propName . ">";
                } else {
                    $xmlStr = $xmlStr . "<" . $propName . ">" . "false" . "</" . $propName . ">";
                }
            } else if (is_array($propValue)){
                $str = "";
                foreach ($propValue as $value){
                    if(is_object($value)){
                        $str = $str. "<" . $propName . ">"  . Parser::object2XmlConvert($value) . "</" . $propName . ">";
                    }else {
                        $str = $str. "<" . $propName . ">"  . $value . "</" . $propName . ">";
                    }
                }
                $xmlStr = $xmlStr . $str;
            } else if (is_object($propValue)){
                $xmlStr = $xmlStr . "<" . $propName . ">"  . Parser::object2XmlConvert($propValue) . "</" . $propName . ">";
            } else {
                $xmlStr = $xmlStr . "<" . $propName . ">" . Parser::handleXmlSpecialString($propValue) . "</" . $propName . ">";
            }
        }
        return $xmlStr;
    }

    /**
     * 处理特殊字符
     * @param $string
     * @return string
     */
    private static function handleXmlSpecialString ($string) {
        if (stripos($string, "<![CDATA[")) {
            return $string;
        }
        $specialString = array("<" , "<", "&", "'", "\"");
        foreach ($specialString as $str) {
            if(stripos($string, $str)){
                return "<![CDATA[" . $string . "]]>";
            }
        }
        return $string;
    }

    /**
     * xml转对象
     * @param $xmlString
     * @param $object
     * @return object
     */
    private static function coverXml2Object($xmlString, $object){
        $dom = new DOMDocument();
        $dom->loadXML($xmlString);
        return Parser::nodeList($dom->firstChild->childNodes, $object);
    }

    /**
     * xml节点转对象
     * @param DOMNodeList $nodeList
     * @param $object
     * @return null|object
     */
    private static function nodeList(DOMNodeList $nodeList, $object){
        $reflect = new ReflectionClass($object);
        $obj = $reflect->newInstance();
        if ($nodeList == null) {
            return null;
        }

        $arr = array();
        foreach ($nodeList as $node) {
            if($node->nodeName == "#text"){
                continue;
            }
            if(!$node->hasChildNodes()){
                continue;
            }
            $nodeName = $node->nodeName;
            if(!$reflect->hasProperty($nodeName)){
                continue;
            }
            $docComment = $reflect->getProperty($nodeName)->getDocComment();
            $array = array();
            if(!$docComment) {
                $array[$nodeName] = $node->nodeValue;
            } else if(Parser::isListByRef($docComment)) {
                $declaredType = Parser::getDeclaredTypeByDoc($docComment);
                if($declaredType== "String" || $declaredType == "string") {
                    array_push($arr, $node->nodeValue);
                } else {
                    array_push($arr, Parser::nodeList($node->childNodes, $declaredType));
                }
                $array[$nodeName] = $arr;
            } else {
                $array[$nodeName] = Parser::nodeList($node->childNodes, Parser::getDeclaredTypeByDoc($docComment));
            }
            $method = $reflect->getMethod("set".$nodeName);
            $method->invokeArgs($obj,$array);
        }
        return $obj;
    }

    /**
     * 根据反射获取的doc判断属性类型是否为列表类型
     * @param $docComment
     * @return bool
     */
    private static function isListByRef($docComment){
        return stripos($docComment, "array{") != false;
    }

    /**
     * 根据反射获取的doc判断属性的引用类型
     * @param $docComment
     * @return string
     */
    private static function getDeclaredTypeByDoc($docComment){
        $str = substr($docComment, strpos($docComment, "{"), strpos($docComment, "}"));
        $str = substr($str, strpos($str, "{"), strpos($str, "}"));
        $str = ltrim($str, "{");
        return $str;
    }

    /**json字符串转成指定类的对象
     * @param $jsonString
     * @param $object
     * @return null
     */
    private static function coverJson2Object($jsonString, $object) {
        if(!Parser::isValidJson($jsonString)) {
            return null;
        }
        $jsonArray = json_decode($jsonString, true);
        return Parser::coverArray2obj($jsonArray, $object);
    }

    public static function coverObject2Json ($object) {
        if (is_object($object)) {
            return json_encode($object, 512);
        }
        return null;
    }

    /** 验证json字符串是否合法
     * @param $strJson
     * @return bool
     */
    private static function isValidJson($strJson) {
        json_decode($strJson);
        return (json_last_error() === JSON_ERROR_NONE);
    }

    private static function coverArray2obj(array $arr, $object) {
        $reflect = new ReflectionClass($object);
        $obj = $reflect->newInstance();
        foreach ($arr as $key => $value) {
            if(!$reflect->hasProperty($key)){
                continue;
            }
            $docComment = $reflect->getProperty($key)->getDocComment();
            $array = array();
            if(!$docComment) {
                $array[$key] = $value;
            } else if(Parser::isListByRef($docComment)) {
                $arr = array();
                foreach ($value as $k => $v) {
                    if (is_array($v)) {
                        $arr[$k] = Parser::coverArray2obj($v, Parser::getDeclaredTypeByDoc($docComment));
                    }
                    $arr[$k] = $v;
                }
                $array[$key] = $arr;
            } else {
                $array[$key] = Parser::coverArray2obj($value, Parser::getDeclaredTypeByDoc($docComment));
            }
            $method = $reflect->getMethod("set".$key);
            $method->invokeArgs($obj,$array);
        }
        return $obj;
    }

    public static function convertData2Obj($format, $data, $object) {
        if (strcasecmp($format, "XML") == 0) {
            $obj = Parser::coverXml2Object($data, $object);
        } else {
            $obj = Parser::coverJson2Object($data, $object);
        }
        return $obj;
    }

}
