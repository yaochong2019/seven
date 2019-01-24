<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:43:"./template/mobile/new2/goods/goodsInfo.html";i:1539401778;s:41:"./template/mobile/new2/public/header.html";i:1527754982;s:41:"./template/mobile/new2/public/footer.html";i:1534482884;s:42:"./template/mobile/new2/public/footer2.html";i:1534727936;}*/ ?>

<!-- 顶部 -->

<!doctype html>

<html class="no-js">

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="description" content="">

  <meta name="keywords" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

  <title>净会</title>

  <meta name="renderer" content="webkit">

  <link rel="stylesheet" href="__STATIC__/amaze/css/amazeui.min.css">

  <link rel="stylesheet" href="__STATIC__/amaze/css/amazeui.swiper.min.css">

  <link rel="stylesheet" href="__STATIC__/css/style.css">

  <link rel="stylesheet" href="__STATIC__/css/css.css">

  <link rel="stylesheet" href="__STATIC__/css/location.css">

  <script src="__STATIC__/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>

  <script src="__PUBLIC__/js/mobile_common.js" type="text/javascript"></script>

  <script src="__STATIC__/js/style.js" type="text/javascript" charset="utf-8"></script>

  <script src="__PUBLIC__/js/global.js" type="text/javascript" ></script>

  <script src="__STATIC__/old/js/layer.js"  type="text/javascript" ></script>

  <script src="__STATIC__/js/swipeSlide.min.js" type="text/javascript" charset="utf-8"></script>

</head>

<body>

<!-- 顶部 -->

<style>

.des img{

    max-width: 100%;

}

</style>

<!-------------------------------- header部分 -------------------------------------->

<header id="header-simple"

        data-am-widget="header"

        class="am-header am-header-default">

    <div class="am-header-left am-header-nav">

        <a href="javascript:history.go(-1)" class="">

            <i class="am-header-icon am-icon-angle-left" style="font-size: 2.2rem;"></i>

        </a>

    </div>

    <h1 class="am-header-title">

        <?php echo $goods['goods_name']; ?>

    </h1>

    <div class="am-header-right am-header-nav" id="next"><a href="<?php echo U('share',array('id'=>$goods['goods_id'])); ?>">分享</a></div>

</header>

<div class="bottomPlaceholder"></div>

<div class="product-head">

    <a href="javascript:void(0)" class="active" data-place="1">商品</a>

    <a href="javascript:void(0)" data-place="2" >评价</a>

    <a href="javascript:void(0)" data-place="3" >套餐</a>

    <a href="javascript:void(0)" data-place="4" >详情</a>

</div>

<form name="buy_goods_form" method="post" id="buy_goods_form">

    <input type="hidden" id="goods_id" name="goods_id" value="<?php echo $goods['goods_id']; ?>"><!-- 商品id -->

    <input type="hidden" name="activity_is_on" value="<?php echo $goods['activity_is_on']; ?>"><!-- 活动是否进行中 -->

    <input type="hidden" name="goods_prom_type" value="<?php echo $goods['prom_type']; ?>"/><!-- 活动类型 -->
	<input type="hidden" class="zhuituan" name="zhuituan" value="0"/>
    <input type="hidden" name="shop_price" value="<?php echo $goods['shop_price']; ?>"/><!-- 活动价格 -->

    <input type="hidden" name="store_count" id="huokucun" value="<?php echo $goods['store_count']; ?>"/><!-- 活动库存 -->

    <input type="hidden" name="market_price" value="<?php echo $goods['market_price']; ?>"/><!-- 商品原价 -->

    <input type="hidden" name="start_time" value="<?php echo $goods['start_time']; ?>"/><!-- 活动开始时间 -->

    <input type="hidden" name="end_time" value="<?php echo $goods['end_time']; ?>"/><!-- 活动结束时间 -->

    <input type="hidden" name="activity_title" value="<?php echo $goods['activity_title']; ?>"/><!-- 活动标题 -->

    <input type="hidden" id="item_id" name="item_id" value="<?php echo \think\Request::instance()->param('item_id'); ?>"/><!-- 商品规格id -->

    <input type="hidden" name="prom_id" value="<?php echo $goods['prom_id']; ?>"/><!-- 活动ID -->

    <input type="hidden" name="exchange_integral" value="<?php echo $goods['exchange_integral']; ?>"/><!-- 积分 -->

    <input type="hidden" name="point_rate" value="<?php echo $point_rate; ?>"/><!-- 积分兑换比 -->

    <input type="hidden" name="is_virtual" value="<?php echo $goods['is_virtual']; ?>"/><!-- 是否是虚拟商品 -->
    <input type="hidden" class="groupid" name="groupid" value="0"/><!-- pintuan id -->

