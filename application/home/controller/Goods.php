<?php
namespace app\home\controller; 
use app\common\logic\GoodsPromFactory;
use app\common\logic\SearchWordLogic;
use app\common\logic\GoodsLogic;
use app\common\model\SpecGoodsPrice;
use think\AjaxPage;
use think\Page;
use think\Verify;
use think\Db;
use think\Cookie;
class Goods extends Base {
    public function index(){      
        return $this->fetch();
    }


   /**
    * 商品详情页
    */
    public function goodsInfo(){
        //C('TOKEN_ON',true);        
        $goodsLogic = new GoodsLogic();
        $goods_id = I("get.id/d");
        $Goods = new \app\common\model\Goods();
        $goods = $Goods::get($goods_id);
        if(empty($goods) || ($goods['is_on_sale'] == 0) || ($goods['is_virtual']==1 && $goods['virtual_indate'] <= time())){
        	$this->error('该商品已经下架',U('Index/index'));
        }
//        if (!empty($goods['prom_id']) && $goodsPromFactory->checkPromType($goods['prom_type'])) {
//            $goodsPromLogic = $goodsPromFactory->makeModule($goods, null);//这里会自动更新商品活动状态，所以商品需要重新查询
//            $goods = $goodsPromLogic->getGoodsInfo();//上面更新商品信息后需要查询
//        }
        if (cookie('user_id')) {
            $goodsLogic->add_visit_log(cookie('user_id'), $goods);
        }
        if($goods['brand_id']){
            $goods['brand_name'] = M('brand')->where("id",$goods['brand_id'])->getField('name');
        }

        //新加促销功能
        $star = strtotime(date('Y-m-d'));
        $end = strtotime(date('Y-m-d'))+24*60*60;
        if ($goods['cx_start_time'] >= $star && $goods['cx_end_time'] <= $end ) {
            $goods['shop_price'] = $goods['cx_price'];
            $goods['is_cuxiao'] = 1;
        }

        if(!empty($goods['price_ladder'])){
            $goodsLogic = new GoodsLogic();
            $price_ladder = unserialize($goods['price_ladder']);
            
        }

        //优惠套餐
        if ($goods['is_pack_price']==1) {
            $vo = explode('+',$goods['pack_id']);
            $where['goods_id']=array("in",$vo);
            $pack = M('Goods')->where($where)->select();
        }

        $goods_images_list = M('GoodsImages')->where("goods_id", $goods_id)->select(); // 商品 图册
        $goods_attribute = M('GoodsAttribute')->getField('attr_id,attr_name'); // 查询属性
        $goods_attr_list = M('GoodsAttr')->where("goods_id", $goods_id)->select(); // 查询商品属性表
	    $filter_spec = $goodsLogic->get_spec($goods_id);
        $goods_country = M('goods')->alias('a')->join('__GOODS_COUNTRY__ b','a.country_cat_id_2 = b.id')->where('goods_id',$goods_id)->select();//区域馆
        $brand = M('goods')->alias('a')->alias('a')->join('__BRAND__ b','a.brand_id = b.id')->where('goods_id',$goods_id)->select();
        $freight_free = tpCache('shopping.freight_free'); // 全场满多少免运费
        $spec_goods_price  = M('spec_goods_price')->where("goods_id", $goods_id)->getField("key,item_id,price,store_count"); // 规格 对应 价格 库存表
        M('Goods')->where("goods_id", $goods_id)->save(array('click_count'=>$goods['click_count']+1 )); //统计点击数
        $commentStatistics = $goodsLogic->commentStatistics($goods_id);// 获取某个商品的评论统计
        $point_rate = tpCache('shopping.point_rate');
        $region_id = Cookie::get('district_id');
        if ($region_id) {
            $dispatching = $goodsLogic->getGoodsDispatching($goods['goods_id'], $region_id);
            $this->assign('dispatching', $dispatching);
        }
		
		//echo $goods['shop_price'];echo $goods['market_price'];//($goods['shop_price']/$goods['market_price']);
        $flash_sale = M('flash_sale')->select();
        $prom_goods = M('prom_goods')->select();
        $this->assign('flash_sale',$flash_sale);
        $this->assign('prom_goods',$prom_goods);
        $this->assign('freight_free', $freight_free);// 全场满多少免运费
        $this->assign('spec_goods_price', json_encode($spec_goods_price,true)); // 规格 对应 价格 库存表
        $this->assign('navigate_goods',navigate_goods($goods_id,1));// 面包屑导航
        $this->assign('commentStatistics',$commentStatistics);//评论概览
        $this->assign('goods_attribute',$goods_attribute);//属性值     
        $this->assign('goods_attr_list',$goods_attr_list);//属性列表
        $this->assign('filter_spec',$filter_spec);//规格参数
        $this->assign('goods_images_list',$goods_images_list);//商品缩略图
        $this->assign('siblings_cate',$goodsLogic->get_siblings_cate($goods['cat_id']));//相关分类
        $this->assign('look_see',$goodsLogic->get_look_see($goods));//看了又看      
        $this->assign('goods',$goods->toArray());
        $this->assign('point_rate',$point_rate);
        $this->assign('country',$goods_country[0]);//区域馆
        $this->assign('price_ladder', $price_ladder);
        $this->assign('goods_brand',$brand);
        $this->assign('pack',$pack);
        foreach($spec_goods_price as $k => $v){
                    $spec_id = $v['item_id'];
        }
        $this->assign('item_id',$spec_id);
        return $this->fetch();
        
    }

