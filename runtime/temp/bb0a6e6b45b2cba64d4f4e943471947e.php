<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:42:"./template/pc/jinghui/goods/goodsInfo.html";i:1542285404;s:40:"./template/pc/jinghui/public/header.html";i:1542287950;s:40:"./template/pc/jinghui/public/footer.html";i:1534148398;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="keyword" content="" />
    <meta name="description" content="" />
    <title>商品详情</title>
    <link rel="stylesheet" href="__STATIC__/css/normalize.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont.css">
    <link rel="stylesheet" href="__STATIC__/vendor/swiper/css/swiper.min.css"><!--滚动css-->
	<link rel="stylesheet"  href="__STATIC__/vendor/raty/jquery.raty.css"><!--评分css-->
	<link rel="stylesheet" href="__STATIC__/vendor/jquery-labelauty/jquery-labelauty.css"><!--单选复选css-->
	<link rel="stylesheet" href="__STATIC__/css/main.css">
    <link rel="stylesheet" href="__STATIC__/css/location.css" type="text/css"><!-- 收货地址，物流运费 -->
	<script src="__STATIC__/vendor/jquery.min.js"></script>
	<script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/pc_common.js"></script>
    <script src="__STATIC__/vendor/layer/layer.js"></script>
    <script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
    <script src="__STATIC__/js/mag.js"></script>
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
<script>
    $(function(){
        /*
         show  //正常状态的框
         bigshow   // 放大的框的盒子
         smallshow  //缩小版的框
         mask   //放大的区域（黑色遮罩）
         bigitem  //放大的框
         */
        var obj = new mag('.show', '.bigshow','.smallshow','.mask','.bigitem');
        obj.init();
    });