<div class="product" data-id="1">

    <div class="swiper-container" id="carousel">

        <div class="swiper-wrapper">

        <!-- <?php if(is_array($goods_images_list) || $goods_images_list instanceof \think\Collection || $goods_images_list instanceof \think\Paginator): if( count($goods_images_list)==0 ) : echo "" ;else: foreach($goods_images_list as $key=>$pic): ?> -->

            <div class="swiper-slide">

                <img src="<?php echo $pic[image_url]; ?>" style="max-height: 375px;">

            </div>

        <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->

            

        </div>

        <div class="swiper-pagination"></div>

    </div>



    <div class="product-des">

        <div class="product-des-item">

            <p class="price"><span class="product-price"><i>¥</i><?php echo $goods['shop_price']; ?></span> 

            <span class="discount"><?php echo round($goods['shop_price']/$goods['market_price'],2)*10; ?>折</span> 参考价：¥<?php echo $goods['market_price']; ?></p>

            <!--<?php if($goods[is_group] == 1): ?>-->

            <p class="groups"> 拼团价：2人团 | 单价<?php echo $goods['group_price2']; ?>元; 3人团 | 单价<?php echo $goods['group_price3']; ?>元 </p>

            <!--<?php endif; ?>-->

        </div>

        <div class="product-des-item">

            <h4><?php echo $goods['goods_name']; ?></h4>

            <p class="country"><img src="<?php echo $goods['brand_img']; ?>"  /> <?php echo $goods['brand_name']; ?><!--  <i class="am-icon-home"></i>什么什么旗舰店 --></p>

            <p class="des"><?php echo $goods['goods_remark']; ?></p>

        </div>

    </div>



    <ul class="product-explain">

    <!-- <?php if($price_ladder != null): ?> -->

        <li class="activity"><label>活动：</label><span class="full-cut">满减</span> 

	        <span class="activity-des">

	        <!-- <?php if(is_array($price_ladder) || $price_ladder instanceof \think\Collection || $price_ladder instanceof \think\Paginator): $i = 0; $__LIST__ = $price_ladder;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> -->

	        满<?php echo $vo['amount']; ?>减<?php echo $vo['price']; ?>

	        <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->

	        </span>

        </li>

    <!-- <?php endif; ?> -->

        <li class="taxation"><label>税费：</label><a href="javascript:;" onclick="taxation();">预估¥<?php echo $goods['tax_price']; ?>,实际税费请以提交订单为准<i class="am-icon-angle-right"></i></a></li>

        <li class="freight">

        <label>地址：</label>

        <a href="javascript:;" onclick="locationaddress(this);"><script type="text/javascript">

                function locationaddress(e){

                    $('.container').animate({width: '14.4rem', opacity: 'show'}, 'normal',function(){

                        $('.container').show();

                    });

                    if(!$('.container').is(":hidden")){

                        $('body').css('overflow','hidden')

                        cover();

                        $('.mask-filter-div').css('z-index','9999');

                    }

                }

                function closelocation(){

                    var province_div = $('.province-list');

                    var city_div = $('.city-list');

                    var area_div = $('.area-list');

                    if(area_div.is(":hidden") == false){

                        area_div.hide();

                        city_div.show();

                        province_div.hide();

                        return;

                    }

                    if(city_div.is(":hidden") == false){

                        area_div.hide();

                        city_div.hide();

                        province_div.show();

                        return;

                    }

                    if(province_div.is(":hidden") == false){

                        area_div.hide();

                        city_div.hide();

                        $('.container').animate({width: '0', opacity: 'show'}, 'normal',function(){

                            $('.container').hide();

                        });

                        undercover();

                        $('.mask-filter-div').css('z-index','inherit');

                        return;

                    }

                }</script>至<img src="__STATIC__/imgs/product/location.png"/><span id="address"></span><i class="am-icon-angle-right"></i></a></li>



        <!--配送至-s-->

        <div class="container">

            <div class="city" style="height: 441.56px; padding-bottom: 15%;">

                <div class="screen_wi_loc">

                    <div class="classreturn loginsignup">

                        <div class="content">

                            

                            <div class="ds-in-bl search center">

                                <div class="ds-in-bl return seac_retu">

                                <a href="javascript:void(0);" onclick="closelocation();"><img style="height:18px;margin-right:10px;" src="__STATIC__/imgs/return.png" alt="返回"></a><span class="sx_jsxz">配送至</span>

                            </div>

                            </div>

                            <div class="ds-in-bl suce_ok">

                                <a href="javascript:void(0);">&nbsp;</a>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="province-list"></div>

                <div class="city-list" style="display:none"></div>

                <div class="area-list" style="display:none"></div>

            </div>

        </div>

        <!--配送至-e-->



        <li class="des">

            <a class="remain" href="javascript:void(0);"><label>运费：</label><span id="shipping_freight"></span><i class="am-icon-angle-right"></i></a>

        </li>



        <li id="balance" class="chidno"></li>



        <li class="des choise_num">

            <a href="javascript:void(0);">

            <label>已选：</label><span class="sel">1件</span><i class="am-icon-angle-right"></i></a>

        </li>

        <div class="choose_shop_aready" style="padding: 5px 30px;">

            <!--商品信息-s-->

        <div class="shop-top-under">

            <div class="maleri30" style="height: 30px;">

                <div class="shopprice">

                    <div class="price_or fr">

                        <i class="xxgro"></i>

                    </div>

                </div>

            </div>

        </div>

        <!--商品信息-e-->

        <div class="shop-top-under">

            <div class="maleri30">

                <div class="shulges">

                    <p style="font-size: 16px;">数量</p>

                    <!--选择数量-->

                    <div class="plus" style="float:left;border-left: 1px solid #ddd;">

                        <span class="mp_minous" onclick="altergoodsnum(-1);initGoodsPrice();">-</span>

                                <span class="mp_mp">

                        <input type="tel" class="num buyNum" id="number" residuenum="<?php echo $goods['store_count']; ?>" id="kucun" name="goods_num" value="1" min="1" max="<?php echo $goods['store_count']; ?>" onblur="altergoodsnum(0)">

                                </span>

                        <span class="mp_plus" onclick="altergoodsnum(1);initGoodsPrice();">+</span>

                    </div>

                    <div class="dqkc_or" style="float:left;margin-left:10px;height:40px;line-height:40px;"><span>剩余库存：</span><span id="spec_store_count"><?php echo $goods['store_count']; ?></span></div>

                </div>

                <?php if($filter_spec != ''): if(is_array($filter_spec) || $filter_spec instanceof \think\Collection || $filter_spec instanceof \think\Paginator): if( count($filter_spec)==0 ) : echo "" ;else: foreach($filter_spec as $key=>$spec): ?>

                        <div class="shulges p choicsel" >

                            <p style="font-size: 25px;"><?php echo $key; ?></p>

                            <!-------商品属性值-s------->

                            <?php if(is_array($spec) || $spec instanceof \think\Collection || $spec instanceof \think\Paginator): if( count($spec)==0 ) : echo "" ;else: foreach($spec as $k2=>$v2): ?>

                                <div class="plus choic-sel">

                                    <a id="goods_spec_a_<?php echo $v2[item_id]; ?>" title="<?php echo $v2[item]; ?>"

                                       onclick="switch_spec(this); <?php if(!empty($v2['src'])): ?>$('#zoomimg').attr('src','<?php echo $v2[src]; ?>');<?php endif; ?>">

                <input id="goods_spec_<?php echo $v2[item_id]; ?>" type="radio" style="display:none;" name="goods_spec[<?php echo $key; ?>]" value="<?php echo $v2[item_id]; ?>"/><?php echo $v2[item]; ?></a>

            </div>

            <?php endforeach; endif; else: echo "" ;endif; ?>

            <!-------商品属性值-e-------->

        </div>

        <?php endforeach; endif; else: echo "" ;endif; endif; ?>

    </div>

    </div>

    </div>

        <li class="des"><label>说明：</label><span><?php echo $goods['declare']; ?></span></li>

    </ul>

    

    <div class="product-evaluate" data-id="2">

        <div class="head" data="<?php echo $commentStatistics['c0']; ?>">

            用户评论 <?php echo $commentStatistics['c0']; ?>人<span class="head-small">评价</span> 

            <span class="comment-stars"> 

            	

				<!-- <?php if(!empty($commentStatistics['c1']) and !empty($commentStatistics['c0'])): ?> -->

				<i class="am-icon-star"></i> 

            	<i class="am-icon-star"></i> 

            	<i class="am-icon-star-half"></i> 

            	<i class="am-icon-star-o"></i> 

            	<i class="am-icon-star-o"></i> 

                    <?php echo round($commentStatistics['c1']/$commentStatistics['c0'],2)*100; ?>%

                <!-- <?php else: ?> -->

                <i class="am-icon-star-o"></i><i class="am-icon-star-o"></i><i class="am-icon-star-o"></i><i class="am-icon-star-o"></i><i class="am-icon-star-o"></i>

                	0%

                <!-- <?php endif; ?> -->

            	<i class="am-icon-angle-down"></i></span>

        </div>

        <div class="evaluate-main " >

            <div class="choose-type">

                <span class="active" data-t="1">全部</span>

                <span data-t="5"> 晒图</span>

                <span data-t="3"> 追加评论</span>

            </div>

            <div class="choose-content">

                

            </div>

        </div>

    </div>

        <!--<?php if($goods[is_pack_price] == 1): ?>-->

    <div class="product-package" data-id="3">

        <h5>优惠套餐</h5>

        <div class="swiper-container " id="productSwiper" >

            <div class="swiper-wrapper">

            <!--<?php if(is_array($pack) || $pack instanceof \think\Collection || $pack instanceof \think\Paginator): $i = 0; $__LIST__ = $pack;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->

                <div class="swiper-slide">

                    <img src="<?php echo goods_thum_images($vo[goods_id],200,200); ?>" width="80px" />

                </div>

            <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->

            </div>

        </div>

        <ul>

            <!--<?php if(is_array($pack) || $pack instanceof \think\Collection || $pack instanceof \think\Paginator): $i = 0; $__LIST__ = $pack;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->

            <li>

                <p><span class="checkbox-square" pgoods_id="<?php echo $vo['goods_id']; ?>"></span><?php echo $vo[goods_name]; ?></p>

                <input type="checkbox" name="pack[<?php echo $vo['goods_id']; ?>]" style="display:none" class="checkCart pgoods_id_<?php echo $vo['goods_id']; ?>" value="<?php echo $vo['goods_id']; ?>" pgoods_id="<?php echo $vo['goods_id']; ?>"/>

                <p>¥<?php echo $vo[pack_price]; ?></p>

            </li>

            <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->

        </ul>

        <div class="operate">

            <a href="javascript:taocan_buy_now();" type="button" class="am-btn am-btn-default buyNow">立即购买</a>

            <!-- <a href="javascript:AjaxAddCart('<?php echo $goods['goods_id']; ?>',1);" type="button" class="am-btn am-btn-default addShop">加入购物车</a> -->

        </div>

    </div>

    <!--<?php endif; ?>-->

    <div class="product-detail" data-id="4">

        <h5>商品详情</h5>

        <div class="des">

            <?php echo htmlspecialchars_decode($goods['goods_content']); ?>

        </div>

    </div>