    public function activity(){
        $goods_id = input('goods_id/d');//商品id
        $item_id = input('item_id/d');//规格id
        $goods_num = input('goods_num/d');//欲购买的商品数量
        $Goods = new \app\common\model\Goods();
        $goods = $Goods::get($goods_id);
        $goodsPromFactory = new GoodsPromFactory();
        if ($goodsPromFactory->checkPromType($goods['prom_type'])) {
            //这里会自动更新商品活动状态，所以商品需要重新查询
            if($item_id){
                $specGoodsPrice = SpecGoodsPrice::get($item_id);
                $goodsPromLogic = $goodsPromFactory->makeModule($goods,$specGoodsPrice);
            }else{
                $goodsPromLogic = $goodsPromFactory->makeModule($goods,null);
            }
            if($goodsPromLogic->checkActivityIsAble()){
                $goods = $goodsPromLogic->getActivityGoodsInfo();
                $goods['activity_is_on'] = 1;
                $this->ajaxReturn(['status'=>1,'msg'=>'该商品参与活动','result'=>['goods'=>$goods]]);
            }else{
                if(!empty($goods['price_ladder'])){
                    $goodsLogic = new GoodsLogic();
                    $price_ladder = unserialize($goods['price_ladder']);
                    $goods->shop_price = $goodsLogic->getGoodsPriceByLadder($goods_num, $goods['shop_price'], $price_ladder);
                }
                $goods['activity_is_on'] = 0;
                $this->ajaxReturn(['status'=>1,'msg'=>'该商品没有参与活动','result'=>['goods'=>$goods]]);
            }
        }
        if(!empty($goods['price_ladder'])){
            $goodsLogic = new GoodsLogic();
            $price_ladder = unserialize($goods['price_ladder']);
            $goods->shop_price = $goodsLogic->getGoodsPriceByLadder($goods_num, $goods['shop_price'], $price_ladder);
        }
        $this->ajaxReturn(['status'=>1,'msg'=>'该商品没有参与活动','result'=>['goods'=>$goods]]);
    }

    /**
     * 获取可发货地址
     */
    public function getRegion()
    {
        $goodsLogic = new GoodsLogic();
        $region_list = $goodsLogic->getRegionList();//获取配送地址列表
        $region_list['status'] = 1;
        $this->ajaxReturn($region_list);
    }
    
