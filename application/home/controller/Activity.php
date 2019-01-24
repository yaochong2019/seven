<?php
namespace app\home\controller;

use app\common\logic\GoodsActivityLogic;
use app\common\logic\ActivityLogic;
use app\common\logic\MessageLogic;
use app\common\logic\GoodsLogic;
use app\common\model\FlashSale;
use app\common\model\GroupBuy;
use think\AjaxPage;
use think\Controller;
use think\Page;
use think\Db;

class Activity extends Base
{
    public $user_id = 0;
    public $user = array();

    public function _initialize() {      
        parent::_initialize();
        if(session('?user'))
        {
            $user = session('user');             
            $this->user = $user;
            $this->user_id = $user['user_id'];
            $this->assign('user',$user); //存储用户信息
            $this->assign('user_id',$this->user_id);
            //获取用户信息的数量
            $messageLogic = new MessageLogic();
            $user_message_count = $messageLogic->getUserMessageCount();
            $this->assign('user_message_count', $user_message_count);
        }else{
            header("location:".U('Home/User/login'));
            exit;
        }        
    }

    /**
     * 拼团列表
     */
    public function group_list()
    {   
        
        if(IS_POST){
            $groups = I('post.');
            $goods_id = $groups['goods_id'];
            $wheres['goods_id'] = array(array('EQ',$goods_id),'AND');
            $wheres['end_time'] = array(array('EGT',time()),'AND');
            $flash_sale = M('flash_sale')->where($wheres)->select();
            //dump($flash_sale);
            if ($flash_sale) {
                $this->ajaxReturn(['status'=>-1,'msg'=>'抢购类商品暂不参与拼团！','result'=>'']);
            }else
            //我参与的拼团
            $where =" (g.user_id = $this->user_id or user_1 = $this->user_id or user_2 = $this->user_id) and goods_id = $goods_id and end_time > ".time();
            $my_group = M('group_buy')->alias('g')->where($where)
                    ->join('__USERS__ us','us.user_id=g.head_id')->field('g.*,us.head_pic')->find();
            //我参与的拼团存在 且人数已经满足要求
            if($my_group && $my_group['is_end'] == 1){
                $this->ajaxReturn(['status'=>1,'msg'=>$my_group['id'],'result'=>'']);
            }else{
                $this->ajaxReturn(['status'=>0,'msg'=>'购买商品数量不能为0','result'=>'']);
            }
            /*
            $group = M('group_buy');
            $groups = I('post.');
            $goods_id = $groups['goods_id'];
            $group_id = $groups['group_id'];
            $user = session('user');
            $is_user = $this->user_id;
            
            $group = $group->where('goods_id','eq',$goods_id  AND 'group_id','eq',$group_id AND  'user_id','eq',$is_user)->select();//查询满足条件的
            if (!$group) {
                $group_new = null;
                $this->assign('group_new',$group_new);
            }elseif ($group && $group['is_end'] == 1) {
                $group_new = $this->$group;
               $this->assign('group_ing',$group_ing);
            }elseif ($group && $group['user_num'] == $group_id && $group['is_end'] == 1) {
                $group_ok = $this->$group;
                $this->assign('group_ok',$group_ok);
            }else{
                $this->assign('group',$group);
            }
                return $this->ajaxReturn($data);
                */
        }
        

        //拼团列表默认显示6条
        $goods_id = I('id');		$user_id = $this->user_id;        $list =     M('group_buy')->alias('g')->where(array('goods_id'=>$goods_id,
                                            'is_end'=>0,'is_pay'=>1,
                                            'end_time'=>array('gt',time()),											'g.user_id'=>array('neq',$user_id),											'user_1'=>array('neq',$user_id),											'user_2'=>array('neq',$user_id),
                                            ))
                    ->join('__USERS__ us','us.user_id=g.head_id')->field('g.*,us.head_pic')->limit(0,6)->select();		if(!empty($list)){			foreach($list as $k1=>$v1){				$map1['group_id'] = $v1['id'];				$map1['user_id'] = $user_id;				$orderInfo = M('order')->where($map1)->find();				$list[$k1]['orderInfo'] = $orderInfo;			}		}
						
      /* $where =" (g.user_id = $this->user_id or user_1 = $this->user_id or user_2 = $this->user_id) and goods_id = $goods_id and end_time > ".time();*/		$where =" (g.user_id = $user_id) and goods_id = $goods_id and end_time > ".time();		
        //我的拼团
        $my_group = M('group_buy')->alias('g')->where($where)
                    ->join('__USERS__ us','us.user_id=g.head_id')->field('g.*,us.head_pic')->select();
		if(!empty($my_group)){			foreach($my_group as $k=>$v){				$map['group_id'] = $v['id'];				$map['user_id'] = $v['user_id'];				$orderInfo = M('order')->where($map)->find();				$my_group[$k]['orderInfo'] = $orderInfo;			}		}		/*我参与*/		$where1 =" ( user_1 = $this->user_id or user_2 = $this->user_id) and goods_id = $goods_id and end_time > ".time();		$canyu_group = M('group_buy')->alias('g')->where($where1)					->join('__USERS__ us','us.user_id=g.head_id')->field('g.*,us.head_pic')->select();		if(!empty($canyu_group)){			foreach($canyu_group as $k2=>$v2){				$map2['group_id'] = $v2['id'];				$map2['user_id'] = $user_id;				$canyu_group[$k2]['orderInfo'] = M('order')->where($map2)->find();			}		}				
        $this->assign('my_group_list',$my_group);
        $this->assign('group',$list);		$this->assign('canyu_group',$canyu_group);/*dump($list);echo M('group_buy')->getlastsql();die;*/
        return $this->fetch();
    }