</div>

<div class="shop">
    <a href="/mobile/cart/index.html">
        <i id="tp_cart_info"></i>
    </a>
</div>

<!-- 底部 -->

<!-------------------------------- footer -------------------------------------->

 <footer id="footer" data-am-widget="footer" class="am-footer am-footer-default" >

     <div class="am-footer-switch">

         <a href="<?php echo U('/mobile/article/detail/article_id/28'); ?>">关于我们</a>

         <a href="<?php echo U('/mobile/article/detail/article_id/29'); ?>">版权说明</a>

         <a href="<?php echo U('/mobile/article/detail/article_id/30'); ?>">免责说明</a>

         <a href="<?php echo U('/mobile/article/detail/article_id/31'); ?>">隐私声明</a>

         <a href="<?php echo U('/mobile/article/detail/article_id/32'); ?>">帮助中心</a>

         <a href="<?php echo U('/mobile/article/detail/article_id/33'); ?>">汇款方式</a>

     </div>

     <div class="am-footer-miscs " style="text-align: center">

         <p>服务热线：0576-88259190   E-mail：contact@pure-seven.com  </p>
         <p>Copyright © 2018  浙江净会电子商务有限公司 浙ICP备18017318号-1</p>

     </div>

     <!--<div class="friend-links">

         <a href=""><img src="__STATIC__/imgs/friendlink/1.png"></a>

         <a href=""><img src="__STATIC__/imgs/friendlink/2.png"></a>

         <a href=""><img src="__STATIC__/imgs/friendlink/3.png"></a>

         <a href=""><img src="__STATIC__/imgs/friendlink/4.png"></a>

         <a href=""><img src="__STATIC__/imgs/friendlink/5.png"></a>

     </div>-->

 </footer>



 <!-- <div class="bottomPlaceholder"></div> -->