    /**
     * 商品列表页
     */
    public function goodsList(){ 
        
        $key = md5($_SERVER['REQUEST_URI'].I('start_price').'_'.I('end_price'));
        $html = S($key);
        if(!empty($html))
        {
            return $html;
        }
        
        $filter_param = array(); // 筛选数组                        
        $id = I('get.id/d',1); // 当前分类id
        $brand_id = I('get.brand_id',0);
        $spec = I('get.spec',0); // 规格 
        $attr = I('get.attr',''); // 属性        
        $sort = I('get.sort','goods_id'); // 排序
        $sort_asc = I('get.sort_asc','asc'); // 排序
        $price = I('get.price',''); // 价钱
        $start_price = trim(I('post.start_price','0')); // 输入框价钱
        $end_price = trim(I('post.end_price','0')); // 输入框价钱        
        if($start_price && $end_price) $price = $start_price.'-'.$end_price; // 如果输入框有价钱 则使用输入框的价钱
     
        $filter_param['id'] = $id; //加入筛选条件中                       
        $brand_id  && ($filter_param['brand_id'] = $brand_id); //加入筛选条件中

        $spec  && ($filter_param['spec'] = $spec); //加入筛选条件中
        $attr  && ($filter_param['attr'] = $attr); //加入筛选条件中
        $price  && ($filter_param['price'] = $price); //加入筛选条件中

        $goodsLogic = new GoodsLogic(); // 前台商品操作逻辑类
        
        // 分类菜单显示
        $goodsCate = M('GoodsCategory')->where("id", $id)->find();// 当前分类

        //($goodsCate['level'] == 1) && header('Location:'.U('Home/Channel/index',array('cat_id'=>$id))); //一级分类跳转至大分类馆        
        $cateArr = $goodsLogic->get_goods_cate($goodsCate);

        // 筛选 品牌 规格 属性 价格
        $cat_id_arr = getCatGrandson ($id);

        $goods_where = ['is_on_sale' => 1, 'cat_id'=>['in',$cat_id_arr]];
        $filter_goods_id = Db::name('goods')->where($goods_where)->cache(true)->getField("goods_id",true);
        // 过滤筛选的结果集里面找商品        
        if($brand_id || $price)// 品牌或者价格
        {
            $goods_id_1 = $goodsLogic->getGoodsIdByBrandPrice($brand_id,$price); // 根据 品牌 或者 价格范围 查找所有商品id

            $filter_goods_id = array_intersect($filter_goods_id,$goods_id_1); // 获取多个筛选条件的结果 的交集

        }
        if($spec)// 规格
        {
            $goods_id_2 = $goodsLogic->getGoodsIdBySpec($spec); // 根据 规格 查找当所有商品id
            $filter_goods_id = array_intersect($filter_goods_id,$goods_id_2); // 获取多个筛选条件的结果 的交集
        }
        if($attr)// 属性
        {
            $goods_id_3 = $goodsLogic->getGoodsIdByAttr($attr); // 根据 规格 查找当所有商品id
            $filter_goods_id = array_intersect($filter_goods_id,$goods_id_3); // 获取多个筛选条件的结果 的交集
        }

        $filter_menu  = $goodsLogic->get_filter_menu($filter_param,'goodsList'); // 获取显示的筛选菜单
        $filter_price = $goodsLogic->get_filter_price($filter_goods_id,$filter_param,'goodsList'); // 筛选的价格期间 
        unset($filter_param['brand_id']);   
        $filter_brand = $goodsLogic->get_filter_brand($filter_goods_id,$filter_param,'goodsList'); // 获取指定分类下的筛选品牌

        $filter_spec  = $goodsLogic->get_filter_spec($filter_goods_id,$filter_param,'goodsList',1); // 获取指定分类下的筛选规格        
        $filter_attr  = $goodsLogic->get_filter_attr($filter_goods_id,$filter_param,'goodsList',1); // 获取指定分类下的筛选属性        

        $count = count($filter_goods_id);
        $page = new Page($count,20);
        if($count > 0)
        {
            $goods_list = M('goods')->where("goods_id","in", implode(',', $filter_goods_id))->order("$sort $sort_asc")->limit($page->firstRow.','.$page->listRows)->select();
            $filter_goods_id2 = get_arr_column($goods_list, 'goods_id');
            if($filter_goods_id2)
            $goods_images = M('goods_images')->where("goods_id", "in", implode(',', $filter_goods_id2))->cache(true)->select();
        }
        // print_r($filter_menu);         
        $goods_category = M('goods_category')->where('is_show=1')->cache(true)->getField('id,name,parent_id,level'); // 键值分类数组
        
        $navigate_cat = navigate_goods($id); // 面包屑导航         
        $this->assign('goods_list',$goods_list);
        $this->assign('navigate_cat',$navigate_cat);
        $this->assign('goods_category',$goods_category);           
        $this->assign('goods_images',$goods_images);  // 相册图片
        $this->assign('filter_menu',$filter_menu);  // 筛选菜单
        $this->assign('filter_spec',$filter_spec);  // 筛选规格
        $this->assign('filter_attr',$filter_attr);  // 筛选属性
        $this->assign('filter_brand',$filter_brand);  // 列表页筛选属性 - 商品品牌
        $this->assign('filter_price',$filter_price);// 筛选的价格期间
        $this->assign('goodsCate',$goodsCate);
        $this->assign('cateArr',$cateArr);
        $this->assign('filter_param',$filter_param); // 筛选条件
        $this->assign('cat_id',$id);
        $this->assign('brand_id',$brand_id);
        $this->assign('page',$page);// 赋值分页输出
        $html = $this->fetch();
        S($key,$html);
        return $html;
    }
    //区域馆
    public function country()
    {   
        $id = I('get.id/d',1); // 当前分类id
        $sort = I('get.sort','goods_id'); // 排序
        $sort_asc = I('get.sort_asc','asc'); // 排序
        //$where = ['country_cat_id_2' => $id];
		$where = ['country_cat_id' => $id,'is_on_sale' => 1];
	
        $count = count($filter_goods_id);
        $page = new Page($count,20);
        $goodsCountry = M('GoodsCountry')->where("id", $id)->find();// 当前分类
        $filter_goods_id = Db::name('goods')->where($where)->cache(true)->getField("goods_id",true);
        $goods_list = M('goods')->where("goods_id","in", implode(',', $filter_goods_id))->order("$sort $sort_asc")->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('goods_list',$goods_list);
        $this->assign('goods_country',$goodsCountry);
        $this->assign('page',$page);// 赋值分页输出
        return $this->fetch();
    }

