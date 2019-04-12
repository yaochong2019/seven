<?php
/**
 * Created by PhpStorm.
 * User: yaochong
 * Date: 2019/4/4
 * Time: 15:39
 */

namespace app\home\controller;
use app\common\outapi\Chinaport;
use think\Request;
class Chinaports
{
   public function platDataOpen(){
       $post=Request::instance()->post("openReq");//
       //var_dump($post);
       $post=json_decode($post,true);
     //  var_dump($post);
       $arr=[];
       $arr['orderNo']=$post['orderNo'];
       $arr['sessionID']=$post['sessionID'];
       $arr['serviceTime']=$post['serviceTime'];
       $chinaport=new Chinaport;
       $rs=json_encode($chinaport->platDataOpen($arr));
       //$list=json_decode($rs,true);
//       if($list['code']==10000){
//           $array=[];
//           $array['sessionID']=$post['sessionID'];
//           $array['order_sn']=$post['orderNo'];
//           $rss=$chinaport->realTimeDataUp($array);
//
//           exit;
//       }
       return $rs;
   }
    //海关查询成功，，2分钟之内返回给海关的类
    public function sendreal(){
        $order_sn=input('order_sn','','htmlspecialchars');
        $chinaport=new Chinaport;
        $rss=$chinaport->realTimeDataUp($order_sn);
        echo $rss;
    }

}