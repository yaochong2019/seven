<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:37:"./template/pc/jinghui/cart/cart2.html";i:1542526316;s:40:"./template/pc/jinghui/public/header.html";i:1542287950;s:42:"./template/pc/jinghui/public/left_nav.html";i:1542288714;s:40:"./template/pc/jinghui/public/footer.html";i:1534148398;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="keyword" content="" />
    <meta name="description" content="" />
    <title>购物车</title>
    <link rel="stylesheet" href="__STATIC__/css/normalize.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont.css">
    <link rel="stylesheet" href="__STATIC__/vendor/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="__STATIC__/vendor/jquery-labelauty/jquery-labelauty.css"><!--单选复选css-->
    <link rel="stylesheet" href="__STATIC__/css/main.css">
    <script src="__STATIC__/vendor/jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="__STATIC__/vendor/html5shiv.min.js"></script>
    <script src="__STATIC__/vendor/respond.min.js"></script>
    <script>
        alert("您的浏览器版本过低请升级！");
        location.href = "http://outdatedbrowser.com/zh-cn";
    </script>
    <![endif]-->
</head>
<body>
<!--header-->

<header class="header">

    <div class="container clearfix">

        <div class="header-left fl clearfix">

            <a class="logo" href="/">Logo</a>

            <img src="__STATIC__/images/basic/subject.png" alt="">

        </div>

        <div class="header-right fr clearfix">

            <div class="fast-menu fr" <?php if($user['user_id'] != null): ?> style="width: 140px;" <?php endif; ?>>

                <!--<?php if($user['user_id'] == null): ?>-->

                <a href="<?php echo U('Home/user/login'); ?>">登录</a><span>|</span>

                <a href="<?php echo U('Home/content/index'); ?>">客服</a><span>|</span>

                <a href="<?php echo U('Home/Order/order_list'); ?>">订单</a><br>

                <a href="<?php echo U('/Home/Article/detail/article_id/28'); ?>">我们</a><span>|</span>

                <!--<a href="<?php echo U('Home/Order/order_list'); ?>">订单</a>-->

                <!--<a href="<?php echo U('Home/article/about'); ?>">我们</a><span>|</span>-->

                <a href="<?php echo U('Home/article/articleList'); ?>">资料</a><span>|</span>

                <a href="<?php echo U('Home/cart/index'); ?>" class="cart"><i class="iconfont"><img src="__STATIC__/images/pc_shop.png" alt=""></i><span class="badge shop-nums" id="cart_quantity">0</span></a>

                <!--<a href="<?php echo U('Home/cart/index'); ?>" class="cart"><i class="iconfont icon-cart"></i><span class="badge shop-nums" id="cart_quantity">12</span></a>-->

                <!--<?php else: ?>-->
                <div class="login-info" style="margin-top:-22px;">
                    <a href="<?php echo U('Home/user/index'); ?>" style="overflow: hidden;height: 20px;width: 70%;"><?php echo !empty($user['nickname'])?$user['nickname'] :$user['username']; ?></a><br>

                    <a href="<?php echo U('Home/user/logout'); ?>">退出</a><span>|</span>

                    <a href="<?php echo U('Home/content/index'); ?>">客服</a><span>|</span>

                    <a href="<?php echo U('Home/Order/order_list'); ?>">订单</a>

                    <a href="<?php echo U('/Home/Article/detail/article_id/28'); ?>">我们</a><span>|</span>

                    <a href="<?php echo U('Home/article/articleList'); ?>">资料</a><span>|</span>

                    <a href="<?php echo U('Home/cart/index'); ?>" class="cart"><i class="iconfont"><img src="__STATIC__/images/pc_shop.png" alt=""></i><span class="badge shop-nums" id="cart_quantity"><?php echo $car_num; ?></span></a>
                </div>
                <!--<?php endif; ?>-->



            </div>

            <div class="header-search fr">

                <form id="searchForm" method="get" action="<?php echo U('Home/Goods/search'); ?>">

                    <input placeholder="输入想要的商品或品牌" class="text ecsc-search-input" type="text" autocomplete="off" name="q" id="q" value="<?php echo \think\Request::instance()->param('q'); ?>" />

                    <button type="submit" class="btn">搜索</button>

                    <script src="__STATIC__/vendor/jquery.min.js"></script>

                    <script type="text/javascript">

                    ;(function($){

                        $.fn.extend({

                            donetyping: function(callback,timeout){

                                timeout = timeout || 1e3;

                                var timeoutReference,

                                        doneTyping = function(el){

                                            if (!timeoutReference) return;

                                            timeoutReference = null;

                                            callback.call(el);

                                        };

                                return this.each(function(i,el){

                                    var $el = $(el);

                                    $el.is(':input') && $el.on('keyup keypress',function(e){

                                        if (e.type=='keyup' && e.keyCode!=8) return;

                                        if (timeoutReference) clearTimeout(timeoutReference);

                                        timeoutReference = setTimeout(function(){

                                            doneTyping(el);

                                        }, timeout);

                                    }).on('blur',function(){

                                        doneTyping(el);

                                    });

                                });

                            }

                        });

                    })(jQuery);

                    function searchWord(words){

                        $('#q').val(words);

                        $('#searchForm').submit();

                    }

                    function search_key(){

                        var search_key = $.trim($('#q').val());

                        if(search_key != ''){

                            $.ajax({

                                type:'post',

                                dataType:'json',

                                data: {key: search_key},

                                url:"<?php echo U('Home/Api/searchKey'); ?>",

                            });

                        }

                    }

                </script>

                </form>

            </div>

        </div>

    </div>

