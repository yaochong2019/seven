<?php
namespace app\admin\logic;

use think\Model;
use think\Db;
include dirname(dirname(dirname(dirname(__FILE__)))). '\plugins\shipping\800best\kdapi\ClassLoader.php';
\ClassLoader::register();
class OrderLogic extends Model
{
    /**
     * @param array $condition  搜索条件
     * @param string $order   排序方式
     * @param int $start    limit开始行
     * @param int $page_size  获取数量
     */
    public function getOrderList($condition,$order='',$start=0,$page_size=20){
        $res = M('order')->where($condition)->limit("$start,$page_size")->order($order)->select();
        return $res;
    }

    /**
     * 获取订单商品详情
     * @param $order_id
     * @param string $is_send
     * @return mixed
     */
    public function getOrderGoods($order_id,$is_send =''){
        if($is_send){
            $where=" and o.is_send < $is_send";
        }
        $sql = "SELECT g.*,o.*,(o.goods_num * o.member_goods_price) AS goods_total FROM __PREFIX__order_goods o ".
            "LEFT JOIN __PREFIX__goods g ON o.goods_id = g.goods_id WHERE o.order_id = $order_id ".$where;
        $res = DB::query($sql);
        return $res;
    }

    /*
     * 获取订单信息
     */
    public function getOrderInfo($order_id)
    {
        //  订单总金额查询语句		
        $order = M('order')->where("order_id = $order_id")->find();
        $order['address2'] = $this->getAddressName($order['province'],$order['city'],$order['district']);
        $order['address2'] = $order['address2'].$order['address'];		
        return $order;
    }

    /*
     * 根据商品型号获取商品
     */
    public function get_spec_goods($goods_id_arr){
    	if(!is_array($goods_id_arr)) return false;
    		foreach($goods_id_arr as $key => $val)
    		{
    			$arr = array();
    			$goods = M('goods')->where("goods_id = $key")->find();
    			$arr['goods_id'] = $key; // 商品id
    			$arr['goods_name'] = $goods['goods_name'];
    			$arr['goods_sn'] = $goods['goods_sn'];
    			$arr['market_price'] = $goods['market_price'];
    			$arr['goods_price'] = $goods['shop_price'];
    			$arr['cost_price'] = $goods['cost_price'];
    			$arr['member_goods_price'] = $goods['shop_price'];
    			foreach($val as $k => $v)
    			{
    				$arr['goods_num'] = $v['goods_num']; // 购买数量
    				// 如果这商品有规格
    				if($k != 'key')
    				{
    					$arr['spec_key'] = $k;
    					$spec_goods = M('spec_goods_price')->where("goods_id = $key and `key` = '{$k}'")->find();
    					$arr['spec_key_name'] = $spec_goods['key_name'];
    					$arr['member_goods_price'] = $arr['goods_price'] = $spec_goods['price'];
    					$arr['sku'] = $spec_goods['sku']; // 参考 sku  http://www.zhihu.com/question/19841574
    				}
    				$order_goods[] = $arr;
    			}
    		}
    		return $order_goods;	
    }

    /*
     * 订单操作记录
     */
    public function orderActionLog($order_id,$action,$note=''){
      $order = M('order')->where(array('order_id'=>$order_id))->find();
      $data['order_id'] = $order_id;
      $data['action_user'] = session('admin_id');
      $data['action_note'] = $note;
      $data['order_status'] = $order['order_status'];
      $data['pay_status'] = $order['pay_status'];
      $data['shipping_status'] = $order['shipping_status'];
      $data['log_time'] = time();
      $data['status_desc'] = $action;
        return M('order_action')->add($data);//订单操作记录
    }

    /*
     * 获取订单商品总价格
     */
    public function getGoodsAmount($order_id){
        $sql = "SELECT SUM(goods_num * goods_price) AS goods_amount FROM __PREFIX__order_goods WHERE order_id = {$order_id}";
        $res = DB::query($sql);
        return $res[0]['goods_amount'];
    }

