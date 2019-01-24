<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Session;
use app\common\logic\CartLogic;

class Base extends Controller {
    public $session_id;
    public $cateTrre = array();
    /*
     * 初始化操作
     */
    public function _initialize() {
        if (input("unique_id")) {           // 兼容手机app
            session_id(input("unique_id"));
            Session::start();
        }
        header("Cache-control: private");  // history.back返回后输入框值丢失问题 参考文章 http://www.jh-shop.cc/article_id_1465.html  http://blog.csdn.net/qinchaoguang123456/article/details/29852881
    	$this->session_id = session_id(); // 当前的 session_id
        define('SESSION_ID',$this->session_id); //将当前的session_id保存为常量，供其它方法调用
        
        // 判断当前用户是否手机                
        if(isMobile())
            cookie('is_mobile','1',3600); 
        else 
            cookie('is_mobile','0',3600);

        $user = session('user');
        $user = M('users')->where("user_id", $user['user_id'])->find();
        session('user',$user);  //覆盖session 中的 user
        $this->user = $user;
        $this->user_id = $user['user_id'];
        $this->assign('user',$user); //存储用户信息
        $this->assign('user_id',$this->user_id);

        $this->public_assign();
    }
    /**
     * 保存公告变量到 smarty中 比如 导航 
     */
    public function public_assign()
    {
       $tpshop_config = array();
       $tp_config = M('config')->select(); 
       $brand=M('brand')->select();      
       foreach($tp_config as $k => $v)
       {
       	  if($v['name'] == 'hot_keywords'){
       	  	 $tpshop_config['hot_keywords'] = explode('|', $v['value']);
       	  }       	  
          $tpshop_config[$v['inc_type'].'_'.$v['name']] = $v['value'];
       }                        
       $goods_category_tree = get_goods_category_tree();    
       $this->cateTrre = $goods_category_tree;
       $this->assign('goods_category_tree', $goods_category_tree);                     
       $brand_list = M('brand')->cache(true)->field('id,name,parent_cat_id,logo,is_hot')->where("parent_cat_id>0")->select();
       $this->assign('brand_list', $brand_list);
       $this->assign('tpshop_config', $tpshop_config);
        $user = session('user');
        $this->assign('username',$user['nickname']);
        $this->assign('brand',$brand);
        $_action=ACTION_NAME;
        $_controller=CONTROLLER_NAME;
        $this->assign('_action',strtolower($_action));
        $this->assign('_controller',strtolower($_controller));

        $cartLogic = new CartLogic();
        $cartLogic->setUserId($this->user_id);
        $cartList = $cartLogic->getCartList();//用户购物车
        $car_num = 0;
        foreach ($cartList as $key => $value) {
          $car_num += $value['goods_num'];
        }
        $this->assign('car_num',$car_num);
    }

    /*
     * 
     */
    public function ajaxReturn($data)
    {
        exit(json_encode($data));
    }
}