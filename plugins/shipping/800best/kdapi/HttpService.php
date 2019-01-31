<?php

class HttpService
{
        public static function service($paramArray, $url){
            $headers = array();
            $headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=utf-8';
            $ch = curl_init ();
            curl_setopt ( $ch, CURLOPT_URL, $url );
            curl_setopt ( $ch, CURLOPT_POST, 1 );
            curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
            curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt ( $ch, CURLOPT_POSTFIELDS, $paramArray );
            $return = curl_exec ( $ch );
            curl_close ( $ch );
            return $return;
        }
}