</script>
<style>
    ul,li{list-style: none;margin:0;padding:0;}
    .product-basic-message .img-list{margin-bottom: 30px;}
    .bg{width:920px;height: 540px;margin:0 auto;padding:20px;border:1px solid #E8E8E8;overflow: hidden;min-width: 900px;box-sizing: border-box;background: #fff;}
    .bg_left{width: 660px;height:auto;float: left}
    .bg_right{float: left;position: absolute;left: 48%;z-index: 99;background:#fff;margin-top: 0;}
    .show{width: 430px;height: 430px;margin-left:125px;margin-bottom: 10px;position: relative;cursor:move}
    .show img{width: 430px;height: 430px; display: none;}
    .show>img:nth-child(1){display: block;}
    .mask{width: 215px;height: 215px;background: #000;filter: Alpha(opacity=50);opacity:0.5;position: absolute;top: 0;left: 0;display: none;}
    .bigshow{width: 430px;height: 430px;overflow: hidden;margin-left: 10px;display: none;border:1px solid #E8E8E8;}
    .bigshow img{width: 860px;height: 860px;margin-right: 10px;}
    .smallshow{width: 100%;/*height: 70px;*/position: relative}
    .smallshow img{width:68%;height:92px;/*border:1px solid #e8e8e8;*/box-sizing: border-box;transition: all 0.5s}
    .smallshow>.middle_box{margin-left: 30px;margin-right: 30px;margin-top:25px;overflow: hidden;height: 100px;}
    .smallshow .middle{transition: all 0.5s;height: 70px;}
    .smallshow .middle>li{width: 150px;height:94px;text-align:center;float: left;cursor:pointer;padding:0 5px;}
    .smallshow>p{position: absolute;top:50%;width: 22px;height: 32px;margin-top: -16px;}
    .smallshow>.prev{left: 0;background: url(__STATIC__/images/hover-prev.png) no-repeat;transition: all 0.5s}
    .smallshow>.next{right: 0;background: url(__STATIC__/images/hover-next.png) no-repeat;transition: all 0.5s}
    .smallshow>.prev.prevnone{left: 0;background: url(__STATIC__/images/prev.png) no-repeat;cursor: not-allowed}
    .smallshow>.next.nextnone{right: 0;background: url(__STATIC__/images/next.png) no-repeat;cursor: not-allowed}
</style>
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
<!--locate-->
<div class="container location"> 
	<span>您的位置：</span>
	<?php if(is_array($navigate_goods) || $navigate_goods instanceof \think\Collection || $navigate_goods instanceof \think\Paginator): if( count($navigate_goods)==0 ) : echo "" ;else: foreach($navigate_goods as $k=>$v): ?>
	<a href="<?php echo U('/Home/Goods/goodsList',array('id'=>$k)); ?>"><?php echo $v; ?></a><i class="iconfont icon-more"></i>
	<?php endforeach; endif; else: echo "" ;endif; ?>
	<em><?php echo $goods['goods_name']; ?></em>
</div>
<!--product detail-->
<div class="container">
	<div class="product-detail">
		<div class="product-basic-message clearfix">
			<div class="img-list jqzoom">

				<div class="bg_left">
			        <div class="show">
			        	<!-- <?php if(is_array($goods_images_list) || $goods_images_list instanceof \think\Collection || $goods_images_list instanceof \think\Paginator): $k = 0; $__LIST__ = $goods_images_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?> -->
			            <img src="<?php echo $v['image_url']; ?>" alt="">
			            <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->
			            <div class="mask"></div>
			        </div>
			        <div class="smallshow">
			            <p class="prev prevnone"></p>
			            <div class="middle_box">
			                <ul class="middle">
			                	<!-- <?php if(is_array($goods_images_list) || $goods_images_list instanceof \think\Collection || $goods_images_list instanceof \think\Paginator): $k = 0; $__LIST__ = $goods_images_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?> -->
			                    <li><img src="<?php echo $v['image_url']; ?>" data-img="<?php echo $v['image_url']; ?>" alt=""></li>
			                    <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->
			                </ul>
			            </div>
			            <p class="next "></p>
			        </div>
			    </div>

			    <div class="bg_right small-img">
			        <div class="bigshow">
			            <div class="bigitem">
			            	<?php $image_url = isset($v['image_url'])?$v['image_url'] : '';
							if(!empty($image_url)){ ?><img src="<?php echo $v['image_url']; ?>" alt="">
								 <!-- <img src="<?php echo get_sub_images($v,$v[goods_id],660,440); ?>"> -->
							<?php } ?>
			               
			            </div>
			        </div>
			    </div>

			</div>
			<div class="product-params">
			<form id="buy_goods_form" name="buy_goods_form" method="post" action="">
            <input type="hidden" name="goods_id" value="<?php echo $goods['goods_id']; ?>"><!-- 商品id -->
            <input type="hidden" name="goods_prom_type" value="<?php echo $goods['prom_type']; ?>"/><!-- 活动类型 -->
            <input type="hidden" name="shop_price" value="<?php echo $goods['shop_price']; ?>"/><!-- 活动价格 -->
			<input type="hidden" class="zhuituan" name="zhuituan" value="0"/>
            <input type="hidden" name="store_count" id="huokucun" value="<?php echo $goods['store_count']; ?>"/><!-- 活动库存 -->
            <input type="hidden" name="market_price" value="<?php echo $goods['market_price']; ?>"/><!-- 商品原价 -->
            <input type="hidden" name="start_time" value="<?php echo $goods['start_time']; ?>"/><!-- 活动开始时间 -->
            <input type="hidden" name="end_time" value="<?php echo $goods['end_time']; ?>"/><!-- 活动结束时间 -->
            <input type="hidden" name="activity_title" value="<?php echo $goods['activity_title']; ?>"/><!-- 活动标题 -->
            <input type="hidden" name="prom_detail" value="<?php echo $goods['prom_detail']; ?>"/><!-- 促销活动的促销类型 -->
            <input type="hidden" name="activity_is_on" value=""/><!-- 活动是否正在进行中 -->
            <input type="hidden" name="item_id" value="<?php echo $item_id; ?>"/><!-- 商品规格id -->
            <input type="hidden" name="exchange_integral" value="<?php echo $goods['exchange_integral']; ?>"/><!-- 积分 -->
            <input type="hidden" name="point_rate" value="<?php echo $point_rate; ?>"/><!-- 积分兑换比 -->
            <input type="hidden" name="is_virtual" value="<?php echo $goods['is_virtual']; ?>"/><!-- 是否是虚拟商品 -->
            <input type="hidden" name="country_id" value="<?php echo $goods['country_cat_id_2']; ?>"/><!-- 区域馆id -->
            <input type="hidden" class="groupid" name="groupid" value="0"/><!-- pintuan id -->
				<div class="from-collect">
					<div class="from">
						<img src="<?php echo $country['image']; ?>" alt="<?php echo $country['name']; ?>">
						<p><?php echo $country['name']; ?> | <?php echo $goods_brand[0]['name']; ?></p>
					</div>
					<div class="collect">
						<a href="javascript:;" id="collectLink"><i class="iconfont"><img src="__STATIC__/images/love.png"></i>收藏</a>
					</div>
				</div>
				<div class="name-des">
					<div class="name"><?php echo $goods['goods_name']; ?></div>
					<div class="des"><?php echo $goods['goods_remark']; ?></div>
				</div>
				<div class="price-message">
					<div class="price-item">
						<div class="title">售价</div>
						<div class="text">
							<span class="current-price">￥<?php echo $goods['shop_price']; ?></span>
							<span class="discount"><?php echo round($goods['shop_price']/$goods['market_price'],3)*10; ?>折</span>
							<span class="reference-price">参考价：￥<?php echo $goods['market_price']; ?></span>
						</div>
					</div>
					<!-- 促销不参与拼团 -->
					<!-- <?php if($goods['is_cuxiao'] == null): ?> -->
					<div class="price-item">
						<div class="title">拼团价</div>
						<div class="text" >
							<input type="radio" name="group-price" group="2" value="<?php echo $goods['group_price2']; ?>" id="group-price2" checked="checked">
							<label for="group-price2"><a class="group-item">二人团 | 单价￥<?php echo $goods['group_price2']; ?></a></label>
							<input type="radio" name="group-price" group="3" value="<?php echo $goods['group_price3']; ?>" id="group-price3">
							<label for="group-price3"><a class="group-item">三人团 | 单价￥<?php echo $goods['group_price3']; ?></a></label>
						</div>
					</div>
					<!-- <?php endif; ?> -->
					<!-- <?php if($price_ladder != null): ?> -->
					<div class="price-item">
						<div class="title">活动</div>
						<div class="text">
						<span class="full-minus">满减</span>
						<!-- <?php if(is_array($price_ladder) || $price_ladder instanceof \think\Collection || $price_ladder instanceof \think\Paginator): $i = 0; $__LIST__ = $price_ladder;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> -->
						<span class="full-price" style="color: #e21a1a;">满<?php echo $vo['amount']; ?>减<?php echo $vo['price']; ?></span>
						<!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->
						</div>
					</div>
					<!--<?php endif; ?>-->
				</div>
				<div class="price-message other-message">
					<div class="price-item other-item" style="margin-top:-6px;">
						<div class="title">税费</div>
						<div class="text">
							<span>预估￥<?php echo $goods['tax_price']; ?>，实际税费请以提交订单为准</span>
							<span class="rule" data-cate="1" style="margin-left: 30px;">税费收取规则</span>
						</div>
					</div>
                	<div class="price-item">
                     <div class="title">运费</div>
                        <!-- 收货地址，物流运费 -start-->
                        <ul class="list1" style="float: left;width: 500px;height: 40px;">
                            <i class="go">至</i>
                            <li class="summary-stock">
                                <div class="dd" style="width: 330px;">
                                    <div class="store-selector">
                                        <div class="tel" style="width: 150px;"><div></div><b></b></div>
                                        <div onclick="$(this).parent().removeClass('hover')" class="close"></div>
                                    </div>
                                    <span id="dispatching_msg" <?php if($dispatching[status] != 1): ?>style="display: none;"<?php endif; ?>></span>
                                    <select id="dispatching_select" <?php if(empty($dispatching[result]) || (($dispatching[result] instanceof \think\Collection || $dispatching[result] instanceof \think\Paginator ) && $dispatching[result]->isEmpty())): ?>style="display: none;"<?php endif; ?>>
                                    <?php if(is_array($dispatching[result]) || $dispatching[result] instanceof \think\Collection || $dispatching[result] instanceof \think\Paginator): $i = 0; $__LIST__ = $dispatching[result];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$patching): $mod = ($i % 2 );++$i;?>
                                        <option><?php echo $patching['shipping_name']; ?> ￥<?php echo $patching['freight']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </li>
                            <span style="margin-left:28px;" class="rule" data-cate="2">满88元包邮</span>
                        </ul>
                        <script src="__STATIC__/js/location.js"></script>
                        <!-- 收货地址，物流运费 -end-->
                    </div>
					<div class="price-item other-item" style="margin-top:0;">
						<div class="title">服务</div>
						<div class="text">
							<span>本商品由<a style="color: blue"><?php echo $tpshop_config['shop_info_store_name']; ?></a>发货</span>
						</div>
					</div>
					<!-- 规格 start [[-->
	                <?php if(is_array($filter_spec) || $filter_spec instanceof \think\Collection || $filter_spec instanceof \think\Paginator): if( count($filter_spec)==0 ) : echo "" ;else: foreach($filter_spec as $k=>$v): ?>
	                    <div class="price-item spec_goods_price_div">
	                           <div class="title"><?php echo $k; ?>:</div>
	                            <div class="title radio" id="goods_spec" style="width: 600px;">
	                                <?php if(is_array($v) || $v instanceof \think\Collection || $v instanceof \think\Paginator): if( count($v)==0 ) : echo "" ;else: foreach($v as $k2=>$v2): ?>
	                                    <input type="radio" text id="goods_spec_<?php echo $v2[item_id]; ?>" name="goods_spec_<?php echo $k; ?>" value="<?php echo $v2[item_id]; ?>"/>
	                                    <!--<a id="goods_spec_a_<?php echo $v2[item_id]; ?>" onclick="switch_zooming('<?php echo $v2[src]; ?>'); select_filter(this);" <?php if(!empty($v2['src'])): ?>onclick="$('#zoomimg').attr('src','<?php echo $v2[src]; ?>');"<?php endif; ?>><?php echo $v2[item]; ?></a>-->
	                                    <?php if($v2[src] != ''): ?>
	                                        <label for="goods_spec_<?php echo $v2[item_id]; ?>"><a id="goods_spec_a_<?php echo $v2[item_id]; ?>" onclick="switch_zooming('<?php echo $v2[src]; ?>');select_filter(this); $('#zoomimg').attr('src','<?php echo $v2[src]; ?>')" style="border: 1px solid #ccc">
	                                            <img src="<?php echo $v2[src]; ?>" style="width: 40px;height: 40px;"/>
	                                            <span class="dis_alintro"><?php echo $v2[item]; ?></span>
	                                        </a></label>
	                                        <?php else: ?>
	                                        <label for="goods_spec_<?php echo $v2[item_id]; ?>"><a id="goods_spec_a_<?php echo $v2[item_id]; ?>" onclick="switch_zooming('<?php echo $v2[src]; ?>'); select_filter(this);" style="border: 1px solid #ccc"><?php echo $v2[item]; ?></a></label>
	                                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
	                            </div>
	                    </div>
	                <?php endforeach; endif; else: echo "" ;endif; ?>
					<div class="price-item other-item">
						<div class="title">数量</div>
						<div class="text">
							<div class="product-num count-number">
								<a href="javascript:;" class="minus-btn"><i class="iconfont">-</i></a>
								<input type="text" value="1" class="number cnt" id="kucun" name="goods_num" />
								<a href="javascript:;" class="plus-btn"><i class="iconfont">+</i></a>
							</div>
							<span>库存：<?php echo $goods['store_count']; ?></span>
						</div>
					</div>
					<div class="price-item other-item">
						<div class="title">说明</div>
						<div class="text">
							<span style="color:#828282;"><?php echo $goods['declare']; ?></span>
						</div>
					</div>
				</div>
				<div class="btn-group">
					<?php if($goods[is_virtual] == 1): ?>
						<a href="javascript:;" class="aloneBuyBtn" onclick="virtual_buy();">单独购买</a>
					<?php elseif($goods['exchange_integral'] > 0): ?>
						<a id="join_cart_now" href="javascript:;" class="aloneBuyBtn" onclick="buyIntegralGoods(<?php echo $goods['goods_id']; ?>,1);">积分兑换</a>
					<?php else: ?>
					<a href="javascript:;" onclick="AjaxAddCart(<?php echo $goods['goods_id']; ?>,1);" class="addCartBtn active">加入购物车</a>
					<!-- <?php if($goods['is_cuxiao'] == null): ?> -->
					<a href="javascript:;" class="groupBuyBtn">我要拼团</a>
					<!-- <?php endif; ?> -->
					<a href="javascript:;" class="aloneBuyBtn" onclick="buy_now();">单独购买</a>
					<?php endif; ?>
				</div>
				<div class="evaluation-cont">
					<div class="evaluation"></div>
					<div class="evaluation-percentage"></div>
					<div class="evaluation-num"><i><?php echo $commentStatistics['c0']; ?>人</i>评价</div>
				</div>
			</div>

		</div>
		<div class="discount-package" style="margin-top:20px;">
			<?php if($goods[is_pack_price] == 1): ?>
			<div class="title">优惠套餐</div>
		
			<div class="list-cont">
				<div class="discount-list">
					<div class="swiper-wrapper">
						<div class="swiper-slide list-item first-list-item">
								<div class="top">
									<div class="label" style="display: none;"><input type="checkbox" checked="checked"/></div>
									<div class="img" style="padding-right:0;"><img width="80" src="<?php echo goods_thum_images($goods['goods_id'],200,200); ?>" alt=""></div>
								</div>
								<div class="name"><?php echo $goods['goods_name']; ?></div>
								<div class="price"><?php echo $goods['shop_price']; ?></div>
						</div>
					<?php if(is_array($pack) || $pack instanceof \think\Collection || $pack instanceof \think\Paginator): $i = 0; $__LIST__ = $pack;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<div class="swiper-slide list-item">
							<div class="top">
								<div class="label tcid_<?php echo $vo['goods_id']; ?>" pack_price="<?php echo $vo['pack_price']; ?>" shop_price="<?php echo $goods['shop_price']; ?>"><input type="checkbox" name="pack[<?php echo $vo['goods_id']; ?>]" class="checkCart checkCartItem" value="<?php echo $vo['goods_id']; ?>" pgoods_id="<?php echo $vo['goods_id']; ?>"/></div>
								<div class="img"><img width="80" src="<?php echo goods_thum_images($vo[goods_id],200,200); ?>" alt=""></div>
							</div>
							<div class="name"><?php echo $vo[goods_name]; ?></div>
							<div class="price"><?php echo $vo[pack_price]; ?></div>
						</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>

					</div>
					<div class="discount-list-scroll-prev"><i class="iconfont icon-back"></i></div>
					<div class="discount-list-scroll-next"><i class="iconfont icon-more"></i></div>
				</div>
				<div class="discount-total-price">
					<div class="now-price">
						套餐价：￥<span class="taocanjia"><?php echo $goods['shop_price']; ?></span>
					</div>
					<div class="alone-price">
						价格：￥<span class="taocanzongjia"><?php echo $goods['market_price']; ?></span>
					</div>
					<div class="btn-group">
						<a href="javascript:taocan_buy_now();" style="background: #227dbb;color: #fff;">立即购买</a>
						<!-- <a class="addCartBtn active" onclick="AjaxAddCart(<?php echo $goods['goods_id']; ?>,1);" href="javascript:;" >加入购物车</a> -->
					</div>
				</div>
			</div>

			<?php endif; ?>
		</form>
		</div>
		<div class="product-detail-tab">
			<div class="tab-title">
				<a href="javascript:;" class="active">商品详情</a>
				<a href="javascript:;">用户评价</a>
			</div>
			<div class="product-tab-cont" style="width: 100%;">
				<div class="tab-item" style="width: 100%;">
					<div style="width: 100%;">
                        <p><span>商品名称：</span><span><?php echo $goods['goods_name']; ?></span></p>
                        <div>
                            <ul>
                                <!--<li><span>品牌：</span><span><?php echo $goods['brand_name']; ?></span></li>-->
                                <li><span>货号：</span><span><?php echo $goods['goods_sn']; ?></span></li>
                                <?php if(is_array($goods_attr_list) || $goods_attr_list instanceof \think\Collection || $goods_attr_list instanceof \think\Paginator): if( count($goods_attr_list)==0 ) : echo "" ;else: foreach($goods_attr_list as $k=>$v): ?>
                                    <li><span><?php echo $goods_attribute[$v[attr_id]]; ?>：</span><span><?php echo $v[attr_value]; ?></span></li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div>
					<?php echo htmlspecialchars_decode($goods['goods_content']); ?>
					</div>
				</div>
				<div class="tab-item cte-deta" style="width: 100%;">
					<div class="evaluation-cont" style="position: relative;">
						<div class="evaluation"></div>
						<div class="evaluation-percentage"><i></i></div>
						<div id="function-hints" style="font-size: 20px;color:#e21a1a; position: absolute;left:165px;top:-2px;font-weight: bold;"></div>
						<!-- <div class="evaluation-num"><i><?php echo $commentStatistics['c0']; ?>人</i>评价</div> -->
					</div>
					<ul class="view-comment-condition">
						<li class="item red" data-t="1">
							<label><input checked type="radio" name="content" value="1">
							<span>全部</span></label>
						</li>
						<li class="item" data-t="5">
							<label><input type="radio" name="content" value="5">
							<span>晒图（<?php echo $commentStatistics['c4']; ?>）</span></label>
						</li>
						<li class="item" data-t="3">
							<label><input type="radio" name="content" value="3">
							<span>追加评论（<?php echo $commentStatistics['c7']; ?>）</span></label>
						</li>
						<li class="item last-item" data-t="4">
							<label><input type="radio" name="content" >
							<span>有内容的评论</span></label>
						</li>
					</ul>
					<div class="comment-list" id="ajax_comment_return"></div>
				</div>
			</div>
		</div>
	</div>
</div>
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



<script src="__STATIC__/vendor/swiper/js/swiper.min.js"></script><!--滚动插件-->
<script src="__STATIC__/vendor/raty/jquery.raty.js"></script><!--评分插件-->
<script src="__STATIC__/vendor/jquery-labelauty/jquery-labelauty.js"></script><!--单选复选美化插件-->
<script src="__STATIC__/js/main.js"></script>
<script>
var commentType = 1;// 默认评论类型
var spec_goods_price = <?php echo (isset($spec_goods_price) && ($spec_goods_price !== '')?$spec_goods_price:'null'); ?>;//规格库存价格
	$(document).ready(function () {
        initSpec();
        initBuy();
    });
    /**
     * 购买初始化
     */
    function initBuy(){
        var is_virtual = $("input[name='is_virtual']").val();
        var buy_url;
        if(is_virtual == 1){
            buy_url = "<?php echo U('Home/Virtual/buy_virtual'); ?>";
        }else{
            buy_url = "<?php echo U('Home/Cart/cart2',['action'=>'buy_now']); ?>";
        }
        $('#buy_goods_form').attr('action',buy_url);

    }
	/**
     * 立即购买
     */
    var groupid = 0;
    function buy_now(){
       if(getCookie('user_id') == ''){
        	layer.msg("您还未登录！");
			location.href="<?php echo U('User/login'); ?>";
			return;
		}
        var store_count = $("input[name='store_count']").val();// 商品原始库存
        var buyNum = parseInt($("input[name='goods_num']").val());
        if (buyNum <= store_count) {
        	$('.groupid').val(groupid);
            $('#buy_goods_form').submit();
        } else {
            layer.msg('购买数量超过此商品购买上限', {icon: 3});
        }
    }
    /**
     * 立即购买
     */
    function taocan_buy_now(){
       if(getCookie('user_id') == ''){
        	layer.msg("您还未登录！");
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
	$(function() {
	        ajaxComment(1,1);
	        // 好评差评 切换
	        $('.cte-deta ul li').click(function(){
	            $(this).addClass('red').siblings().removeClass('red');
	            commentType = $(this).data('t');// 评价类型   好评 中评  差评
	            ajaxComment(commentType,1);
	        })
	    });
	/***用ajax分页显示评论**/
    function ajaxComment(commentType,page){
        $.ajax({
            type : "GET",
            url:"/index.php?m=Home&c=goods&a=ajaxComment&goods_id=<?php echo $goods['goods_id']; ?>&commentType="+commentType+"&p="+page,//+tab,
            success: function(data){
                $("#ajax_comment_return").html('').append(data);
            }
        });
    }

    /***收藏商品**/
    $('#collectLink').click(function(){
        if(getCookie('user_id') == ''){
            layer.msg('请先登录！', {icon: 1});
        }else{
            $.ajax({
                type:'post',
                dataType:'json',
                data:{goods_id:$('input[name="goods_id"]').val()},
                url:"<?php echo U('Home/Goods/collect_goods'); ?>",
                success:function(res){
                    if(res.status == 1){
                        layer.msg('成功添加至收藏夹', {icon: 1});
                    }else{
                        layer.msg(res.msg, {icon: 3});
                    }
                }
            });
        }
    });
    
	//有规格id的时候，解析规格id选中规格
    function initSpec(){
        var item_id = $("input[name='item_id']").val();
        $.each(spec_goods_price,function(i, o){
            if(o.item_id == item_id){
                var spec_key_arr = o.key.split("_");
                $.each(spec_key_arr,function(index,item){
                    var spec_radio = $("#goods_spec_"+item);
                    var goods_spec_a = $("#goods_spec_a_"+item);
                    spec_radio.attr("checked","checked");
                })
            }
        })
        if(item_id > 0 && !$.isEmptyObject(spec_goods_price)){
            var item_arr = [];
            $.each(spec_goods_price,function(i, o){
                item_arr.push(o.item_id);
            })
            //规格id不存在商品里
            if($.inArray(parseInt(item_id), item_arr) < 0){
                initFirstSpec();
            }else{
                $.each(spec_goods_price,function(i, o){
                    if(o.item_id == item_id){
                        var spec_key_arr = o.key.split("_");
                        $.each(spec_key_arr,function(index,item){
                            var spec_radio = $("#goods_spec_"+item);
                            var goods_spec_a = $("#goods_spec_a_"+item);
                            spec_radio.attr("checked","checked");
                        })
                    }
                })
            }
        }else{
            initFirstSpec();
        }
    }	

	//默认让每种规格第一个选中
    function initFirstSpec(){
        $('.spec_goods_price_div').each(function (i, o) {
            var firstSpecRadio = $(this).find("input[type='radio']").eq(0);
            firstSpecRadio.attr('checked','checked').prop('checked','checked');
        })
    }
    
    /**
     * 切换规格
     */
    function select_filter(obj)
    {
        //$(obj).addClass('red').siblings('a').removeClass('red');
        $(obj).siblings('input').removeAttr('checked');
        $(obj).prev('input').attr('checked','checked').prop('checked','checked');
    }

    /**
     * 切换图片
     */
    function switch_zooming(img)
    {
        if(img != ''){
            $('#zoomimg').attr('jqimg', img).attr('src', img);
        }
    }

	//产品图片的滚动
    function bigImgSlide(){
        var smallImgItem = $(".small-img .item");
        var currentIndex = 0;
        var bigImgScroll = new Swiper('.big-img',{
            on:{
                slideChangeTransitionEnd: function(){
                    currentIndex = this.activeIndex;
                    change(currentIndex)
                }
            }
        });
        change(currentIndex);

        function change(n){
            smallImgItem.removeClass("active");
            smallImgItem.eq(n).addClass("active");
		}

        smallImgItem.each(function(index,item){
            $(this).on("click",function(){
                bigImgScroll.slideTo(index, 600, false);
                currentIndex = index;
                change(currentIndex);
			})
		})

	}
    bigImgSlide();


    //规则显示
    function showRule(){
		var textArr = [
		    "<?php echo $goods['tax_declare']; ?>",
		    "<?php echo $goods['yunfei_declare']; ?>",
		];

		var rules = $(".rule");
		rules.hover(function(){
		    var _this = this;
		    var tipsCon = parseInt($(_this).attr("data-cate")) === 1?textArr[0]:textArr[1];

            layer.tips(tipsCon, $(_this), {
                tips: [1, '#185ba1'],
                time: 0
            });
		},function(){
		    layer.closeAll();
		})
	}
    showRule();

	//数量计数器
    inputNumber(".product-num",'<?php echo $goods['store_count']; ?>');
    var score = '<?php echo $commentStatistics['rate1']; ?>'/10/2;
    var scores = '<?php echo $commentStatistics['rate1']; ?>'+'%';
    $('.evaluation-percentage').html(scores);
    //评价
    $('.evaluation').raty({
        readOnly: true,
        targetType: 'hint',//类型选择，number是数字值，hint，是设置的数组值
		score:score,
        hints:['差评','中评','中评','好评','好评'],
        target:'#function-hints',
        path:'__STATIC__/vendor/raty/images/',
        targetKeep: true
    });
    //优惠套餐的滚动
    new Swiper('.discount-list', {
        slidesPerView: 4,
        spaceBetween: 10,
        navigation: {
            nextEl: '.discount-list-scroll-next',
            prevEl: '.discount-list-scroll-prev'
        }
    });

    $(function(){

        $(":checkbox").labelauty({
	        label:false
        });
        $(":radio").labelauty({
            label:false
        });

        //ajax_order_price();

        initTab(".product-detail-tab");

        userCommentLevel();

    });

    //套餐计算------------------------------------------------------------------------
    $(function(){
    	$(document).on("click", ".checkCart", function (e) {
    		//选中一个
                if($(this).hasClass('checkCartItem')){
                    if($(this).is(':checked')){
                        $(this).prop('checked', 'checked').attr('checked', 'checked');
                        checkbox_taocan($(this).attr('pgoods_id'),0);
                    }else{
                        $(this).prop('checked', false).attr('checked', false);
                        checkbox_taocan($(this).attr('pgoods_id'),1);
                    }
                    
                    //ajax_order_price();
                }
            })
    });

    // 获取订单价格
    function ajax_order_price(){
        	$.ajax({
            type : "POST",
            url:"<?php echo U('Home/Goods/pack'); ?>",//+tab,g
            data : $('#buy_goods_form').serialize()+"&act=order_price",// 你的formid
            dataType: "json",
            success: function(data){
                if(data.status != 1)
                {
                    //执行有误
                    //layer.alert(data.msg, {icon: 2});
                    // 登录超时g
                    if(data.status == -100)
                    	layer.msg("您还未登录！");
                        location.hrgef ="<?php echo U('Home/User/login'); ?>";
                    return false;
                }
            }    
        });

    }
    //-----------------------------------------------------------------------------------
	//用户评价评分
	function userCommentLevel(){

	    var commentItem = $(".comment-level");
        commentItem.each(function(index){
            var level = $(this).attr("data-level");
            $(this).raty({
                readOnly: true,
                score: level,
                hints:['糟糕','差劲','正常','良好','华丽'],
                path: '__STATIC__/vendor/raty/images/'
            });
        })

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
        	if(getCookie('user_id') == ''){
        		layer.msg("您还未登录！");
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
                	/*}
                	else if(res.status == 1){
                		groupid = res.msg;
                		buy_now();*/
                	}else{
                    	layer.open({
			                type: 2,
			                title: '我要拼团',
			                shadeClose: true,
			                shade: 0.8,
			                area: ['1200px', '485px'],
			                content: "/index.php?m=Home&c=activity&a=group_list&id=<?php echo $goods['goods_id']; ?>"
			            });
                	}
                }
            });  
        });
	}
groupBuy();



function checkbox_taocan(g_id,type) {
	var ck_pack_price = $('.tcid_'+g_id).attr('pack_price');
	
	var ck_shop_price = $('.tcid_'+g_id).attr('shop_price');
	
	var ischeck  = $('.tcid_'+g_id+' input').attr('checked');
	var taocanjia = $('.taocanjia').html();
	
	var taocanzongjia = $('.taocanzongjia').html();
	

	if(type == 1){
		taocanjia = taocanjia -ck_pack_price;
		taocanzongjia = taocanzongjia -ck_shop_price;
	}else{

		taocanjia = taocanjia*1 + ck_pack_price*1;

		
		taocanzongjia = taocanzongjia*1+ck_shop_price*1;
	}
	$('.taocanjia').html(taocanjia);
	$('.taocanzongjia').html(taocanzongjia);
	
}
</script>
</body>
</html>