</header>

<!--nav-->

<nav class="nav">

    <div class="container">

        <ul class="list" id="navList">

            <li>

                <a href="<?php echo U('index/index'); ?>">首页</a>

            </li>

            <!-- <?php if(is_array($goods_category_tree) || $goods_category_tree instanceof \think\Collection || $goods_category_tree instanceof \think\Paginator): $kr = 0; $__LIST__ = $goods_category_tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($kr % 2 );++$kr;?> -->

            <?php if($v[level] == 1): ?>

            <li >

                <a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v[id])); ?>" title="<?php echo $v[name]; ?>"><?php echo $v[name]; ?></a>

                <?php endif; ?>

                <div class="son-menu clearfix">

                    <div class="son-menu-cate fl">

                        <div class="title">品类</div>

                        <div class="list">

                            <?php if(is_array($v['tmenu']) || $v['tmenu'] instanceof \think\Collection || $v['tmenu'] instanceof \think\Paginator): if( count($v['tmenu'])==0 ) : echo "" ;else: foreach($v['tmenu'] as $k2=>$v2): if($v2[parent_id] == $v['id']): ?>

                            <a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id])); ?>" target="_blank"><?php echo $v2[name]; ?></a>

                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>

                        </div>

                    </div>

                    <div class="son-menu-brand fr">

                        <div class="title">品牌</div>

                        <div class="brand-list">

                            <div class="scroll-list-btn">

                               <a class="food-brand-list-up" href="javascript:;"><i class="iconfont brand-icon-up"><img src="__STATIC__/images/brand-icon.png" alt=""></i></a>

                            </div>

                            <div class="food-sub-menu-scroll">

                                <div class="content swiper-wrapper">

                                    

                                    <?php $ji = 1?>

                                   <!-- <?php if(is_array($brand) || $brand instanceof \think\Collection || $brand instanceof \think\Paginator): $_keys = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($_keys % 2 );++$_keys;?>  -->



                                    <!-- <?php if($vo[parent_cat_id] == $v[id]): ?> -->

                                    <?php if($ji % 8 == 1){?>

                                    <div class="list swiper-slide">

                                    <?php }?>

                                        <a href="<?php echo U('Goods/goodsList',array('id'=>$v['id'],'brand_id'=>$vo[id])); ?>" style="height: 66px;">

                                            <img src="<?php echo $vo[logo]; ?>" alt="<?php echo $vo[name]; ?>" width="100%" style="height: 40px;">

                                            <p style="padding: 0;margin: 0;box-sizing: border-box;"><?php echo $vo[name]; ?></p>

                                        </a>

                                    <?php  if($ji % 8 == 0){?>

                                    </div>

                                    <?php } $ji++;?>

                                    <!-- <?php endif; ?> -->



                                    <?php  if($_keys == count($brand)){?>

                                    </div>

                                    <?php } ?>



                                    <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->

                                    

                            </div>

                            

                            

                        </div>

                        <div class="scroll-list-btn">

                                <a class="food-brand-list-down" href="javascript:;"><i class="iconfont brand-icon-down"><img src="__STATIC__/images/brand-icon.png" alt=""></i></a>

                            </div>

                    </div>

                </div>

            </li>

            <li>

            <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->

            <li class="last">

                <a href="<?php echo U('Goods/timeLimitShop'); ?>">限时购</a>

            </li>

        </ul>

        <script type="text/javascript">

        $('#navList a').each(function(){

            if ($(this)[0].href==String(window.location)) {

                $(this).parent().addClass('active');

            }

        });

        </script>

    </div>