<div data-am-widget="gotop" class="am-gotop am-gotop-default" >
    <a href="#top" title="回到顶部">
        <i></i>
        <!-- <img src="__STATIC__/imgs/gotop.png"> -->
    </a>
</div>


<!-- 底部 -->


<!-------------------------------- 底部菜单 -------------------------------------->
<div class="bottomPlaceholder"></div>
<div id="bottom-menu">
    <div class="item">
        <a href="<?php echo U('Index/index'); ?>">
            <span></span>
            <p>首页</p>
        </a>
    </div>
    <div class="item">
        <a href="<?php echo U('Goods/timeLimitShop'); ?>">
            <span></span>
            <p>限时购</p>
        </a>
    </div>
    <div class="item">
        <a href="mqqwpa://im/chat?chat_type=wpa&uin=993973664&version=1&src_type=web&web_src=oicqzone.com" target="_blank">
            <span></span>
            <p>客服</p>
        </a>
    </div>
    <div class="item">
        <a href="<?php echo U('User/index'); ?>">
            <span></span>
            <p>我的</p>
        </a>
    </div>
</div>

<script src="__STATIC__/js/jquery.min.js"></script>
<script src="__STATIC__/amaze/js/amazeui.min.js"></script>
<script src="__STATIC__/amaze/js/amazeui.swiper.min.js"></script>
<script src="__STATIC__/js/index.js"></script>
<script src="__STATIC__/layer_mobile/layer.js"></script>
<script>

    // $('#qr-modal').modal() 控制二维码弹出