    /**
     * 套餐价格
     */
    public function pack()
    {
        if($this->user_id == 0){
            exit(json_encode(array('status'=>-100,'msg'=>"登录超时请重新登录!",'result'=>null))); // 返回结果状态
        }
        $goods_id = input("goods_id/d"); // 商品id
        $goods_num = input("goods_num/d");// 商品数量
        $item_id = input("item_id/d"); // 商品规格id
        $action = input("action"); // 立即购买
    }
    /**
     *  查询配送地址，并执行回调函数
     */
    public function region()
    {
        $fid = I('fid/d');
        $callback = I('callback');
        $parent_region = M('region')->field('id,name')->where(array('parent_id'=>$fid))->cache(true)->select();
        echo $callback.'('.json_encode($parent_region).')';
        exit;
    }

    /**
     * 商品物流配送和运费
     */
    public function dispatching()
    {        
        $goods_id = I('goods_id/d');//143
        $region_id = I('region_id/d');//28242
        $goods_logic = new GoodsLogic();
        $dispatching_data = $goods_logic->getGoodsDispatching($goods_id,$region_id);
        $this->ajaxReturn($dispatching_data);
    }

    /**
     * 商品搜索列表页
     */
    public function search()
    {
        //C('URL_MODEL',0);
        $filter_param = array(); // 筛选数组                        
        $id = I('get.id/d', 0); // 当前分类id
        $brand_id = I('brand_id', 0);
        $sort = I('sort', 'goods_id'); // 排序
        $sort_asc = I('sort_asc', 'asc'); // 排序
        $price = I('price', ''); // 价钱
        $start_price = trim(I('start_price', '0')); // 输入框价钱
        $end_price = trim(I('end_price', '0')); // 输入框价钱
        if ($start_price && $end_price) $price = $start_price . '-' . $end_price; // 如果输入框有价钱 则使用输入框的价钱
        $q = urldecode(trim(I('q', ''))); // 关键字搜索
        empty($q) && $this->error('请输入搜索词');
        $id && ($filter_param['id'] = $id); //加入筛选条件中                       
        $brand_id && ($filter_param['brand_id'] = $brand_id); //加入筛选条件中
        $price && ($filter_param['price'] = $price); //加入筛选条件中
        $q && ($_GET['q'] = $filter_param['q'] = $q); //加入筛选条件中
        $goodsLogic = new GoodsLogic(); // 前台商品操作逻辑类
        $SearchWordLogic = new SearchWordLogic();
        $where = $SearchWordLogic->getSearchWordWhere($q);
        $where['is_on_sale'] = 1;
        //$where['exchange_integral'] = 0;//不检索积分商品
        Db::name('search_word')->where('keywords', $q)->setInc('search_num');

        $goodsHaveSearchWord = Db::name('goods')->where($where)->count();
        if ($goodsHaveSearchWord) {
            $SearchWordIsHave = Db::name('search_word')->where('keywords',$q)->find();
            if($SearchWordIsHave){
                Db::name('search_word')->where('id',$SearchWordIsHave['id'])->update(['goods_num'=>$goodsHaveSearchWord]);
            }else{
                $SearchWordData = [
                    'keywords' => $q,
                    'pinyin_full' => $SearchWordLogic->getPinyinFull($q),
                    'pinyin_simple' => $SearchWordLogic->getPinyinSimple($q),
                    'search_num' => 1,
                    'goods_num' => $goodsHaveSearchWord
                ];
                Db::name('search_word')->insert($SearchWordData);
            }
        }

        if ($id) {
            $cat_id_arr = getCatGrandson($id);
            $where['cat_id'] = array('in', implode(',', $cat_id_arr));
        }
        $search_goods = M('goods')->where($where)->getField('goods_id,cat_id');
        $filter_goods_id = array_keys($search_goods);
        $filter_cat_id = array_unique($search_goods); // 分类需要去重
        if ($filter_cat_id) {
            $cateArr = M('goods_category')->where("id", "in", implode(',', $filter_cat_id))->select();
            $tmp = $filter_param;
            foreach ($cateArr as $k => $v) {
                $tmp['id'] = $v['id'];
                $cateArr[$k]['href'] = U("/Home/Goods/search", $tmp);
            }
        }

        // 过滤筛选的结果集里面找商品        
        if ($brand_id || $price) {
            // 品牌或者价格
            $goods_id_1 = $goodsLogic->getGoodsIdByBrandPrice($brand_id, $price); // 根据 品牌 或者 价格范围 查找所有商品id
            $filter_goods_id = array_intersect($filter_goods_id, $goods_id_1); // 获取多个筛选条件的结果 的交集
        }

        
        
        $filter_menu = $goodsLogic->get_filter_menu($filter_param, 'search'); // 获取显示的筛选菜单
        $filter_price = $goodsLogic->get_filter_price($filter_goods_id, $filter_param, 'search'); // 筛选的价格期间
        $filter_brand = $goodsLogic->get_filter_brand($filter_goods_id, $filter_param, 'search'); // 获取指定分类下的筛选品牌

        $count = count($filter_goods_id);
        $page = new Page($count, 20);
        if ($count > 0) {
            $goods_list = M('goods')->where(['is_on_sale' => 1, 'goods_id' => ['in', implode(',', $filter_goods_id)]])->order("$sort $sort_asc")->limit($page->firstRow . ',' . $page->listRows)->select();
            $filter_goods_id2 = get_arr_column($goods_list, 'goods_id');
            if ($filter_goods_id2)
                $goods_images = M('goods_images')->where("goods_id", "in", implode(',', $filter_goods_id2))->select();
        }

        $this->assign('goods_list', $goods_list);
        $this->assign('goods_images', $goods_images);  // 相册图片
        $this->assign('filter_menu', $filter_menu);  // 筛选菜单
        $this->assign('filter_brand', $filter_brand);  // 列表页筛选属性 - 商品品牌
        $this->assign('filter_price', $filter_price);// 筛选的价格期间
        $this->assign('cateArr', $cateArr);
        $this->assign('filter_param', $filter_param); // 筛选条件
        $this->assign('cat_id', $id);
        $this->assign('page', $page);// 赋值分页输出
        $this->assign('q', I('q'));
        C('TOKEN_ON', false);
        return $this->fetch();
    }
    
