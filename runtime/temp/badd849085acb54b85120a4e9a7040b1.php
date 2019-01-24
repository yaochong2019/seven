<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:43:"./template/pc/jinghui/order/order_list.html";i:1543371096;s:40:"./template/pc/jinghui/public/header.html";i:1542287950;s:42:"./template/pc/jinghui/public/left_nav.html";i:1542288714;s:40:"./template/pc/jinghui/public/footer.html";i:1534148398;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="keyword" content="" />
    <meta name="description" content="" />
    <title>我的订单</title>
    <link rel="stylesheet" href="__STATIC__/css/normalize.css">
    <link rel="stylesheet" href="__STATIC__/css/iconfont.css">
    <link rel="stylesheet" href="__STATIC__/vendor/swiper/css/swiper.min.css">
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
    <style>
        .relat{
            position: relative;
            display: inline-block;
            width: 100%;
        }
        .nearl-zj,.hid-derei {
            display: none;
            opacity: 1;
            overflow: hidden;
            position: absolute;
            top: 35px;
            border: 1px solid #ccc;
            border-top: 0;
            width: 82px;
            background: white;
            z-index: 99;
        }
        .nearl-zj,.hid-derei>li{
            cursor: pointer;
            text-align: center;
        }
        .hid-derei{
            right:20px;
            width: 148px;
            margin-right: -20px;
        }
        .nearl-zj{
            right: 234px;
            width: 148px;
            margin-right: 9px;
        }
        .tip{
            font-size: 24px;
            position: relative;
            right: 0px;
            top: 2px;
            bottom:10px;
            color: #e21a1a;
        }
        .red a{color: #227dc1}
    </style>
</head>
<body>
<!--header-->
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
			<div class="title clearfix">
                <span>
                <a href="<?php echo U('Order/order_list'); ?>" class="<?php if(\think\Request::instance()->param('type') == ''): ?>active<?php endif; ?>">我的订单</a>
                </span>
                
                    <span class="<?php if(\think\Request::instance()->param('type') == 'WAITPAY'): ?>red<?php endif; ?>">
                    <a href="<?php echo U('Order/order_list',array('type'=>'WAITPAY')); ?>">待付款
                    <?php if($num['unnpaid'] != 0): ?><i class="tip"><?php echo $num['unnpaid']; ?></i><?php endif; ?>
                    </a>
                    </span>
                    <span class="<?php if(\think\Request::instance()->param('type') == 'WAITSEND'): ?>red<?php endif; ?>">
                    <a href="<?php echo U('Order/order_list',array('type'=>'WAITSEND')); ?>">待发货
                    <?php if(\think\Request::instance()->param('type') == 'WAITPAY'&&$num['unsent'] != 0): ?>
                    <i class="tip"><?php echo $num['unsent']; ?></i>
                    <?php endif; ?>
                    </a>
                    </span>
                    <span class="<?php if(\think\Request::instance()->param('type') == 'WAITRECEIVE'): ?>red<?php endif; ?>">
                    <a href="<?php echo U('Order/order_list',array('type'=>'WAITRECEIVE')); ?>">待收货
                    <?php if(\think\Request::instance()->param('type') == 'WAITSEND'&&$num['unresevied'] != 0): ?>
                    <i class="tip"><?php echo $num['unresevied']; ?></i>
                    <?php endif; ?>
                    </a>
                    </span>
                    <span>
                    <a href="<?php echo U('Order/comment'); ?>" <?php if($_controller == 'order' and $_action == 'comment'): ?>class="active" <?php endif; ?>>我的评价</a>
                    </span>
                    <span>
                    <a href="<?php echo U('User/goods_collect'); ?>" <?php if($_controller == 'user' and $_action == 'goods_collect'): ?>class="active" <?php endif; ?>>我的收藏</a>
                    </span>
                
            </div>
			<div class="right-cont relat">
            <form id="search_order" action="<?php echo U('Order/order_list'); ?>" method="get">
                <div class="common-search order-search">
                    <div class="search-left">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search_key" id="search_key" value="<?php echo \think\Request::instance()->param('search_key'); ?>"  placeholder="输入商品标题或者订单号进行搜索"/>
                            <!-- <i class="icon iconfont icon-search"></i> -->
                        </div>
                        <button type="submit" class="btn btn-primary">订单搜索</button>
                    </div>
                    <div class="search-right">
                        <span>下单时间：</span>
                        <input id="start_time" name="start_time" value="" type="hidden" style="width:150px;padding:7px 10px;border:1px solid #ccc;outline: none;"/>    
                        <input id="end_time" name="end_time" type="hidden" style="width:150px;padding:7px 10px;border:1px solid #ccc;outline: none;" />
                        <a class="form-control s6clik" style="cursor: pointer;">全部时间</a>
                        <ul class="nearl-zj">
                            <li><a onclick="time_for_one_month();">最近一个月</a></li>
                            <li><a onclick="time_for_three_month();">最近三个月</a></li>
                            <li><a onclick="time_for_one_year();">最近一年</a></li>
                        </ul>
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;订单状态：</span>
                        <a class="form-control s5clic" style="cursor: pointer;">全部订单</a>
                        <ul class="hid-derei">
                            <li><a href="<?php echo U('Order/order_list'); ?>">全部订单</a></li>
                            <li><a href="<?php echo U('Order/order_list',array('type'=>'WAITPAY')); ?>">待付款</a></li>
                            <li><a href="<?php echo U('Order/order_list',array('type'=>'WAITSEND')); ?>">待发货</a></li>
                            <li><a href="<?php echo U('Order/order_list',array('type'=>'WAITRECEIVE')); ?>">待收货</a></li>
                            <li><a href="<?php echo U('Order/comment',array('status'=>'0')); ?>">待评论</a></li>
                            <li><a href="<?php echo U('Order/order_list',array('type'=>'FINISH')); ?>">已完成</a></li>
                            <li><a href="<?php echo U('Order/order_list',array('type'=>'CANCEL')); ?>">已取消</a></li>
                            <!--<li><a href="">预售订单</a></li>-->
                        </ul>
                        
                        <!--<select class="form-control">
                            <option value="1"><a href="<?php echo U('Order/order_list',array('type'=>'WAITPAY')); ?>">待付款</a></option>
                            <option value="2"><a href="<?php echo U('Order/order_list',array('type'=>'WAITSEND')); ?>">待发货</a</option>
                            <option value="1"><a href="<?php echo U('Order/order_list',array('type'=>'WAITRECEIVE')); ?>">待收货</a></option>
                            <option value="2"><a href="<?php echo U('Order/comment',array('status'=>'0')); ?>">待评论</a></option>
                            <option value="2"><a href="<?php echo U('Order/order_list',array('type'=>'FINISH')); ?>">已完成</a></option>
                            <option value="2"><a href="<?php echo U('Order/order_list',array('type'=>'CANCEL')); ?>">已取消</a></option>
                        </select>-->
                    </div>
                </div>
            </form>
                <div class="order-list">
                    <?php if($lists == null): ?>
                    <div style="width: 100%;height: 300px;margin: 20px auto;text-align: center;line-height: 300px;">
                        暂时没有订单！
                    </div>
                    <?php else: ?>
                    <table class="table order-head">
                        <tr>
                            <td width="120"></td>
                            <td style="width:375px;" class="text-left">商品</td>
                            <td width="220">价格</td>
                            <td width="200">数量</td>
                            <td width="200">总价</td>
                            <td width="120">交易状态</td>
                            <td width="100">操作</td>
                        </tr>
                    </table>
                    <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;if($list['deleted'] == 0): ?>
                    <div class="order-list-item">
                        <table class="table">
                            <thead>
                            <tr>
                                <th width="120">
                                    <div class="product-from"><?php echo $store_list[$list[store_id]][store_name]; ?></div>
                                </th>
                                <th colspan="4" class="text-left">
                                    <div class="order-msg">
                                        订单号：<?php echo $list['order_sn']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        下单时间：<?php echo date('Y-m-d',$list['add_time']); ?>
                                    </div>
                                </th>
                                <th colspan="2" class="text-right">
                                <?php if($list['pay_btn'] == 1): ?>
                                    <a class="btn btn-primary" style="margin-right: 20px;" href="<?php echo U('Home/Cart/cart4',array('order_id'=>$list[order_id])); ?>"  target="_blank">立即支付</a>
                                <?php endif; if($list['order_button'][cancel_info] == 1): ?>
                                    <a class="consoorder" href="<?php echo U('Order/cancel_order_info',array('order_id'=>$list[order_id])); ?>">取消详情</a>
                                <?php endif; if($list['receive_btn'] == 1): ?>
                                    <a class="btn btn-primary" href="javascript:;" onclick="order_confirm(<?php echo $list['order_id']; ?>);">确认收货</a>
                                <?php endif; if($list['cancel_btn'] == 1): if($list[pay_status] == 0): ?>
                                        <a class="consoorder" href="javascript:void(0);" onClick="cancel_order(<?php echo $list['order_id']; ?>)" >取消订单</a>
                                    <?php else: ?>
                                        <a class="consoorder" href="javascript:void(0);" data-url="<?php echo U('Home/Order/refund_order',['order_id'=>$list['order_id']]); ?>" onClick="refund_order(this)" >取消订单</a>
                                    <?php endif; endif; ?>
                                </th>
                            </tr>
                            </thead>
                            <?php if(is_array($list['goods_list']) || $list['goods_list'] instanceof \think\Collection || $list['goods_list'] instanceof \think\Paginator): $k = 0; $__LIST__ = $list['goods_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($k % 2 );++$k;?>
                            <tbody>
                            <tr style="border: 1px solid #e6e6e6;">
                                <td width="120">
                                    <a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id'])); ?>"><img src="<?php echo goods_thum_images($goods['goods_id'],200,200); ?>" alt=""></a>
                                </td>
                                <td class="text-left">
                                    <div class="product-name"><?php echo $goods['goods_name']; ?></div>
                                    <div class="product-code">商品编号：<?php echo $goods['goods_sn']; ?></div>
                                    <div class="product-weight">重量：<?php if($goods['weight'] == 0): ?>0.00kg<?php else: ?><?php echo $goods['weight']; ?>g<?php endif; ?></div>
                                </td>
                                <td width="220">
                                    <div class="unit-price">
                                        <div class="old-price">￥<?php echo $goods['market_price']; ?></div>
										<?php if($list['group_id'] != ''): ?>
										<div class="now-price">￥<?php echo $list['goods_price']; ?></div>
										<?php else: ?>
										<div class="now-price">￥<?php echo $goods['member_goods_price']; ?></div>
										<?php endif; ?>
                                      
										
                                    </div>
                                </td>
                                <td width="220" style="font-size:18px;"><?php echo $goods['goods_num']; ?></td>
                                <td width="200">
                                    <div class="now-price">￥<?php echo $list['order_amount']; ?></div>
                                    <div class="freight">(含运费：￥<?php echo $list['shipping_price']; ?>)</div>
                                </td>
                                <td width="120">
                                    <div class="status">
                                        <p><span><?php echo $list['order_status_desc']; ?></span></p>
                                        <?php if($list[order_prom_type] == 5): ?>
                                            <p><a href="<?php echo U('Order/virtual_order',array('order_id'=>$list['order_id'])); ?>">订单详情</a></p>
                                        <?php else: ?>
                                            <p><a href="<?php echo U('Order/order_detail',array('id'=>$list['order_id'])); ?>">订单详情</a></p>
                                        <?php endif; if($list['order_status_code'] == WAITCCOMMENT): ?>
                                            <a class="publish-comment" odid="<?php echo $list['order_id']; ?>" recid="<?php echo $goods['rec_id']; ?>" href="javascript:;">发表评论</a>
                                            <!-- <?php if($goods[is_send] > 1): ?>
                                                <p><span>已申请退货</span></p>
                                            <?php else: if(($list[return_btn] == 1) and ($list[shipping_status] == 1)): ?>
                                            <p><a class="" href="<?php echo U('Home/Order/return_goods',array('rec_id'=>$goods['rec_id'])); ?>">申请退货</a></p>
                                            <?php endif; ?> -->
                                            <?php endif; endif; ?>
                                    </div>
                                </td>
                                <td width="100">
                                    <p><a href="javascript:void(0);" data-order-id="<?php echo $list['order_id']; ?>" onclick="del(this)"><i class="iconfont"></i> 删除</a></p>
                                    <?php if($list[pay_status] == 1 OR $list[order_status] != 0): ?>
                                    <p><a class="btn btn-primary" href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id'])); ?>">再次购买</a></p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            </tbody>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                    </div>
                    <?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                <?php echo $page; ?>
                </div>
			</div>
		</div>
	</div>
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
<script src="__STATIC__/js/main.js"></script>
<script>
    $(function(){
        $('.clearfix span').click(function(){
            $(this).addClass('red').siblings().removeClass('red');
        });
    });
    $('.s5clic').click(function(){
            $('.hid-derei').slideToggle(400);
            $(this).animate({opacity:"1"},100,function(){
                $(this).toggleClass('sxbb')
            })
        })
    $('.s6clik').click(function(){
            $('.nearl-zj').slideToggle(400);
            $(this).animate({opacity:"1"},100,function(){
                $(this).toggleClass('sxbb')
            })
        })
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

    //publish-comment
    $(".publish-comment").on("click",function(){
        var order_id = $(this).attr('odid');
        var rec_id = $(this).attr('recid');
        //alert(order_id+'---'+rec_id);
        layer.open({
            type: 2,
            title: '发表评论',
            shadeClose: true,
            shade: 0.8,
            area: ['730px', '545px'],
            content: "/index.php?m=Home&c=Order&a=comment_list&order_id="+order_id+"&rec_id="+rec_id,
        });
        return false;
    });
    $(function(){
    });

    //取消订单
    function cancel_order(id){
        layer.confirm('确定取消订单?', {
                    btn: ['确定','取消'] //按钮
                }, function(){
                    // 确定
                    location.href = "/index.php?m=Home&c=Order&a=cancel_order&id="+id;
                }, function(index){
                    layer.close(index);
                }
        );
    }

    /**订单查询时间 最近一个月，最近三个月，最近一年 s**/
            var date = new Date();
            var now_y = date.getFullYear();
            var now_m = date.getMonth()+1;
            function time_for_one_month() {
                var month = now_m;
                var year = now_y;
                var next_month = parseInt(now_m) + 1;
                if(next_month > 12){
                    year = year+1;
                    next_month = "0" + (next_month-12);
                }
                if (month < 10) {
                    month = "0" + month;
                }
                if (next_month < 10) {
                    next_month = "0" + next_month;
                }
                $('#start_time').val(now_y + "-" + month + "-" + "01");
                $('#end_time').val(year + "-" + next_month + "-" + "01");
                check_search_order()
            }
            
            function time_for_three_month() {
                var month = now_m;
                var next_month = parseInt(now_m) + 3;
                var year = now_y;
                if(next_month > 12){
                    year = year+1;
                    next_month = "0" + (next_month-12);
                }
                if (month < 10) {
                    month = "0" + month;
                }
                if (next_month < 10) {
                    next_month = "0" + next_month;
                }
                $('#start_time').val(now_y + "-" + month + "-" + "01");
                $('#end_time').val(year + "-" + next_month + "-" + "01");
                check_search_order()
            }
            
            function time_for_one_year() {
                $('#start_time').val(now_y + "-01-01");
                $('#end_time').val((parseInt(now_y)+1) + "-01-01");
                check_search_order()
            }
            /**订单查询时间 最近一个月，最近三个月，最近一年 e**/
            function check_search_order(){
                var start = $('#start_time').val();
                var end = $('#end_time').val();
                if(start == ''){
                    layer.alert('请选择正确的时间', {icon: 2});
                    return false;
                }
                if(end == ''){
                    layer.alert('请选择正确的时间', {icon: 2});
                    return false;
                }
                $('#search_order').submit();
            }
    
    //确定收货
    function order_confirm(order_id){
        layer.confirm("您确定收到货了吗?",{
            btn:['确定','取消']
        },function(){
            $.ajax({
                type : 'post',
                url : '/index.php?m=Home&c=Order&a=order_confirm&order_id='+order_id,
                dataType : 'json',
                success : function(data){
                    if(data.status == 1){
                        window.location.href = data.url;
                    }else{
                        layer.open({content:data.msg,time:2});
                        verify();
                    }
                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {
                    layer.alert('网络失败，请刷新页面后重试', {icon: 2});
                }
            })
        }, function(index){
            layer.close(index);
        });
    }

    // 删除操作
    function del(obj) {
        layer.confirm('确定要删除吗?', function(){
            var id=$(obj).data('order-id');
            $.ajax({
                type : "POST",
                url: "/index?m=Home&c=Order&a=del_order",
                data:{order_id:id},
                dataType:'json',
                async:false,
                success: function(data){
                    if(data.status ==1){
                        layer.alert(data.msg, {icon: 1});
                        //$('#'+id).remove();
                        location.reload();
                    }else{
                        layer.alert(data.msg, {icon: 2});
                    }
                },
                error:function(){
                    layer.alert('网络异常，请稍后重试',{icon: 2});
                }
            });
        });
    }

    function refund_order(obj){
        layer.open({
            type: 2,
            title: '<b>订单取消申请</b>',
            skin: 'layui-layer-rim',
            shadeClose: true,
            shade: 0.5,
            area: ['600px', '500px'],
            content: $(obj).attr('data-url'),
        });
    }
</script>
</body>
</html>