</script>

</body>
</html>

<!-- 底部 -->





<!-- 底部 -->

<!-- <div class="bottomPlaceholder"></div> -->

<div class="product-bottom-menu podee">

<!-- <?php if($collect == null): ?> -->

    <a href="javascript:void(0)" class="collect">

        <span class="icon am-icon-heart-o"></span>

        <span class="text">收藏</span>

    </a>

<!-- <?php else: ?> -->

    <a href="javascript:void(0)" class="collect">

        <span class="icon am-icon-heart"></span>

        <span class="text">取消</span>

    </a>

<!-- <?php endif; ?> -->



    <a href="javascript:;" class="item groupBuyBtn">

        我要拼团

    </a>



    <a href="javascript:AjaxAddCart('<?php echo $goods['goods_id']; ?>',1);"  class=" item add_shop">

        加入购物车

    </a>

    <a href="javascript:;" onclick="buy_now();" class=" item buy_now">

        单独购买

    </a>

</div>

</from>

<div class="mask-filter-div" style="display: none;"></div>

<script type="text/javascript" src="__STATIC__/js/mobile-location.js"></script>

<script src="__PUBLIC__/js/mobile_common.js" type="text/javascript" charset="utf-8"></script>
<script src="__STATIC__/vendor/layer/layer.js"></script>
<script>

var spec_goods_price = <?php echo (isset($spec_goods_price) && ($spec_goods_price !== '')?$spec_goods_price:'null'); ?>;//规格库存价格

var goods_id = "<?php echo $goods['goods_id']; ?>";

var comment  = "<?php echo $commentStatistics['c0']; ?>";

var user_id = "<?php echo $user_id; ?>";
$(document).ready(function () {
initBuy();
ajax_header_cart();
});
    /**

     * 购买初始化

     */
     
    function initBuy(){

        var is_virtual = $("input[name='is_virtual']").val();

        var buy_url;

        if(is_virtual == 1){

            buy_url = "<?php echo U('mobile/Virtual/buy_virtual'); ?>";

        }else{

            buy_url = "<?php echo U('mobile/Cart/cart2',['action'=>'buy_now']); ?>";

        }



        $('#buy_goods_form').attr('action',buy_url);



    }

    /****************************评论start********************************/

    $('.product-evaluate .head .am-icon-angle-down').on('click',function(){

        if($('.product-evaluate').hasClass('open')){

            $('.product-evaluate').removeClass('open');

        }else{

            $('.product-evaluate').addClass('open');

        }

    });



    ajaxComment(1,1);

    $('.product-evaluate .evaluate-main .choose-type span').on('click',function(){

        if(!$(this).hasClass('active')){

            $('.product-evaluate .evaluate-main .choose-type span').removeClass('active');

            $(this).addClass('active');

        }

        commentType = $(this).data('t');// 评价类型

        ajaxComment(commentType,1);

    });



    if (comment == 0) {

        $('.product-evaluate .evaluate-main .choose-content').html('<p style="width:150px;margin:20px auto;">此商品暂无评论！</p>');

    }

    

    /**

     * 立即购买

     */