    /**
     * 商品咨询ajax分页
     */
    public function ajax_consult(){
        $goods_id = I("goods_id/d", '0');
        $consult_type = I('consult_type', '0'); // 0全部咨询  1 商品咨询 2 支付咨询 3 配送 4 售后
        $where = ['parent_id' => 0, 'goods_id' => $goods_id,'is_show'=>1];
        if ($consult_type > 0) {
            $where['consult_type'] = $consult_type;
        }
        $count = M('GoodsConsult')->where($where)->count();
        $page = new AjaxPage($count, 5);
        $show = $page->show();
        $consultList = M('GoodsConsult')->where($where)->order("id desc")->limit($page->firstRow . ',' . $page->listRows)->order('add_time desc')->select();
        foreach($consultList as $key =>$list){
            $consultList[$key]['replyList'] = M('GoodsConsult')->where(['parent_id' => $list['id'],'is_show'=>1])->order('add_time desc')->select();
        }
        $this->assign('consultCount', $count);// 商品咨询数量
        $this->assign('consultList', $consultList );// 商品咨询
        $this->assign('page', $show);// 赋值分页输出
        return $this->fetch();
    }
    
    /**
     * 商品评论ajax分页
     */
    public function ajaxComment(){        
        $goods_id = I("goods_id/d",'0');        
        $commentType = I('commentType','1'); // 1 全部 2好评 3 中评 4差评
        $where = ['is_show'=>1,'goods_id'=>$goods_id,'parent_id'=>0];
        if($commentType==5){
            $where['img'] = ['<>',''];
        }if ($commentType==3) {
            $where['is_add_content'] =1;
        }if ($commentType==4) {
            $where['content'] !=null;
        }
        $count = M('Comment')->where($where)->count();                
        $page = new AjaxPage($count,10);
        $show = $page->show();   
       
        $list = M('Comment')->alias('c')->join('__USERS__ u','u.user_id = c.user_id','LEFT')->where($where)->order("add_time desc")->limit($page->firstRow.','.$page->listRows)->select();
         
//        $replyList = M('Comment')->where(['is_show'=>1,'goods_id'=>$goods_id,'parent_id'=>['>',0]])->order("add_time desc")->select();
        
        foreach($list as $k => $v){
            $list[$k]['img'] = unserialize($v['img']); // 晒单图片
            $replyList[$v['comment_id']] = M('Comment')->where(['is_show'=>1,'goods_id'=>$goods_id,'parent_id'=>$v['comment_id']])->order("add_time desc")->select();
        }
        $this->assign('commentlist',$list);// 商品评论
        $this->assign('replyList',$replyList); // 管理员回复
        $this->assign('page',$show);// 赋值分页输出
        return $this->fetch();   
    }    
    