    /**
     * 得到发货单流水号
     */
    public function get_delivery_sn()
    {
//        /* 选择一个随机的方案 */send_http_status('310');
		mt_srand((double) microtime() * 1000000);
        return date('YmdHi') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
    }

    /*
     * 获取当前可操作的按钮
     */
    public function getOrderButton($order){
        /*
         *  操作按钮汇总 ：付款、设为未付款、确认、取消确认、无效、去发货、确认收货、申请退货
         * 
         */
    	$os = $order['order_status'];//订单状态
    	$ss = $order['shipping_status'];//发货状态
    	$ps = $order['pay_status'];//支付状态
        $btn = array();
        if($order['pay_code'] == 'cod') {
        	if($os == 0 && $ss == 0){
        		$btn['confirm'] = '确认';
        	}elseif($os == 1 && ($ss == 0 || $ss == 2)){
        		$btn['delivery'] = '去发货';
        		$btn['cancel'] = '取消确认';
        	}elseif($ss == 1 && $os == 1 && $ps == 0){
        		$btn['pay'] = '付款';
        	}elseif($ps == 1 && $ss == 1 && $os == 1){
        		$btn['pay_cancel'] = '设为未付款';
        	}
        }else{
        	if($ps == 0 && $os == 0 || $ps == 2){
        		$btn['pay'] = '付款';
        	}elseif($os == 0 && $ps == 1){
        		$btn['pay_cancel'] = '设为未付款';
        		$btn['confirm'] = '确认';
        	}elseif($os == 1 && $ps == 1 && ($ss == 0 || $ss == 2)){
        		$btn['cancel'] = '取消确认';
        		$btn['delivery'] = '去发货';
        	}
        } 
               
        if($ss == 1 && $os == 1 && $ps == 1){
//        	$btn['delivery_confirm'] = '确认收货';
        	$btn['refund'] = '申请退货';
        }elseif($os == 2 || $os == 4){
        	$btn['refund'] = '申请退货';
        }elseif($os == 3 || $os == 5){
        	$btn['remove'] = '移除';
        }
        if($os != 5){
        	$btn['invalid'] = '无效';
        }
        return $btn;
    }

    public function orderProcessHandle($order_id,$act,$ext=array()){
    	$updata = array();
    	switch ($act){
    		case 'pay': //付款
               	$order_sn = M('order')->where("order_id = $order_id")->getField("order_sn");
                update_pay_status($order_sn,$ext); // 调用确认收货按钮
    			return true;    			
    		case 'pay_cancel': //取消付款
    			$updata['pay_status'] = 0;
    			$this->order_pay_cancel($order_id);
    			return true;
    		case 'confirm': //确认订单
    			$updata['order_status'] = 1;
    			break;
    		case 'cancel': //取消确认
    			$updata['order_status'] = 0;
    			break;
    		case 'invalid': //作废订单
    			$updata['order_status'] = 5;
    			break;
    		case 'remove': //移除订单
    			$this->delOrder($order_id);
    			break;
    		case 'delivery_confirm'://确认收货
    			confirm_order($order_id); // 调用确认收货按钮
    			return true;
    		default:
    			return true;
    	}
    	return M('order')->where("order_id=$order_id")->save($updata);//改变订单状态
    }
    