var groupid = 0;
    function buy_now(){

        if(user_id == ''){

            layer.open({content:"您还未登录！",time:2});

            location.href="<?php echo U('User/login',array('foid'=>$foid)); ?>";

            return;

        }

        var store_count = $("input[name='store_count']").attr('value');// 商品原始库存

        var buyNum = parseInt($("input[name='goods_num']").val());

        var goods_id = parseInt($("input[name='goods_id']").val());

        var item_id = $("input[name='item_id']").val();

        if (buyNum <= store_count) {

            location.href = "/index.php?m=Mobile&c=Cart&a=cart2&action=buy_now&goods_num="+buyNum+"&goods_id="+goods_id+"&item_id="+item_id+"&groupid="+groupid;

        } else {

            layer.open({content:"购买数量超过此商品购买上限",time:2});

            location.href="<?php echo U('User/login'); ?>";

        }

    }

    /**

     * 立即购买

     */

    function taocan_buy_now(){

       if(user_id == ''){

            layer.open({content:"您还未登录！",time:2});

            location.href="<?php echo U('User/login'); ?>";

            return;

        }

        var store_count = $("input[name='store_count']").val();// 商品原始库存

        var buyNum = 1;

        if (buyNum <= store_count) {

            $('#buy_goods_form').submit();

        } else {

            layer.msg('购买数量超过此商品购买上限', {icon: 3});

        }

    }



    /**

     * 加载更多评论

     */

    function ajaxComment(commentType,page){

        $.ajax({

            type : "GET",

            url:"/index.php?m=Mobile&c=goods&a=ajaxComment&goods_id=<?php echo $goods['goods_id']; ?>&commentType="+commentType+"&p="+page,//+tab,

            success: function(data){

                $(".choose-content").append(data);

            }

        });

    }

    /****************************评论end********************************/

    

    //税费说明

    function taxation(){

        var taxation = "<?php echo $goods['tax_declare']; ?>"

        layer.open({

            content:taxation,

            time:5,

        });

    }



    /****************************套餐start********************************/

    $('#productSwiper').swiper({

        slidesPerView: 3,

        paginationClickable: true,

        spaceBetween: 30

    });

    $('.checkbox-square').on('click',function(){

        var pgoods_id = $(this).attr('pgoods_id');

        

        if($(this).hasClass('checked')){

            $(this).removeClass('checked');

            $(".pgoods_id_"+pgoods_id).prop('checked', false).attr('checked', false);

        }else{

            $(this).addClass('checked');

            $(".pgoods_id_"+pgoods_id).prop('checked', 'checked').attr('checked', 'checked');

        }

    });

    /****************************套餐end********************************/





    /****************************滚动start********************************/

    var scrollDom = $('div[data-id]'),

        scrollADom = $('.product-head a'),

        scrollTops=[];

    scrollADom.on('click',function(){

        scrollADom.removeClass('active');

        $(this).addClass('active');

        var dataId = $(this).attr('data-place');

        var offsetTop = parseInt($('div[data-id='+dataId+']').offset().top) -100;

        $(window).scrollTop(offsetTop);

    });

    $(window).scroll(function(){

        for(var i=0;i<scrollDom.length;i++){

            scrollTops[i] = [];

            scrollTops[i][0] = $(scrollDom[i]).offset().top;

            if(i<scrollDom.length-1){

                scrollTops[i][1] = $(scrollDom[i+1]).offset().top;

            }else{

                scrollTops[i][1] = 100000;

            }

        }

        var scrollTop = $(this).scrollTop()+100;

        for(var j=0;j<scrollTops.length;j++){

            if((scrollTop >= scrollTops[j][0]) && (scrollTop < scrollTops[j][1])){

                if(!$(scrollADom[j]).hasClass('active')){

                    scrollADom.removeClass('active');

                    $(scrollADom[j]).addClass('active');

                }

                break;

            }

        }

    });

    /****************************滚动end********************************/



    /****************************收藏start********************************/

    $('.product-bottom-menu .collect').on('click',function(){



        collect_goods();

        if($(this).find('span.icon').hasClass('am-icon-heart-o')){



            $(this).find('span.icon').removeClass('am-icon-heart-o').addClass('am-icon-heart');

            $(this).find('span.text').text('取消');

        }else{

            $(this).find('span.icon').removeClass('am-icon-heart').addClass('am-icon-heart-o');

            $(this).find('span.text').text('收藏');

        }

    });

    /****************************收藏end********************************/

    //ajax请求购物车列表
    function ajax_header_cart(){
        var cart_cn = getCookie('cn');
        if (cart_cn == '') {
            $.ajax({
                type: "GET",
                url: "/index.php?m=Home&c=Cart&a=header_cart_list",//+tab,
                success: function (data) {
                    cart_cn = getCookie('cn');
                }
            });
        }
        $('#tp_cart_info').html(cart_cn);
    }

    //初始化商品价格库存

    function initGoodsPrice() {

        var goods_id = $('input[name="goods_id"]').val();

        var goods_num = parseInt($('#number').val());

        if (!$.isEmptyObject(spec_goods_price)) {

            var goods_spec_arr = [];

            $("input[name^='goods_spec']").each(function () {

                if($(this).attr('checked') == 'checked'){

                    goods_spec_arr.push($(this).val());

                }

            });

            var spec_key = goods_spec_arr.sort(sortNumber).join('_');  //排序后组合成 key

            var item_id = spec_goods_price[spec_key]['item_id'];

            $('input[name=item_id]').val(item_id);

        }

        $.ajax({

            type: 'post',

            dataType: 'json',

            data: {goods_id: goods_id, item_id: item_id, goods_num : goods_num},

            url: "<?php echo U('Mobile/Goods/activity'); ?>",

            success: function (data) {

                if (data.status == 1) {

                    $('input[name="goods_prom_type"]').attr('value', data.result.goods.prom_type);//商品活动类型

                    $('input[name="shop_price"]').attr('value', data.result.goods.shop_price);//商品价格

                    $('input[name="store_count"]').attr('value', data.result.goods.store_count);//商品库存

                    $('input[name="market_price"]').attr('value', data.result.goods.market_price);//商品原价

                    $('input[name="start_time"]').attr('value', data.result.goods.start_time);//活动开始时间

                    $('input[name="end_time"]').attr('value', data.result.goods.end_time);//活动结束时间

                    $('input[name="activity_title"]').attr('value', data.result.goods.activity_title);//活动标题

                    $('input[name="prom_detail"]').attr('value', data.result.goods.prom_detail);//促销详情

                    $('input[name="buy_limit"]').attr('value', data.result.goods.buy_limit);//促销详情

                    $('input[name="activity_is_on"]').attr('value', data.result.goods.activity_is_on);//活动是否正在进行中

                    $('input[name="prom_id"]').attr('value', data.result.goods.prom_id);//活动Id

                    if(data.result.goods.is_virtual){

                        $('.buy_limit').show();

                    }else{

                        $('.buy_limit').hide();

                    }

                    goods_activity_theme();

                }

            }

        });

    }

    //切换规格

    function switch_spec(spec) {

        $(spec).siblings().removeClass('hover');

        $(spec).addClass('hover');

        $(spec).parent().parent().find('input').removeAttr('checked');

        $(spec).children('input').attr('checked', 'checked');

        $('.team-pies').hide();

        //商品价格库存显示

        initGoodsPrice();

    }

    //商品价格库存显示

    function goods_activity_theme(){

        var goods_prom_type = $('input[name="goods_prom_type"]').attr('value');

        var activity_is_on = $('input[name="activity_is_on"]').attr('value');

        if(activity_is_on == 0){

            setNormalGoodsPrice();

        }else {

            if (goods_prom_type == 0) {

                //普通商品

                setNormalGoodsPrice();

            } else if (goods_prom_type == 1) {

                //抢购

                setFlashSaleGoodsPrice();

            } else if (goods_prom_type == 2) {

                //团购

                setGroupByGoodsPrice();

            } else if (goods_prom_type == 3) {

                //优惠促销

                setPromGoodsPrice();

            } else if(goods_prom_type == 6) {

                //拼团

                $('.team-pies').show();

                var prom_id = $('input[name="prom_id"]').attr('value');

                var goods_id = $('input[name="goods_id"]').attr('value');

                $('.team_button').attr('href',"/index.php?m=Mobile&c=Team&a=info&team_id="+prom_id+"&goods_id="+goods_id);

                setNormalGoodsPrice();

            } else {



            }

        }

        var buy_num  = parseInt($('#number').val());//购买数

        var store = $('#spec_store_count').html();//实际库存数量

        $('#number').attr('residuenum',store);

        if(store<=0){

            $('.dis_btn').addClass('dis');

        }else{

            $('.dis_btn').removeClass('dis');

        }

        if(buy_num > store){

            $('.buyNum').val(store);

        }

    }

    //普通商品库存和价格

    function setNormalGoodsPrice() {

        var goods_price = $("input[name='shop_price']").attr('value');// 商品本店价

        var market_price =  $("input[name='market_price']").attr('value');// 商品市场价

        var store_count = $("input[name='store_count']").attr('value');// 商品库存

        var exchange_integral = $("input[name='exchange_integral']").attr('value');// 兑换积分

        var point_rate = $("input[name='point_rate']").attr('value');// 积分金额比

        // 如果有属性选择项

        if (!$.isEmptyObject(spec_goods_price) && spec_goods_price != '') {

            var goods_spec_arr = [];

            $("input[name^='goods_spec']").each(function () {

                if($(this).attr('checked') == 'checked'){

                    goods_spec_arr.push($(this).val());

                }

            });

            var spec_key = goods_spec_arr.sort(sortNumber).join('_');  //排序后组合成 key

            goods_price = spec_goods_price[spec_key]['price']; // 找到对应规格的价格

            store_count = spec_goods_price[spec_key]['store_count']; // 找到对应规格的库存

        }

        var goods_num = parseInt($("input[name='goods_num']").attr('value'));

        if (goods_num > store_count) {

            goods_num = store_count;

            $("#goods_num").val(goods_num);

        }

        var integral = round(goods_price - (exchange_integral / point_rate),2);

        if(exchange_integral > 0){

            $("#goods_price").html(integral + '+' +exchange_integral + '积分'); //变动价格显示

            $("#price").html("<em>￥</em>" + integral + '+' +exchange_integral + '积分'); //积分显示

        }else{

            $("#goods_price").html(goods_price); //变动价格显示

            $("#price").html("<em>￥</em>" + goods_price); //变动价格显示

        }

        $('#market_price_title').html('市场价：');

        $('#spec_store_count').html(store_count);

        $('#number').attr('max', store_count);

        $('.spec_store_count').html(store_count);

        $('.presale-time').hide();

    }

    //点击收藏商品

    function collect_goods(){

        $.ajax({

            type : "GET",

            dataType: "json",

            url:"/index.php?m=Home&c=goods&a=collect_goods&goods_id="+goods_id,//+tab,

            success: function(data){

                console.log(data);

                /*

                layer.open({content:data.msg, time:2});

                if(data.status == '1'){

                    //收藏点亮

                    $('.de_font .keep').find('i').addClass('red');

                }

                */

            }

        });

    }



    /**

     * 已选

     */

    $('.choise_num').click(function () {

        cover();

        $('.choose_shop_aready').show();

        $('.podee').hide();

    })



    //关闭属性选择

    $('.xxgro').click(function () {

        undercover();

        $('.choose_shop_aready').hide();

        $('.podee').show();

        sel();

    })



    /**

     * 规格选择

     */

    $('.choic-sel a').click(function(){

        //切换选择

        $(this).addClass('red').parent().siblings().find('a').removeClass('red');

    });



    //运费

    $(function(){

        $('.remain').click(function(){

            $('#balance').toggle(300);

        })

        $('#balance').on('click','a',function(){

            $('#shipping_freight').text($(this).find('span').text());

            $('#balance').toggle(300);

        })

    });



    //将选择的属性添加到已选

    function sel() {

        var residuenum = parseInt($('.buyNum').attr('residuenum'));

        var title = '';

        $('.choicsel').find('a').each(function (i, o) {   //获取已选择的属性，规格

            if ($(o).hasClass('red')) {

                title += $(o).attr('title') + '&nbsp;&nbsp;';

            }

        })

        var num = $('.buyNum').val();

        if (num > residuenum) {

            num = residuenum;

        }

        var sel = title + '&nbsp;&nbsp;' + num + '件';

        $('.sel').html(sel);

    }



    //拼团

    function groupBuy(){

        var btn = $(".groupBuyBtn");

        data = {

            goods_id : '<?php echo $goods['goods_id']; ?>',

            goods_name : '<?php echo $goods['goods_name']; ?>',

            item_id : '<?php echo $item_id; ?>',

            goods_price : '<?php echo $goods['shop_price']; ?>',

            price : $("input[name='group-price']:checked").val(),

            group_id : $("input[name='group-price']:checked").attr('group'),

            goods_num : $('input[name="goods_num"]').val(),

        };



        btn.on("click",function(){

            //alert(data.goods_price);

            if(user_id == ''){

                layer.open({content:"您还未登录！",time:2});

                location.href="<?php echo U('User/login'); ?>";

             return;

             }



            $.ajax({

                type:'post',

                data:data,

                dataType: 'json',

                url:"/index.php?m=Home&c=activity&a=group_list&id=<?php echo $goods['goods_id']; ?>",

                success:function(res){

                    if (res.status == -1) {
                        layer.msg(res.msg);
                    }
                    else if(res.status == 1){
                        groupid = res.msg;
                        buy_now();

                    }else{
						$("body").css('overflow','hidden');
						/*
                        location.href="<?php echo U('activity/group_list',array('id'=>$goods['goods_id'])); ?>"

                        // layer.open({

                        //     type: 2,

                        //     title: '我要拼团',

                        //     shadeClose: true,

                        //     shade: 0.8,

                        //     area: ['1200px', '485px'],

                        //     content: "/index.php?m=Home&c=activity&a=group_list&id=<?php echo $goods['goods_id']; ?>"

                        // }); ,content: '<iframe width src= "/index.php?m=Home&c=activity&a=group_list&id=<?php echo $goods['goods_id']; ?>">'*/

						layer.open({
						title:false,
						closeBtn: 0, 
						 area: ['100%', '100%'],
						  type: 2
						  ,content: "<?php echo U('activity/group_list',array('id'=>$goods['goods_id'])); ?>"
						});
					}

                }

            });

            

            

        });

    }

groupBuy();



</script>