    //添加拼团
    public function addgroup(){
        if(IS_POST){
            $group = I('post.');
            $group_id = $group['group_id'];//拼团类型id
            $goods_id = I('post.goods_id/d',0);//商品id
            if(!$goods_id || $goods_id == '') $this->ajaxReturn(['status'=>0,'msg'=>'商品id不存在','result'=>'']);
            
            $goods_num = $group['goods_num'];//商品数量
            if(empty($group_id)){
                $this->ajaxReturn(['status'=>0,'msg'=>'请选参团类型/2人团/3人团','result'=>'']);
            }  
            if(empty($goods_id)){
                $this->ajaxReturn(['status'=>0,'msg'=>'请选择要购买的商品','result'=>'']);
            }
            // if(empty($goods_num)){
            //     $this->ajaxReturn(['status'=>0,'msg'=>'购买商品数量不能为0','result'=>'']);
            // }
            // if($goods_num > 200){
            //     $this->ajaxReturn(['status'=>0,'msg'=>'购买商品数量大于200','result'=>'']);
            // }
            
            $group['user_id'] = $this->user_id;
            $activityLogic = new ActivityLogic();

            
            // $activityLogic->setGoodsModel($goods_id);
            // if($item_id){
            //     $activityLogic->setSpecGoodsPriceModel($item_id);
            // }
            // $activityLogic->setGoodsBuyNum($goods_num);
            
            $result = $activityLogic->addGroupInfo2($group);			

            $this->ajaxReturn($result);
        }

        return $this->fetch();
    }