    //管理员取消付款
    function order_pay_cancel($order_id)
    {
    	//如果这笔订单已经取消付款过了
    	$count = M('order')->where("order_id = $order_id and pay_status = 1")->count();   // 看看有没已经处理过这笔订单  支付宝返回不重复处理操作
    	if($count == 0) return false;
    	// 找出对应的订单
    	$order = M('order')->where("order_id = $order_id")->find();
    	// 增加对应商品的库存
        $orderGoodsArr = M('OrderGoods')->where("order_id = $order_id")->select();
    	foreach($orderGoodsArr as $key => $val)
    	{
    		if(!empty($val['spec_key']))// 有选择规格的商品
    		{   // 先到规格表里面增加数量 再重新刷新一个 这件商品的总数量
				$SpecGoodsPrice = new \app\common\model\SpecGoodsPrice();
				$specGoodsPrice = $SpecGoodsPrice::get(['goods_id' => $val['goods_id'], 'key' => $val['spec_key']]);
				$specGoodsPrice->where(['goods_id' => $val['goods_id'], 'key' => $val['spec_key']])->setDec('store_count', $val['goods_num']);
    			refresh_stock($val['goods_id']);
    		}else{
				$specGoodsPrice = null;
    			M('Goods')->where("goods_id = {$val['goods_id']}")->setInc('store_count',$val['goods_num']); // 增加商品总数量
    		}
    		M('Goods')->where("goods_id = {$val['goods_id']}")->setDec('sales_sum',$val['goods_num']); // 减少商品销售量
			//更新活动商品购买量
			if ($val['prom_type'] == 1 || $val['prom_type'] == 2) {
				$GoodsPromFactory = new \app\common\logic\GoodsPromFactory();
				$goodsPromLogic = $GoodsPromFactory->makeModule($val, $specGoodsPrice);
				$prom = $goodsPromLogic->getPromModel();
				if ($prom['is_end'] == 0) {
					$tb = $val['prom_type'] == 1 ? 'flash_sale' : 'group_buy';
					M($tb)->where("id", $val['prom_id'])->setInc('buy_num', $val['goods_num']);
					M($tb)->where("id", $val['prom_id'])->setInc('order_num');
				}
			}
    	}
    	// 根据order表查看消费记录 给他会员等级升级 修改他的折扣 和 总金额
    	M('order')->where("order_id=$order_id")->save(array('pay_status'=>0));
    	update_user_level($order['user_id']);
    	// 记录订单操作日志
    	logOrder($order['order_id'],'订单取消付款','付款取消',$order['user_id']);
    	//分销设置
    	M('rebate_log')->where("order_id = {$order['order_id']}")->save(array('status'=>0));
    }
    