    /**
     *  商品咨询
     */
    public function goodsConsult(){
        C('TOKEN_ON', true);
        $goods_id = I("goods_id/d", '0'); // 商品id
        $store_id = I("store_id/d", '0'); // 商品id
        $consult_type = I("consult_type", '1'); // 商品咨询类型
        $username = I("username", 'JHshop用户'); // 网友咨询
        $content = I("content"); // 咨询内容
        $verify = new Verify();
        if (!$verify->check(I('post.verify_code'), 'consult')) {
            $this->error("验证码错误");
        }
        $data = array(
            'goods_id' => $goods_id,
            'consult_type' => $consult_type,
            'username' => $username,
            'content' => $content,
            'store_id' => $store_id,
            'is_show' => 1,
            'add_time' => time(),
        );
        Db::name('goodsConsult')->add($data);
        $this->success('咨询已提交!', U('/Home/Goods/goodsInfo', array('id' => $goods_id)));
    }
    
    /**
     * 用户收藏某一件商品
     * @param type $goods_id
     */
    public function collect_goods()
    {
        $goods_id = I('goods_id/d');
        $goodsLogic = new GoodsLogic();        
        $result = $goodsLogic->collect_goods(cookie('user_id'),$goods_id);
        exit(json_encode($result));
    }
    
    /**
     * 加入购物车弹出
     */
    public function open_add_cart()
    {        
         return $this->fetch();
    }