    /**
     * 追加已有的拼团
     * @author lukui  2018-03-28
     */
    public function add_thisgroup($id)
    {

        if(!id) $this->ajaxReturn(['status'=>0,'msg'=>'参数错误','result'=>'']);

        $group = M('group_buy')->where(array('id'=>$id))->find();
        if(!group) $this->ajaxReturn(['status'=>0,'msg'=>'拼团不存在','result'=>'']);

        if($group['head_id'] == $this->user_id || $group['user_1'] == $this->user_id || $group['user_2'] == $this->user_id) $this->ajaxReturn(['status'=>0,'msg'=>'您已参加此拼团','result'=>'']);

        if(!empty($group['user_1']) && !empty($group['user_2'])) {
            $this->ajaxReturn(['status'=>0,'msg'=>'此团已满','result'=>'']);
        }elseif(!empty($group['user_1']) && empty($group['user_2'])) {
            $data['user_2'] = $this->user_id;
        }elseif(empty($group['user_1']) ) {
            $data['user_1'] = $this->user_id;
        }

        $data['user_num'] = $group['user_num']+1;
        if($data['user_num'] >= $group['group_id']) $data['is_end'] = 1; //人数已满

        
        $ids = M('group_buy')->where(array('id'=>$id))->save($data);
        if($ids){
            $this->ajaxReturn(['status'=>1,'msg'=>'操作成功','result'=>'']);
        }else{
            $this->ajaxReturn(['status'=>0,'msg'=>'操作失败，请重试','result'=>'']);
        }

    }
    public function del_group(){
        $id = I('post.id/d');
        $user_id = $this->user_id;
        $group = M('group_buy')->where('id='.$id)->find();
        if($user_id == $group['head_id']){
            $del = M('group_buy')->where(array('id'=>$id))->delete();
            if($del){
                $this->ajaxReturn(['status'=>1,'msg'=>'取消成功！']);
            }else{
                $this->ajaxReturn(['status'=>0,'msg'=>'取消失败！']);   
            }
        }
        if($user_id == $group['user_1']){
            $del = M('group_buy')->where(array('id'=>$id))->setField('user_1',0);
            if($del){
                $this->ajaxReturn(['status'=>1,'msg'=>'取消成功！']);
            }else{
                $this->ajaxReturn(['status'=>0,'msg'=>'取消失败！']);
            }
        }
        if($user_id == $group['user_2']){
            $del = M('group_buy')->where(array('id'=>$id))->setField('user_2',0);
            if($del){
                $this->ajaxReturn(['status'=>1,'msg'=>'取消成功！']);
            }else{
                $this->ajaxReturn(['status'=>0,'msg'=>'取消失败！']);
            }
        }
    }

    // 促销活动页面
    public function promoteList()
    {
        $goods_where['p.start_time']  = array('lt',time());
        $goods_where['p.end_time']  = array('gt',time());
        $goods_where['p.is_end']  = 0;
        $goods_where['g.prom_type']  = 3;
        $goods_where['g.is_on_sale']  = 1;
        $goodsList = Db::name('goods')
            ->field('g.*,p.end_time,s.item_id')
            ->alias('g')
            ->join('__PROM_GOODS__ p', 'g.prom_id = p.id')
            ->join('__SPEC_GOODS_PRICE__ s','g.prom_id = s.prom_id AND s.goods_id = g.goods_id','LEFT')
            ->group('g.goods_id')
            ->where($goods_where)
            ->cache(true,5)
            ->select();
        $brandList = M('brand')->cache(true)->getField("id,name,logo");
        $this->assign('brandList',$brandList);
        $this->assign('goodsList',$goodsList);
        return $this->fetch();
         
    }
    /**
     * 抢购活动列表
     */
    public function flash_sale_list()
    {
        $time_space = flash_sale_time_space();
        $this->assign('time_space', $time_space);
        return $this->fetch();
    }
    /**
     * 抢购活动列表ajax
     */
    public function ajax_flash_sale()
    {
        $p = I('p',1);
        $start_time = I('start_time');
        $end_time = I('end_time');
        $where = array(
            'fl.start_time'=>array('egt',$start_time),
            'fl.end_time'=>array('elt',$end_time),
            'g.is_on_sale'=>1
        );
        $FlashSale = new FlashSale();
        $flash_sale_goods = $FlashSale->alias('fl')->join('__GOODS__ g', 'g.goods_id = fl.goods_id')->with(['specGoodsPrice','goods'])
            ->field('*,100*(FORMAT(buy_num/goods_num,2)) as percent')
            ->where($where)
            ->page($p,10)
            ->select();
        $this->assign('flash_sale_goods',$flash_sale_goods);
        $this->assign('now',time());
        return $this->fetch();
    }

    public function coupon_list()
    {
        $atype = I('atype', 1);
        $user = session('user');
        $p = I('p', '');

        $activityLogic = new ActivityLogic();
        $result = $activityLogic->getCouponList($atype, $user['user_id'], $p);
        $this->assign('coupon_list', $result);
        if (request()->isAjax()) {
            return $this->fetch('ajax_coupon_list');
        }
        return $this->fetch();
    }

    /**
     * 领券
     */
    public function get_coupon()
    {
        $id = I('coupon_id/d');
        if (empty($id)){
            $this->error('参数错误');
        }
        $user = session('user');
        if ($user) {
            $activityLogic = new ActivityLogic();
            $result = $activityLogic->get_coupon($id, $user['user_id']);
        } else {
            $this->redirect(U('User/login'));
        }
        $this->assign('res',$result);
        return $this->fetch();
    }
}