    /**
     *	处理发货单
     * @param array $data  查询数量
     */
    public function deliveryHandle($data){
		$order = $this->getOrderInfo($data['order_id']);
		$orderGoods = $this->getOrderGoods($data['order_id']);
		$selectgoods = $data['goods'];
        if($data['shipping'] == 1){
            return $this->updateOrderShipping($data,$order);
            exit;
        }
		$data['order_sn'] = $order['order_sn'];
		$data['delivery_sn'] = $this->get_delivery_sn();
		$data['zipcode'] = $order['zipcode'];
		$data['user_id'] = $order['user_id'];
		$data['admin_id'] = session('admin_id');
		$data['consignee'] = $order['consignee'];
		$data['mobile'] = $order['mobile'];
		$data['country'] = $order['country'];
		$data['province'] = $order['province'];
		$data['city'] = $order['city'];
		$data['district'] = $order['district'];
		$data['address'] = $order['address'];
		$data['shipping_price'] = $order['shipping_price'];
		$data['create_time'] = time();

        //$url = "http://api.trainer.kjb2c.com/dsapi/dsapi.do";
        //$url = "https://api2.kjb2c.com/dsapi/dsapi.do";
        //$info['userid'] = 'jh502502';
        $info['userid'] = 'JH502502';
        //$pass = '6d9f68e8-b451-4445-9004-92e9644232f8';
        $pass = '4423b17e-cc8b-4394-b4f1-36cf1392f1f5';
        
        $info['timestamp'] = date('Y-m-d H:i:s');
        $info['sign'] = md5($info['userid'] .$pass.$info['timestamp']);

        //总重
        $all_weight = 0;
        foreach ($orderGoods as $key => $value) {
            if($value['weight']) $all_weight += $value['weight'];
        }
        if($all_weight == 0) $all_weight = 1;
        
        //消息类型
        $info['msgtype'] = 'cnec_jh_order';
        
        //关区代码
        // 北仑保税区：3105  空港保税物流中心：3115 栎社机场：3109 梅山保税区：3117 慈溪保税区：3113
        $info['customs'] = $data['customs'];
        
        $haiguan['Order']['Operation'] = 0;
        $haiguan['Order']['TybType'] = 1;
        //$haiguan['Order']['MftNo'] = ''; //申报单号，更新场合时为必填 
        //$haiguan['Order']['OrderShop'] = '1320';//店铺代码   
        //$haiguan['Order']['OTOCode'] = '';//OTO店铺代码
        $haiguan['Order']['OrderFrom'] = '1320';//购物网站代码
        //$haiguan['Order']['PackageFlag'] = 0;//是否组合装标识（0=不是  
        $haiguan['Order']['OrderNo'] = $order['order_sn']; //订单号
        $haiguan['Order']['PostFee'] = $order['shipping_price'];   //运费（无运费时请设置0）
        $haiguan['Order']['InsuranceFee'] = $data['hg']['InsuranceFee'];   //保价费（无保价费时自动设置 为0）
        $haiguan['Order']['Amount'] = $order['total_amount']-$order['shipping_price']; //买家实付金额
        $haiguan['Order']['BuyerAccount'] = $order['user_id'];   //购物网站买家账号  
        $haiguan['Order']['Phone'] = $order['mobile'];    //手机号
        $haiguan['Order']['Email'] = $order['email'];    //邮箱    
        $haiguan['Order']['TaxAmount'] = $data['hg']['TaxAmount'];  //税额    
        $haiguan['Order']['TariffAmount'] = $data['hg']['TariffAmount'];   //关税额（免税请设置0）       
        $haiguan['Order']['AddedValueTaxAmount'] = $data['hg']['AddedValueTaxAmount'];//增值税额（免税请设置0）
        $haiguan['Order']['ConsumptionDutyAmount'] = $data['hg']['ConsumptionDutyAmount'];  //消费税额（免税请设置0）
        $haiguan['Order']['GrossWeight'] = $all_weight;//毛重（千克）
        $haiguan['Order']['DisAmount'] = '0';  //优惠金额合计
        $haiguan['Order']['BuyerIdnum'] = $data['hg']['BuyerIdnum'];    //订购人身份证号码
        $haiguan['Order']['BuyerName'] = $data['hg']['BuyerName'];    //订购人姓名
        $haiguan['Order']['BuyerIsPayer'] = '1';   //订购人支付人是否一致（0=不一致，1=一致）
        $haiguan['Order']['OdRemark01'] = '';  //订单备用字段01
        $haiguan['Order']['OdRemark02'] = '';  //订单备用字段02
        $haiguan['Order']['OdRemark03'] = '';  //订单备用字段03

        //$Promotion['Promotion']['ProAmount'] = 1;
        //$Promotion['Promotion']['ProRemark'] = 'ceshi';
        //$haiguan['Order']['Promotions'] = $Promotion;
		$flag_china = 1;
        foreach ($orderGoods as $key => $value) {
			if($value['flag_china'] == 0){
    			$flag_china = 0;
                $goods[$key]['Detail']['ProductId'] = $value['goods_sn'];   //货号
                $goods[$key]['Detail']['GoodsName'] = $value['goods_name'];  //商品名称
                $goods[$key]['Detail']['Qty'] = $value['goods_num'];  //数量
                $goods[$key]['Detail']['Unit'] = $value['goods_unit']; //计量单位（需与商品备案时的单位一致）
                $goods[$key]['Detail']['Price'] = $value['goods_price'];  //商品单价
                $goods[$key]['Detail']['Amount'] = $value['goods_num']*$value['goods_price']; //商品金额
                $goods[$key]['Detail']['DtRemark01'] = '';    //订单明细备用字段01
                $goods[$key]['Detail']['DtRemark02'] = '';    //订单明细备用字段02
    			$goods[$key]['Detail']['DtRemark03'] = '';    //订单明细备用字段03
			}
        }
        //$flag_china = 0;
        $haiguan['Order']['Goods'] = $goods[0];
        $haiguan['Pay']['Paytime'] = date('Y-m-d H:i:s',$order['pay_time']);  //支付时间
        $haiguan['Pay']['PaymentNo'] = $order['transaction_id'];
        $haiguan['Pay']['OrderSeqNo'] = $order['transaction_id'];
        switch ($order['pay_code']) {
            //case 'alipay':
            //    $Source = '02';
            //    break;
            //case 'alipayMobile':
            //    $Source = '02';
            //    break;
            
            default:
                $Source = '13';
                break;
        }
        $haiguan['Pay']['Source'] = $Source;
        $haiguan['Pay']['Idnum'] = $data['hg']['BuyerIdnum'];
        $haiguan['Pay']['Name'] =  $data['hg']['BuyerName'];   
        //$haiguan['Pay']['MerId'] = $data['hg']['BuyerName'];

        $haiguan['Logistics']['LogisticsNo'] = '';
        //$haiguan['Logistics']['LogisticsName'] = $data['shipping_code'];
        $haiguan['Logistics']['LogisticsName'] = '百世物流';
        $haiguan['Logistics']['Consignee'] = $order['consignee'];
        $m_region = M('region');
        $haiguan['Logistics']['Province'] = $m_region->where(array('id'=>$order['province']))->getField('name');
        $haiguan['Logistics']['City'] = $m_region->where(array('id'=>$order['city']))->getField('name');
        $haiguan['Logistics']['District'] = $m_region->where(array('id'=>$order['district']))->getField('name');
        $haiguan['Logistics']['ConsigneeAddr'] =  $order['address'];
        $haiguan['Logistics']['ConsigneeTel'] = $order['mobile'];
        $haiguan['Logistics']['MailNo'] = '';
        $haiguan['Logistics']['GoodsName'] = '';
        $haiguan['Logistics']['Default01'] = '';
        $haiguan['Logistics']['LgRemark01'] = '';
        $haiguan['Logistics']['LgRemark02'] = '';
        $haiguan['Logistics']['LgRemark03'] = '';
        
        //var_dump($haiguan);
        $xml = data_to_xml($haiguan);
        $xmlstr =   '
                    <?xml version="1.0" encoding="UTF-8" ?>
                    <Message>
                        <Header>
                            <CustomsCode>3302462801</CustomsCode>
                            <OrgName>浙江净会电子商务有限公司</OrgName>
                            <CreateTime>'.date('Y-m-d H:i:s').'</CreateTime>
                        </Header>
                        <Body>
                        '.$xml.'
                        </Body>
                    </Message>';
        echo htmlentities($xmlstr);

        $info['xmlstr'] = $xmlstr;
        if($flag_china == 0){
                //初始化
                $curl = curl_init();
                //设置抓取的url
                curl_setopt($curl, CURLOPT_URL, $url);
                //设置头文件的信息作为数据流输出
                curl_setopt($curl, CURLOPT_HEADER, 0);
                //设置获取的信息以文件流的形式返回，而不是直接输出。
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                //设置post方式提交
                curl_setopt($curl, CURLOPT_POST, 1);
                //设置post数据
                curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
                //执行命令
                $_res = curl_exec($curl);
                //关闭URL请求
                curl_close($curl);
                //显示获得的数据
                $arr = xmltoarray($_res);
                if(!isset($arr['Header']['Result']) || $arr['Header']['Result'] !='T'){
                    return $arr;
                }
                
        }
		
        $did = M('delivery_doc')->add($data);
		$is_delivery = 0;
		foreach ($orderGoods as $k=>$v){
			if($v['is_send'] >= 1){
				$is_delivery++;
			}			
			if($v['is_send'] == 0 && in_array($v['rec_id'],$selectgoods)){
				$res['is_send'] = 1;
				$res['delivery_id'] = $did;
				$r = M('order_goods')->where("rec_id=".$v['rec_id'])->save($res);//改变订单商品发货状态
				$is_delivery++;
			}
		}
		$updata['shipping_time'] = time();
		if($is_delivery == count($orderGoods)){
			$updata['shipping_status'] = 1;
		}else{
			$updata['shipping_status'] = 2;
		}
		M('order')->where("order_id=".$data['order_id'])->save($updata);//改变订单状态
		$s = $this->orderActionLog($order['order_id'],'delivery',$data['note']);//操作日志
		
		//商家发货, 发送短信给客户
		$res = checkEnableSendSms("5");
		if($res && $res['status'] ==1){
		    $user_id = $data['user_id'];
		    $users = M('users')->where('user_id', $user_id)->getField('user_id , nickname , mobile' , true);
		    if($users){
		        $nickname = $users[$user_id]['nickname'];
		        $sender = $users[$user_id]['mobile'];
		        $params = array('user_name'=>$nickname , 'consignee'=>$data['consignee']);
		        $resp = sendSms("5", $sender, $params,'');
		    }
		}
		
		return $s && $r;
    }