</nav>
<!--member-->
<div class="container">

	<div class="member clearfix">

		<div class="member-left">

			<div class="title">我的账户</div>

			<div class="list">

				<div class="item">

					<a   href="<?php echo U('Order/order_list'); ?>" <?php if($_controller == 'order' and $_action == 'order_list'): ?>   class="active" <?php endif; ?> >我的订单</a>

				</div>

				<div class="item">

					<a href="<?php echo U('Cart/index'); ?>" <?php if($_controller == 'cart' and $_action == 'index'): ?>   class="active" <?php endif; ?>>购物车</a>

				</div>

				<div class="item">

					<a href="<?php echo U('User/index'); ?>" <?php if($_controller == 'user' and $_action == 'index'): ?>   class="active" <?php endif; ?>>账户信息</a>

				</div>
				<div class="item">

					<a href="<?php echo U('User/address'); ?>" <?php if($_controller == 'user' and $_action == 'address'): ?>   class="active" <?php endif; ?>>收货地址</a>

				</div>
				<div class="item">

					<a href="#">联系客服</a>

				</div>

				<!-- <div class="item">

					<a href="<?php echo U('article/articleList'); ?>" <?php if($_controller == 'article' and $_action == 'articleList'): ?>   class="active" <?php endif; ?>>资料</a>

				</div>

				<div class="item">

					<a href="<?php echo U('/Home/Article/detail/article_id/28'); ?>" <?php if($_controller == 'article' and $_action == 'articleList'): ?>   class="active" <?php endif; ?>>我们</a>

				</div> -->



			</div>

		</div>
    <div class="member-right">
            <!-- <div class="title clearfix"><span>购物车</span></div> -->
        <form name="cart2_form" id="cart2_form" method="post">
            <!--立即购买才会用到-s-->
            <input type="hidden" name="action" value="<?php echo \think\Request::instance()->param('action'); ?>">
            <input type="hidden" name="goods_id" value="<?php echo \think\Request::instance()->param('goods_id'); ?>">
            <!-- <?php if(is_array($cartList) || $cartList instanceof \think\Collection || $cartList instanceof \think\Paginator): $keys = 0; $__LIST__ = $cartList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cart): $mod = ($keys % 2 );++$keys;?> -->
            <!-- <?php if($cart['ispack'] == 1): ?> -->
            <input type="hidden" name="pgoods_id[<?php echo $cart['goods_id']; ?>]" value="<?php echo $cart['goods_id']; ?>">
            <!-- <?php endif; ?> -->
            <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->
			<input type="hidden" name="zhuituan" value="<?php echo (isset($zhuituan) && ($zhuituan !== '')?$zhuituan:'0'); ?>">
            <!-- <?php if($group_id != null): ?> -->
            
			<input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
            <!-- <?php endif; ?> -->

            <input type="hidden" name="item_id" value="<?php echo \think\Request::instance()->param('item_id'); ?>">
            <!--<input type="hidden" name="goods_num" value="<?php echo \think\Request::instance()->param('goods_num'); ?>">-->
			<input type="hidden" name="goods_num" value="<?php echo $cart['goods_num']; ?>">
            <!--立即购买才会用到-e-->
        <?php if(!(empty($cartList) || (($cartList instanceof \think\Collection || $cartList instanceof \think\Paginator ) && $cartList->isEmpty()))): ?>
            <div class="right-cont">
                <div class="account-item">
                    <div class="item-title">
                        <span>以保存收获地址<em>(共<?php echo $address_num; ?>条)</em></span>
                        <a class="addAddress" href="javascript:void(0);" onClick="add_edit_address(0);"><i class="iconfont"></i>+ 添加收货地址</a>
                    </div>
                    <div class="cart-item-text">
                        <table class="table">
                            <thead>
                            <tr>
                                <th width="60">&nbsp;</th>
                                <th width="140">姓名</th>
                                <th width="200">所在地区</th>
                                <th class="text-left">收货地址</th>
                                <th width="140">联系方式</th>
                                <th width="140">操作</th>
                                <th width="130">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody id="ajax_address">
                            </tbody>
                        </table>
                    </div>
                </div>
            
                <div class="account-item">
                    <div class="item-title">
                        <span>我的购物车</span>
                    </div>
                    <div class="cart-list" id="jhshop-cart">
                        <table class="table cart-head">
                            <thead>
                            <tr>
                                <th class="text-left">商品信息</th>
                                <th width="120">价格</th>
                                <th width="180">数量</th>
                                <th width="120">总价</th>
                                <th width="120">操作</th>
                            </tr>
                            </thead>
                        </table>
                    <?php if(is_array($cartList) || $cartList instanceof \think\Collection || $cartList instanceof \think\Paginator): $i = 0; $__LIST__ = $cartList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cart): $mod = ($i % 2 );++$i;?>
                        <div class="cart-list-cont">
                            <div class="cart-list-item item-single" id="edge_<?php echo $cart['id']; ?>">
                                <table class="table product-list">
                                    <tbody>
                                    <tr>
                                        <td width="60">
                                        </td>
                                        <td width="110">
                                        <a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$cart[goods_id])); ?>">
										<?php 
										if(goods_thum_images($cart.goods_id,78,78) == '/public/images/icon_goods_thumb_empty_300.png'){
										 ?>
										<img width="80" src="<?php echo goods_thum_images($cart['goods_id'],200,200); ?>" alt="">
										<?php }else{ ?>
                                        <img width="80" src="<?php echo goods_thum_images($cart['goods_id'],78,78); ?>" alt="">
										<?php } ?>
                                        </a>
                                        </td>
                                        <td class="text-left">
                                            <div class="product-name"><?php echo $cart['goods_name']; ?>
                                            <!--抢购--><?php if($cart[prom_type] == 1): ?><img  width="40" height="40" src="/public/images/qianggou2.jpg" style="vertical-align:middle"><?php endif; ?>
                                            </div>
                                            <div class="product-code">商品编号：<?php echo $cart['goods_sn']; ?></div>
                                            <div class="product-service"><span>7</span> 支持7天无理由退货</div>
                                        </td>
                                        <td width="120">
                                            <div class="unit-price">
                                                <div class="old-price">￥<?php echo $cart['market_price']; ?></div>
                                                <!-- <?php if($cart['ispack'] == 1): ?> -->
                                                <div class="now-price">￥<?php echo $cart['pack_price']; ?></div>
                                                <!-- <?php else: ?> -->

                                                <!-- <?php if($group_id != null and $group_type == 2): ?> -->
                                                <div class="now-price">￥<?php echo $cart['goods']['group_price2']; ?></div>
                                                <!-- <?php elseif($group_id != null and $group_type == 3): ?> -->
                                                <div class="now-price">￥<?php echo $cart['goods']['group_price3']; ?></div>
                                                <!-- <?php else: ?> -->
                                                <div class="now-price">￥<?php echo $cart['goods_price']; ?></div>
                                                <!-- <?php endif; ?> -->

                                                <!-- <?php endif; ?> -->
                                            </div>
                                        </td>
                                        <td width="180">
                                            <div class="now-price "><?php echo $cart['goods_num']; ?></div>
                                        </td>
                                        <td width="120">
                                            <div class="now-price total-price" align="center" valign="middle" id="cart_<?php echo $cart['id']; ?>_market_price">￥<?php echo $cart['goods_fee']; ?></div>
                                        </td>
                                        <td width="120">
                                            <div class="cart-handle">
                                                <div class="collect">
                                                    <div class="deleteGoods" data-cart-id="<?php echo $cart['id']; ?>" href="javascript:void(0);"></div>
                                                    <a href="javascript:;" onclick="collectLink(<?php echo $cart['goods_id']; ?>);"><i class="iconfont"></i> 移入收藏夹</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="7">
                                            <div class="simple-word total-prices">
                                                商品应付总计：￥<?php echo $cart['goods_fee']; ?>   预估税费：￥
                                                <?php echo $cart['goods']['tax_price']; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                               
                            </div> 
                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                        <table class="table cart-footer">
                            <thead>
                            <tr><th width="120"></th>
                                <th width="300" style="margin:0 0 0 10px;">
                                    <p class="title">
                                    选择物流:
                                    <select onchange="ajax_order_price();" class="text" name="shipping_code">
                                        <?php if(is_array($shippingList) || $shippingList instanceof \think\Collection || $shippingList instanceof \think\Paginator): if( count($shippingList)==0 ) : echo "" ;else: foreach($shippingList as $k4=>$v4): ?>
                                            <option value="<?php echo $v4['code']; ?>"  ><?php echo $v4['name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                    ￥<em id="postFee">0.00</em></p>
                                </th>
                                <th>
                                    <div class="cart-word">
                                        <div class="bottom">
                                            商品应付总计：<b style="color: #e21a1a;">￥<em id="payables">0.00</em></b><span><?php echo $total_price['total_fee']; ?></span>商品税费(不含运费税)：￥<span class="all_tax_price"></span>
                                        </div>
                                    </div>
                                </th>
                                <th width="136" class="pay-btn-cont">
								<!-- <?php if($shiming_is == 1): ?> -->
									<!-- <?php if($user['usercode'] == null): ?> -->
                                        <a class="pay-btn editBasicMsg2" href="javascript:void(0);">请先实名认证</a>
                                    <!-- <?php elseif($user['paypwd'] == null): ?> -->
                                        <a class="pay-btn editBasicMsg2" href="javascript:void(0);">请先设置支付密码</a>
                                    <!-- <?php else: ?> -->
                                        <a class="pay-btn" href="javascript:void(0);" onClick="submit_order();">点击付款</a>
                                    <!-- <?php endif; ?> -->
								<!-- <?php else: ?> -->
                                    <!-- <?php if($user['paypwd'] == null): ?> -->
                                        <a class="pay-btn editBasicMsg2" href="javascript:void(0);">请先设置支付密码</a>
                                    <!-- <?php else: ?> -->
                                        <a class="pay-btn" href="javascript:void(0);" onClick="submit_order();">点击付款</a>
                                    <!-- <?php endif; ?> -->
								<!-- <?php endif; ?> -->	
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
    </form>
</div>
<!--footer-->
<!--product advantage-->

<div class="container">

    <div class="advantage clearfix">

        <div class="item">

            <div class="icon icon1"></div>

            <div class="text">

                <div class="s1">商品保障</div>

                <div class="s2">海外自采 海关监管</div>

            </div>

        </div>

        <div class="item">

            <div class="icon icon2"></div>

            <div class="text">

                <div class="s1">低价保障</div>

                <div class="s2">全新模式 性价比最高</div>

            </div>

        </div>

        <div class="item">

            <div class="icon icon3"></div>

            <div class="text">

                <div class="s1">速度保障</div>

                <div class="s2">最快2小时出仓</div>

            </div>

        </div>

        <div class="item">

            <div class="icon icon4"></div>

            <div class="text">

                <div class="s1">退货保障</div>

                <div class="s2">直接退货到国内地址</div>

            </div>

        </div>

    </div>
</div>
    <!--footer-->
<div class="container" style="max-width:none;padding:0;">
<footer class="footer">

    <div id="foot">

        <p class="p" style="margin-bottom: 20px;font-size:15px; ">

        <a href="<?php echo U('/Home/Article/detail/article_id/28'); ?>">关于我们</a><span>|</span>

              <a href="<?php echo U('/Home/Article/detail/article_id/37'); ?>">服务条款</a><span>|</span>

              <a href="<?php echo U('/Home/Article/detail/article_id/30'); ?>">免责声明</a><span>|</span>

              <a href="<?php echo U('/Home/Article/detail/article_id/31'); ?>">隐私声明</a><span>|</span>

              <a href="<?php echo U('/Home/Article/detail/article_id/32'); ?>">帮助中心</a><span>|</span>
              
              <a href="<?php echo U('/Home/Content/index'); ?>">联系我们</a><span>|</span>

            <?php
                                   
                                $md5_key = md5("select * from `__PREFIX__article` where cat_id = 5 and is_open=1");
                                $result_name = $sql_result_v = S("sql_".$md5_key);
                                if(empty($sql_result_v))
                                {                            
                                    $result_name = $sql_result_v = \think\Db::query("select * from `__PREFIX__article` where cat_id = 5 and is_open=1"); 
                                    S("sql_".$md5_key,$sql_result_v,86400);
                                }    
                              foreach($sql_result_v as $k=>$v): ?>

                <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v[article_id])); ?>"><?php echo $v[title]; ?></a>

                <span>|</span>

            <?php endforeach; ?>

        </p>

        <div>

        <p class="p">

        服务热线：<?php echo $tpshop_config['shop_info_phone']; ?>&nbsp&nbsp 邮箱：contact@pure-seven.com&nbsp&nbsp

        </p>
        <script>
			var myDate = new Date();
			var nowyear = myDate.getFullYear();
		</script>
		
        <p class="p copyright">Copyright&nbsp@&nbsp2018 浙江净会电子商务有限公司&nbsp<?php echo $tpshop_config['shop_info_record_no']; ?></p>

        </div>