    /**
     * 积分商城
     */
    public function integralMall()
    {
        $cat_id = I('get.id/d');
        $minValue = I('get.minValue');
        $maxValue = I('get.maxValue');
        $brandType = I('get.brandType');
        $point_rate = tpCache('shopping.point_rate');
        $is_new = I('get.is_new',0);
        $exchange = I('get.exchange',0);
        $goods_where = array(
            'is_on_sale' => 1,  //是否上架
            'is_virtual' =>0,
        );
        //积分兑换筛选
        $exchange_integral_where_array = array(array('gt',0));
        // 分类id
        if (!empty($cat_id)) {
            $goods_where['cat_id'] = array('in', getCatGrandson($cat_id));
        }
        //积分截止范围
        if (!empty($maxValue)) {
            array_push($exchange_integral_where_array, array('elt', $maxValue));
        }
        //积分起始范围
        if (!empty($minValue)) {
            array_push($exchange_integral_where_array, array('egt', $minValue));
        }
        //积分+金额
        if ($brandType == 1) {
            array_push($exchange_integral_where_array, array('exp', ' < shop_price* ' . $point_rate));
        }
        //全部积分
        if ($brandType == 2) {
            array_push($exchange_integral_where_array, array('exp', ' = shop_price* ' . $point_rate));
        }
        //新品
        if($is_new == 1){
            $goods_where['is_new'] = $is_new;
        }
        //我能兑换
        $user_id = cookie('user_id');
        if ($exchange == 1 && !empty($user_id)) {
            $user_pay_points = intval(M('users')->where(array('user_id' => $user_id))->getField('pay_points'));
            if ($user_pay_points !== false) {
                array_push($exchange_integral_where_array, array('lt', $user_pay_points));
            }
        }

        $goods_where['exchange_integral'] =  $exchange_integral_where_array;
        $goods_list_count = M('goods')->where($goods_where)->count();   //总页数
        $page = new Page($goods_list_count, 15);
        $goods_list = M('goods')->where($goods_where)->limit($page->firstRow . ',' . $page->listRows)->select();
        $goods_category = M('goods_category')->where(array('level' => 1))->select();

        $this->assign('goods_list', $goods_list);
        $this->assign('page', $page->show());
        $this->assign('goods_list_count',$goods_list_count);
        $this->assign('goods_category', $goods_category);//商品1级分类
        $this->assign('point_rate', $point_rate);//兑换率
        $this->assign('nowPage',$page->nowPage);// 当前页
        $this->assign('totalPages',$page->totalPages);//总页数
        return $this->fetch();
    }

    /**
     * 全部商品分类
     * @author lxl
     * @time17-4-18
     */
    public function all_category(){
        return $this->fetch();
    }

    /**
     * 全部品牌列表
     * @author lxl
     * @time17-4-18
     */
    public function all_brand(){
        return $this->fetch();
    }


    /**
     * 限时促销
     */
    
    public function timeLimitShop()
    {   
        $time['show'] = date('Y-m-d').' 23:59:59';//倒计时24H
        $time['front'] = date('m-d',strtotime("-1 day"));//前一天
        $time['now'] = date('m-d');//当天
        $time['after'] = date('m-d',strtotime("+1 day"));//后一天

        $times = strtotime(date('Y').str_replace('-','',I('get.time')).date('H:i:s'));
        if(!$times){
            $times = time();
        }
        $where['start_time'] = array(array('ELT',$times),'AND');//小于等于
        $where['end_time'] = array(array('EGT',$times),'AND');//大于等于
        //$count = M('flash_sale')->where($where)->count();
        //$page = new Page($count,20);
        $sale = M('flash_sale')
                ->alias('a')
                ->join('__GOODS__ b','a.goods_id = b.goods_id')
                ->where($where)
                ->order("end_time desc")
                ->limit($page->firstRow.','.$page->listRows)
                ->cache(true)
                ->select();
        $this->assign('time',$time);
        $this->assign('sale',$sale);
        //$this->assign('page',$page);
        return $this->fetch();
    }

    /**
     * 商品列表页 ajax 翻页请求 搜索
     */
    public function ajaxtimeLimitShop() {
        $where =' where  cx_price <> 0 ';

        $type = I('type');
        $star = strtotime(date('Y-m-d'));
        $end = strtotime(date('Y-m-d'))+24*60*60;
        
        if($type == 0){
            $where .= ' and cx_start_time < '.$star;
        }elseif($type == 1){
            $where .= ' and cx_start_time >= '.$star.' and cx_end_time <= '.$end;
        }elseif($type == 2){
            $where .= ' and cx_end_time < '.$end;
        }
       

        $result = DB::query("select count(1) as count from __PREFIX__goods $where ");

        $count = $result[0]['count'];
        $page = new AjaxPage($count,10);

        $order = " order by goods_id desc"; // 排序
        $limit = " limit ".$page->firstRow.','.$page->listRows;
        $list = DB::query("select *  from __PREFIX__goods $where $order $limit");

        $this->assign('lists',$list);

        $html = $this->fetch('ajaxtimeLimitShop'); //return $this->fetch('ajax_goods_list');
       exit($html);
    }


    
}