    /**
     * 修改订单发货信息
     * @param array $data
     * @param array $order
     * @return bool|mixed
     */
    public function updateOrderShipping($data=[],$order=[]){
        $updata['shipping_code'] = $data['shipping_code'];
        $updata['shipping_name'] = $data['shipping_name'];
        M('order')->where(['order_id'=>$data['order_id']])->save($updata); //改变物流信息
        $updata['invoice_no'] = $data['invoice_no'];
        $delivery_res = M('delivery_doc')->where(['order_id'=>$data['order_id']])->save($updata);  //改变售后的信息
        if ($delivery_res){
            return $this->orderActionLog($order['order_id'],'订单修改发货信息',$data['note']);//操作日志
        }else{
            return false;
        }
    }

    /**
     * 获取地区名字
     * @param int $p
     * @param int $c
     * @param int $d
     * @return string
     */
    public function getAddressName($p=0,$c=0,$d=0){
        $p = M('region')->where(array('id'=>$p))->field('name')->find();
        $c = M('region')->where(array('id'=>$c))->field('name')->find();
        $d = M('region')->where(array('id'=>$d))->field('name')->find();
        return $p['name'].','.$c['name'].','.$d['name'].',';
    }

    /**
     * 删除订单
     */
    function delOrder($order_id){
        $order = M('order')->where(array('order_id'=>$order_id))->find();
        if(empty($order)){
            return ['status'=>-1,'msg'=>'订单不存在'];
        };
    	$del_order = M('order')->where(array('order_id'=>$order_id))->delete();
    	$del_order_goods = M('order_goods')->where(array('order_id'=>$order_id))->delete();
    	if(empty($del_order) && empty($del_order_goods)){
            return ['status'=>-1,'msg'=>'订单删除失败'];
        };
        return ['status'=>1,'msg'=>'删除成功'];
    }