</footer>
</div>



<script src="__STATIC__/vendor/swiper/js/swiper.min.js"></script>
<script src="__STATIC__/vendor/layer/layer.js"></script>
<script src="__STATIC__/vendor/jquery-labelauty/jquery-labelauty.js"></script><!--单选复选美化插件-->
<script src="__STATIC__/js/main.js"></script>
<script>
$(document).ready(function(){
            initDecrement();
            initCheckBox();
            AsyncUpdateCart();
            ajax_address(); // 获取用户收货地址列表
        });

        //二级菜单下的品牌滚动
        new Swiper('.food-sub-menu-scroll', {
            direction: 'vertical',
            autoHeight: true,
            navigation: {
                nextEl: '.food-brand-list-up',
                prevEl: '.food-brand-list-down'
            },
            observer:true,
            observeParents:true
        });

        /***收藏商品**/
        function collectLink(id){
            $.ajax({
                type:'post',
                dataType:'json',
                data:{goods_id:id},
                url:"<?php echo U('Home/Goods/collect_goods'); ?>",
                success:function(res){
                    if(res.status == 1){
                        layer.msg('成功添加至收藏夹', {icon: 1});
                    }else{
                        layer.msg(res.msg, {icon: 3});
                    }
                }
            });
        };

        //购物车对象
        function CartItem(id, goods_num,selected) {
            this.id = id;
            this.goods_num = goods_num;
            this.selected = selected;
        }
        //初始化计算订单价格
        function AsyncUpdateCart(){
            var cart = new Array();
            var inputCheckItem = $("input[name^='checkItem']");
            inputCheckItem.each(function(i,o){
                var id = $(this).attr("value");
                var goods_num = $(this).parents('.item-single').find("input[id^='changeQuantity']").attr('value');
                if ($(this).attr("checked") == 'checked') {
                    var cartItemCheck = new CartItem(id,goods_num,1);
                    cart.push(cartItemCheck);
                }else{
                    var cartItemNoCheck = new CartItem(id,goods_num,0);
                    cart.push(cartItemNoCheck);
                }
            })
            $.ajax({
                type : "POST",
                url:"<?php echo U('Home/Cart/AsyncUpdateCart'); ?>",//,
                dataType:'json',
                data: {cart: cart},
                success: function(data){
                    if(data.status == 1){
                        $('#goods_num').empty().html(data.result.goods_num+"件");
                        $('#total_fee').empty().html('￥'+data.result.total_fee);
                        $('#goods_fee').empty().html('-￥'+data.result.goods_fee);
						
						//
						$('#xctotal').empty().html('￥'+data.result.total_fee);
						
                        var cartList =  data.result.cartList;
                        if(cartList.length > 0){
                            for(var i = 0; i < cartList.length; i++){
                                $('#cart_'+cartList[i].id+'_goods_price').empty().html('￥'+cartList[i].goods_price);
                                $('#cart_'+cartList[i].id+'_member_goods_price').empty().html('￥'+cartList[i].member_goods_price);
                                $('#cart_'+cartList[i].id+'_total_price').empty().html('￥'+cartList[i].total_fee);
                                $('#cart_'+cartList[i].id+'_market_price').empty().html('￥'+(cartList[i].member_goods_price*cartList[i].goods_num).toFixed(2)); //活动价格
                            //
								$('#total_prices_'+cartList[i].id).empty().html('￥'+(cartList[i].member_goods_price*cartList[i].goods_num).toFixed(2)); //活动价格
                           
							}
                        }else{
                            $('.total_price').empty();
                            $('.cut_price').empty();
                        }
                    }
                }
            });
        }
        //减购买数量事件
        $(function () {
            $(document).on("click", '.decrement', function (e) {
                var changeQuantityNum = $(this).parent().find('input').val();
                if (changeQuantityNum > 1) {
                    $(this).parent().find('input').attr('value', parseInt(changeQuantityNum) - 1).val(parseInt(changeQuantityNum) -1);
                }
                initDecrement();
                changeNum(this);
            })
        })
        //加购买数量事件
        $(function () {
            $(document).on("click", '.increment', function (e) {
                var changeQuantityNum = $(this).parent().find('input').val();
                if(changeQuantityNum > 199){
                    changeQuantityNum = 199;
                    layer.msg("购买商品数量不能大于200",{icon:2});
                }
                $(this).parent().find('input').attr('value', parseInt(changeQuantityNum) + 1).val(parseInt(changeQuantityNum) + 1);
                initDecrement();
                changeNum(this);
            })
        })
        //手动输入购买数量
        $(function () {
            $(document).on("blur", '.quantity-form input', function (e) {
                var changeQuantityNum = parseInt($(this).val());
                if(changeQuantityNum <= 0){
                    layer.alert('商品数量必须大于0', {icon:2});
                    $(this).val($(this).attr('value'));
                }else{
                    $(this).attr('value', changeQuantityNum);
                }
                initDecrement();
                changeNum(this);
            })
        })
        //更改购买数量对减购买数量按钮的操作
        function initDecrement(){
            $("input[id^='changeQuantity']").each(function(i,o){
                if($(o).val() == 1){
                    $(o).parent().find('.decrement').addClass('disable');
                }
                if($(o).val() > 1){
                    $(o).parent().find('.decrement').removeClass('disable');
                }
            })
        }
        //更改购物车请求事件
        function changeNum(obj){
            var input = $(obj).parents('.quantity-form').find('input');
            var cart_id = input.attr('id').replace('changeQuantity_','');
            var goods_num = input.attr('value');
            var cart = new CartItem(cart_id, goods_num, 1);
            $.ajax({
                type: "POST",
                url: "<?php echo U('Home/Cart/changeNum'); ?>",//+tab,
                dataType: 'json',
                data: {cart: cart},
                success: function (data) {
                    if(data.status == 1){
                        AsyncUpdateCart();
                    }else{
                        input.val(data.result.limit_num);
                        input.attr('value',data.result.limit_num);
                        layer.alert(data.msg,{icon:2});
                    }
                }
            });
        }
        //多选框点击事件
        $(function () {
            $(document).on("click", ".checkCart", function (e) {
                //选中一个
                if($(this).hasClass('checkCartItem')){
                    if($(this).is(':checked')){
                        $(this).prop('checked', 'checked').attr('checked', 'checked');
                    }else{
                        $(this).prop('checked', false).attr('checked', false);
                    }
                    ajax_order_price();
                }
                //选中全选多选框
                if($(this).hasClass('checkCartAll')){
                    if($(this).is(':checked')){
                        $(".checkCart").each(function(i,o){
                            $(this).prop('checked', 'checked').attr('checked', 'checked');
                        })
                    }else{
                        $(".checkCart").each(function(i,o){
                            $(this).prop('checked', false).attr('checked', false);
                        })
                    }
                    ajax_order_price();
                }
                initCheckBox();
                AsyncUpdateCart();
                ajax_order_price();
            })
        })
        /**
         * 检测选项框
         */
        function initCheckBox(){
            var checkBoxsFlag = true;
            $("input[name^='checkItem']").each(function(i,o){
                if ($(this).attr("checked") != 'checked') {
                    checkBoxsFlag = false;
                }
            })
            if(checkBoxsFlag == false){
                $('.checkCartAll').removeAttr('checked');
            }else{
                $('.checkCartAll').attr('checked', 'checked');
            }
        }

        //删除购物车商品
        $(function () {
            //删除购物车商品事件
            $(document).on("click", '.deleteGoods', function (e) {
                var cart_ids = new Array();
                cart_ids.push($(this).attr('data-cart-id'));
                $.ajax({
                    type : "POST",
                    url:"<?php echo U('Home/Cart/delete'); ?>",
                    dataType:'json',
                    data: {cart_ids: cart_ids},
                    success: function(data){
                        if(data.status == 1){
                            for (var i = 0; i < cart_ids.length; i++) {
                                $('#edge_' + cart_ids[i]).remove();
                            }
                            var inputCheckItemAll = $("input[name^='checkItem']");
                            if(inputCheckItemAll.length == 0){
                                $('#jhshop-cart').remove();
                                $('.shopcar_empty').show();
                            }
                        }else{
                            layer.msg(data.msg,{icon:2});
                        }
                        AsyncUpdateCart();
                    }
                });
            })
        })
        //删除购物车商品确定事件
        $(function () {
            $(document).on("click", '#removeGoods', function (e) {
                var cart_ids = new Array();
                //多个删除
                $("input[name^='checkItem']").each(function(i,o){
                    if($(this).is(':checked')){
                        cart_ids.push($(this).val());
                    }
                })
                $.ajax({
                    type : "POST",
                    url:"<?php echo U('Home/Cart/delete'); ?>",//,
                    dataType:'json',
                    data: {cart_ids: cart_ids},
                    success: function(data){
                        layer.msg(data.msg);
                        if(data.status == 1){
                            for (var i = 0; i < cart_ids.length; i++) {
                                $('#edge_' + cart_ids[i]).remove();
                            }
                            var inputCheckItemAll = $("input[name^='checkItem']");
                            if(inputCheckItemAll.length == 0){
                                $('#tpshop-cart').remove();
                                $('.shopcar_empty').show();
                            }
                        }else{
                            layer.msg(data.msg,{icon:2});
                        }
                        AsyncUpdateCart();
                    }
                });
            })
        })
        $('.gwc-qjs').click(function(){
            var user_id = '<?php echo $user_id; ?>';
            if(user_id == '0'){
                layer.open({
                    type: 2,
                    title: '<b>登陆</b>',
                    skin: 'layui-layer-rim',
                    shadeClose: true,
                    shade: 0.5,
                    area: ['490px', '460px'],
                    content: "<?php echo U('Home/User/login'); ?>",
                });
            }else{
                window.location.href = $(this).attr('data-url');
            }
        })

    
    /**
     * 新增修改收货地址
     * id 为零 则为新增, 否则是修改
     *  使用 公共的 layer 弹窗插件  参考官方手册 http://layer.layui.com/
     */
    function add_edit_address(id) {
        if (id > 0)
            var url = "/index.php?m=Home&c=User&a=edit_address&scene=1&call_back=call_back_fun&id=" + id; // 修改地址  '<?php echo U('Home/User/add_address',array('scene'=>'1','call_back'=>'call_back_fun','id'=>id)); ?>' //iframe的url /index.php/Home/User/add_address
        else
            var url = "/index.php?m=Home&c=User&a=add_address&scene=1&call_back=call_back_fun"; // 新增地址
        layer.open({
            type: 2,
            title: '添加收货地址',
            shadeClose: true,
            shade: 0.8,
            area: ['750px', '470px'],
            content: url,
        });
    }
    // 添加修改收货地址回调函数
    function call_back_fun(v) {
        layer.closeAll(); // 关闭窗口
        ajax_address(); // 刷新收货地址
    }

    // 删除收货地址
    function del_address(id) {
        layer.confirm('确定要删除吗？', {
                    btn: ['确定','取消'] //按钮
                }, function(index){
                    layer.close(index);
                    // 确定
                    $.ajax({
                        url: "/index.php?m=Home&c=User&a=del_address&id=" + id,
                        success: function (data) {
                            ajax_address(); // 刷新收货地址
                        }
                    });
                    layer.closeAll(); // 关闭窗口
                }, function(index){
                    layer.close(index);
                }
        );
    }

    /*
     * ajax 获取当前用户的收货地址列表
     */
    function ajax_address() {
        $.ajax({
            url: "<?php echo U('Home/Cart/ajaxAddress'); ?>",//+tab,
            success: function (data) {
                $("#ajax_address").html('');
                $("#ajax_address").append(data);
                if (data != '') {
                    // 有收货地址列表 再计算价钱
                    ajax_order_price(); // 计算订单价钱
                }else{
                    add_edit_address(0);
                }
            }
        });
    }

    // 切换收货地址
    function swidth_address(obj) {
        var province_id = $(obj).attr('data-province-id');
        var city_id = $(obj).attr('data-city-id');
        var district_id = $(obj).attr('data-district-id');
        $(".order-address-list").removeClass('address_current');
        $(obj).parent().parent().parent().parent().parent().addClass('address_current');
        ajax_order_price(); // 计算订单价格
    }

    // 获取订单价格
    function ajax_order_price() {
        $.ajax({
            type : "POST",
            url:"<?php echo U('Home/Cart/cart3'); ?>",//+tab,g
            data : $('#cart2_form').serialize()+"&act=order_price",// 你的formid
            dataType: "json",
            success: function(data){
                if(data.status != 1)
                {
                    //执行有误
                    layer.alert(data.msg, {icon: 2});
                    // 登录超时g
                    if(data.status == -100)
                        location.hrgef ="<?php echo U('Home/User/login'); ?>";
                    return false;
                }
               
                $("#postFee").text(data.result.postFee); // 物流费
                $("#shipping_price").text(data.result.postFee); // 物流费
                if(data.result.couponFee == null){
                    $("#couponFee").text(0);// 优惠券
                }else{
                    $("#couponFee").text(data.result.couponFee);// 优惠券
                }
                $("#coupon_price").text(data.result.couponFee);// 优惠券
                $("#balance").text(data.result.balance);// 余额
                $("#pointsFee").text(data.result.pointsFee);// 积分支付
                $("#payables").text(data.result.payables);// 应付
                $("#order_prom_amount").text(data.result.order_prom_amount);// 订单 优惠活动
                $(".all_tax_price").text(data.result.tax_price);// 订单 优惠活动
 
            }
        });
    }

    //删除选中产品  delete-checked-product
    $(".delete-checked-product").on("click",function(){
        layer.confirm('你确定删除选中的商品？', {
            btn: ['确认','取消']
        }, function(){
            layer.msg("删除成功")
        }, function(){

        });
        return false;
    });

    function floatMultiply(a,b){
        a = a * 1000;
        b = b * 1000;
        return a*b/10e5
    }

    $(function(){

        $(":radio").labelauty({
            label:false
        });
        $(":checkbox").labelauty({
            label:false
        });

        //数量计数器
        /*function cartCounter(){
            var counter = $(".count-number");
            counter.each(function(index){
                var price = parseFloat($(this).attr("data-price"));
                var _this = this;
                inputNumber(_this,200,function(val){

                    //可以在回调函数里面进行对应的算法操作
                    $(_this).closest("tr").find(".total-price").html("$"+floatMultiply(price,val));
                    $(_this).closest("tr").next("tr").find(".total-prices").html("￥"+floatMultiply(price,val));
                });
            })
        }
        cartCounter();*/
    });


    //联动全选
    function allCheck(){

        $(".check-classic").on("click",function(){
            if( $(this).prop("checked") ){
                $(this).closest(".cart-list-item").find(":checkbox").prop("checked",true);
            }else{
                $(this).closest(".cart-list-item").find(":checkbox").prop("checked",false);
            }
            $(":checkbox").labelauty({
                label:false
            });
            isAllChecked();
        });

        //allChecked
        $(".allChecked").on("click",function(){
            if( $(this).prop("checked") ){
                $(this).closest(".cart-list").find(":checkbox").prop("checked",true);
            }else{
                $(this).closest(".cart-list").find(":checkbox").prop("checked",false);
            }
            $(":checkbox").labelauty({
                label:false
            });
        });

        $(".single-check").on("click",function(){
            singleChecked(this);
            isAllChecked();
        });

        function isAllChecked(){
            var checkboxItem = $(".cart-list-cont").find(":checkbox");
            var flag = true;
            var allCheckBtn = $(".allChecked");
            checkboxItem.each(function(){
                flag = flag && $(this).prop("checked");
            });
            console.log(flag);
            allCheckBtn.prop("checked",flag);
            allCheckBtn.labelauty({
                label:false
            });
        }

        function singleChecked(obj){
            var items = $(obj).closest(".product-list").find(":checkbox");
            var flag = true;
            var classicCheckBtn = $(obj).closest(".cart-list-item").find(".check-classic");
            items.each(function(){
                flag = flag && $(this).prop("checked");
            });
            classicCheckBtn.prop("checked",flag);
            classicCheckBtn.labelauty({
                label:false
            });
        }

    }
    allCheck();

    // 提交订单
    ajax_return_status = 1;
    function submit_order()
    {
        if(ajax_return_status == 0)
            return false;
        ajax_return_status = 0;
        $.ajax({
            type : "POST",
            url:"<?php echo U('Home/Cart/cart3'); ?>",//+tab,
            data : $('#cart2_form').serialize()+"&act=submit_order",// 你的formid
            dataType: "json",
            success: function(data){
			
                if(data.status != '1')
                {
                    // alert(data.msg); //执行有误
                    layer.alert(data.msg, {icon: 2});
                    // 登录超时
                    if(data.status == -100)
                        location.href ="<?php echo U('Home/User/login'); ?>";

                    ajax_return_status = 1; // 上一次ajax 已经返回, 可以进行下一次 ajax请求

                    return false;
                }
                layer.msg('订单提交成功，正在跳转!', {
                    icon: 1,   // 成功图标
                    time: 2000 //2秒关闭（如果不配置，默认是3秒）
                }, function(){ // 关闭后执行的函数
                    location.href = "/index.php?m=Home&c=Cart&a=cart4&order_id="+data.result; // 跳转到结算页
                });
            }
        });
    }
</script>
    <script type="text/javascript">
        $(".editBasicMsg2").on("click",function(){
            layer.open({
                type: 2,
                title: '实名信息认证',
                shadeClose: true,
                shade: 0.8,
                area: ['500px', '450px'],
                content: "<?php echo U('user/editBasicMessage2'); ?>"
            });
        })
    </script>

</body>
</html>