	/**
	 * 当订单里商品都退货完成，将订单状态改成关闭
	 * @param $order_id
	 */
	function closeOrderByReturn($order_id)
	{
		$order_goods_list = Db::name('order_goods')->where(['order_id' => $order_id])->select();
		$order_goods_count = count($order_goods_list);
		$order_goods_return_count = 0;//退货个数
		for ($i = 0; $i < $order_goods_count; $i++) {
			if ($order_goods_list[$i]['is_send'] == 3) {
				$order_goods_return_count++;
			}
		}
		if ($order_goods_count == $order_goods_return_count) {
			 $res = Db::name('order')->where(['order_id' => $order_id])->update(['order_status' => 5]);
            if(!$res){
                return false;
            }
		}
        return true;
	}

    /**
     * 退货，取消订单，处理优惠券
     * @param $return_info
     */
    public function disposereRurnOrderCoupon($return_info){
        $coupon_list = M('coupon_list')->where(['uid'=>$return_info['user_id'],'order_id'=>$return_info['order_id']])->find();    //有没有关于这个商品的优惠券
        if(!empty($coupon_list)){
            $update_coupon_data = ['status'=>0,'use_time'=>0,'order_id'=>0];
            M('coupon_list')->where(['id'=>$coupon_list['id'],'status'=>1])->save($update_coupon_data);//符合条件的，优惠券就退给他
        }
        //追回赠送优惠券,一般退款才会走这里
        $coupon_info = M('coupon_list')->where(['uid'=>$return_info['user_id'],'get_order_id'=>$return_info['order_id']])->find();
        if(!empty($coupon_info)){
            if($coupon_info['status'] == 1) { //如果优惠券被使用,那么从退款里扣
                $coupon = M('coupon')->where(array('id' => $coupon_info['cid']))->find();
                if ($return_info['refund_money'] > $coupon['money']) {
                    //退款金额大于优惠券金额，先从这里扣
                    $return_info['refund_money'] = $return_info['refund_money'] - $coupon['money'];
                    M('return_goods')->where(['id' => $return_info['id']])->save(['refund_money' => $return_info['refund_money']]);
                }else{
                    $return_info['refund_deposit'] = $return_info['refund_deposit'] - $coupon['money'];
                    M('return_goods')->where(['id' => $return_info['id']])->save(['refund_deposit' => $return_info['refund_deposit']]);
                }
            }else {
                M('coupon_list')->where(array('id' => $coupon_info['id']))->delete();
                M('coupon')->where(array('id' => $coupon_info['cid']))->setDec('send_num');
            }
        }
    }
    
    public function getRefundGoodsMoney($return_goods){
    	$order_goods = M('order_goods')->where(array('rec_id'=>$return_goods['rec_id']))->find();
    	if($return_goods['is_receive'] == 1){
    		if($order_goods['give_integral']>0){
    			$user = get_user_info($return_goods['user_id']);
    			if($order_goods['give_integral']>$user['pay_points']){
    				//积分被使用则从退款金额里扣
    				$return_goods['refund_money'] = $return_goods['refund_money'] - $order_goods['give_integral']/100;
    			}
    		}
    	    $coupon_info = M('coupon_list')->where(array('uid'=>$return_goods['user_id'],'get_order_id'=>$return_goods['order_id']))->find();
    		if(!empty($coupon_info)){
    			if($coupon_info['status'] == 1) { //如果优惠券被使用,那么从退款里扣
    				$coupon = M('coupon')->where(array('id' => $coupon_info['cid']))->find();
    				if ($return_goods['refund_money'] > $coupon['money']) {
    					$return_goods['refund_money'] = $return_goods['refund_money'] - $coupon['money'];//退款金额大于优惠券金额
    				}
    			}
    		}
    	}
    	return $return_goods['refund_money'];
    }

    public function LogisticsBillPrintRequest($data){
        $order = $this->getOrderInfo($data['order_id']);
        $orderGoods = $this->getOrderGoods($data['order_id']);
        $selectgoods = $data['goods'];
        if($data['shipping'] == 1){
            return $this->updateOrderShipping($data,$order);
            exit;
        }

        $all_weight = 0;
        foreach ($orderGoods as $key => $value) {
            if($value['weight']) $all_weight += $value['weight'];
        }

        $url = "http://openapi.800best.com/api-server/kd/api/process";//对应的地址
        $parternID = "794";//根据实际parternID
        $partnerKey = "B2VH7C91";//根据实际partnerKey
        $format = "XML";//如果是JSON的数据格式，填JSON

        $client = new \Client($url, $parternID, $partnerKey, $format);

        //创建请求对象
        $billPrintRequestReq = new \KdWaybillApplyNotifyReq();
        $billPrintRequestReq->setDeliveryConfirm("false");
        $billPrintRequestReq->setMsgId($order['order_sn']);

        $ediPrintDetailList = new \kdWaybillApplyNotify\request\EDIPrintDetailList();
        $ediPrintDetailList->setSendMan("张三");
        $ediPrintDetailList->setSendManPhone("88888888");
        $ediPrintDetailList->setSendManAddress("港东大道26号");
        $ediPrintDetailList->setSendPostcode("315800");
        $ediPrintDetailList->setSendProvince("浙江省");
        $ediPrintDetailList->setSendCity("宁波市");
        $ediPrintDetailList->setSendCounty("北仑区");
        $ediPrintDetailList->setReceiveMan($order['consignee']);
        $ediPrintDetailList->setReceiveManPhone($order['mobile']);
        $ediPrintDetailList->setReceiveManAddress($order['address']);
        $ediPrintDetailList->setReceivePostcode($order['zipcode']);
        $ediPrintDetailList->setReceiveProvince($order['province']);
        $ediPrintDetailList->setReceiveCity($order['city']);
        $ediPrintDetailList->setReceiveCounty($order['district']);
        $ediPrintDetailList->setItemCount(1);
        $ediPrintDetailList->setItemName("书");
        $ediPrintDetailList->setItemWeight($all_weight);
        $ediPrintDetailList->setRemark("remark");
        $lists = Array($ediPrintDetailList);
        $billPrintRequestReq->setEDIPrintDetailList($lists);

        $auth = new \kdWaybillApplyNotify\request\Auth();
        $auth->setPass("800best");
        $auth->setUserName("DZMD");
        $billPrintRequestReq->setAuth($auth);

        //$billPrintRequestRsp即为百世的响应
        $billPrintRequestRsp = $client->executed($billPrintRequestReq);
    }

    public function LogisticsSyncBillInfoRequest($data){
        $order = $this->getOrderInfo($data['order_id']);
        $orderGoods = $this->getOrderGoods($data['order_id']);
        $selectgoods = $data['goods'];
        if($data['shipping'] == 1){
            return $this->updateOrderShipping($data,$order);
            exit;
        }

        $all_weight = 0;
        foreach ($orderGoods as $key => $value) {
            if($value['weight']) $all_weight += $value['weight'];
        }

        $url = "http://crp-rcs.800best.com/api/erp/syncBillInfoWithCustomsCode";//对应的地址
        $parternID = "24149";//根据实际parternID
        $partnerKey = "12345";//根据实际partnerKey
        $format = "XML";//如果是JSON的数据格式，填JSON

        $client = new \Client($url, $parternID, $partnerKey, $format);

        //创建请求对象
        $SyncBillInfoNotifyReq = new \SyncBillInfoNotifyReq();
        $SyncBillInfoNotifyReq->setOperationType(1);

        $EntityList = new \SyncBillInfoNotify\request\EntityList();
        $EntityList->setexpressNo("Express00001");
        $EntityList->setpostFee("0");
        $EntityList->setinsuredFee("0");
        $EntityList->setmoneyCode("142");
        $EntityList->setweight($all_weight);
        $EntityList->setnum("1");
        $EntityList->settitle("书");
        $EntityList->setreceiverName($order['consignee']);
        $EntityList->setreceiverProvince($order['province']);
        $EntityList->setreceiverCity($order['city']);
        $EntityList->setreceiverCountry($order['district']);
        $EntityList->setreceiverAddress($order['address']);
        $EntityList->setreceiverZip($order['zipcode']);
        $EntityList->setreceiverPhone($order['mobile']);
        $EntityList->settradeId($data['order_id']);
        $lists = Array($EntityList);
        $SyncBillInfoNotifyReq->setEntityList($lists);

        //$billPrintRequestRsp即为百世的响应
        $SyncBillInfoNotifyRsp = $client->executed($SyncBillInfoNotifyReq);
        return $SyncBillInfoNotifyRsp;
    }
}