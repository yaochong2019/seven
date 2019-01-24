<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:45:"./template/pc/jinghui/order/order_detail.html";i:1530239914;s:40:"./template/pc/jinghui/public/header.html";i:1542287950;s:42:"./template/pc/jinghui/public/left_nav.html";i:1542288714;s:40:"./template/pc/jinghui/public/footer.html";i:1534148398;}*/ ?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta name="renderer" content="webkit" />

    <meta name="keyword" content="" />

    <meta name="description" content="" />

    <title>净会</title>

    <link rel="stylesheet" href="__STATIC__/css/normalize.css">

    <link rel="stylesheet" href="__STATIC__/css/iconfont.css">

    <link rel="stylesheet" href="__STATIC__/vendor/swiper/css/swiper.min.css">

    <link rel="stylesheet" href="__STATIC__/css/main.css">

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

	<div class="member clearfix">

		<div class="member-right">

			<div class="right-cont">

				<div class="order-detail">

					<div class="order-basic-message">

						<div class="head">订单信息</div>

						<div class="cont clearfix">

							<div class="left">

                                <div class="left-item">

                                    <span class="t">收货人：</span><span class="c"><?php echo $order_info['consignee']; ?>&nbsp;&nbsp;|&nbsp;&nbsp; <?php echo $order_info['mobile']; ?></span>

                                </div>

                                <div class="left-item">

                                    <span class="t">收货地址：</span><span class="c"><?php echo $region_list[$order_info['province']]; ?>,<?php echo $region_list[$order_info['city']]; ?>,<?php echo $region_list[$order_info['district']]; ?>,<?php echo $order_info['address']; ?></span>

                                </div>

                                <div class="left-item">

                                    <span class="t">订单号：</span><span class="c"><?php echo $order_info['order_sn']; ?></span>

                                </div>

                                <div class="left-item">

                                    <span class="t">支付金额：</span><span class="c price">￥<?php echo $order_info['order_amount']; ?></span>

                                </div>

                                <div class="left-item">

                                    <span class="t">下单时间：</span><span class="c"><?php echo date('Y-m-d H:i:s',$order_info['add_time']); ?></span>

                                </div>

                            </div>

							<div class="right" style="margin-right: 60px;">

                                <?php if($order_info['order_prom_type'] == 4): ?>

                                    <div class="order-status"><span>订单类型：</span><span>预售订单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></div>

                                    <?php if($order_info['pre_sell_is_finished'] == 2): ?>

                                        <div class="order-status"><span>关闭原因：</span><span>商家取消活动，返还订金</span></div>

                                        <div class="order-status" style="font-size: 20px;"><b>当前状态：订单关闭</b></div>

                                    <?php endif; if($order_info['pre_sell_is_finished'] == 1): if(time() > $order_info['pre_sell_retainage_end']): ?>

                                           <div class="order-status"><span>关闭原因：</span><span>已过支付尾款时间</span></div>

                                            <div class="order-status" style="font-size: 20px;"><b>当前状态：订单关闭</b></div>

                                        <?php endif; endif; endif; if($order_info['pay_btn'] == 1): ?>

                                    <div class="order-status" style="font-size: 20px;"><b>当前状态：等待付款</b></div>

                                    <a class="btn btn-primary" href="<?php echo U('Home/Cart/cart4',array('order_id'=>$order_info[order_id])); ?>">立即付款</a>

                                    <?php else: ?>

                                    <div class="order-status" style="font-size: 20px;"><b>当前状态：<?php echo $order_info['order_status_desc']; ?></b></div>

                                    <a class="btn btn-primary" href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id'])); ?>">再次购买</a>

                                    <!--<a class="ddn3" href="">评价</a>-->

                                <?php endif; if($order_info['receive_btn'] == 1): ?>

                                    <a class="btn btn-primary" href="javascript:;" onclick="order_confirm(<?php echo $order_info['order_id']; ?>)">确认收货</a>

                                <?php endif; if($order_info['cancel_btn'] == 1): if($order_info[pay_status] == 0): ?>

                                        <a class="btn btn-primary" href="javascript:;" onclick="cancel_order(<?php echo $order_info['order_id']; ?>)">取消订单</a>

                                    <?php else: ?>

                                        <a class="btn btn-primary" href="javascript:void(0);" data-url="<?php echo U('Home/Order/refund_order',array('order_id'=>$order_info[order_id])); ?>" onClick="refund_order(this)" >取消订单</a>

                                    <?php endif; endif; if($order_info['order_prom_type'] == 4 AND $order_info['pay_status'] == 2 AND $order_info['pre_sell_is_finished'] == 1 AND (time() >= $order_info['pre_sell_retainage_start'] AND time() <= $order_info['pre_sell_retainage_end'])): ?>

                                    <a class="btn btn-primary" href="<?php echo U('/Home/Cart/cart4',array('order_id'=>$order_info[order_id])); ?>'">支付尾款</a>

                                <?php endif; ?>

                            </div>

						</div>

					</div>

					<div class="order-list">

						<div class="order-list-item">

							<table class="table">

								<thead>

								<tr>

									<th colspan="2">

										<div class="product-from">郑州保税仓</div>

									</th>

									<th width="120">

										单价

									</th>

									<th width="120">

										数量

									</th>

									<th width="100">

										总计

									</th>

								</tr>

								</thead>

                                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?>

								<tbody>

								<tr>

									<td width="120">

										<a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id'])); ?>"><img src="<?php echo goods_thum_images($goods['goods_id'],200,200); ?>" alt=""></a>

									</td>

									<td class="text-left">

										<div class="product-name"><?php echo $goods['goods_name']; ?></div>

										<div class="product-code">商品编号:<?php echo $goods['goods_sn']; ?></div>

										<div class="product-weight">重量：<?php if($goods['weight'] == 0): ?>0.00kg<?php else: ?><?php echo $goods['weight']; ?>g<?php endif; ?></div>

									</td>

									<td width="120">

										<div class="unit-price">

											<div class="old-price">￥<?php echo $goods['market_price']; ?></div>
											<?php if($order_info['group_id'] != ''): ?>
											<div class="now-price">￥<?php echo $order_info['goods_price']; ?></div>
											<?php else: ?>
											<div class="now-price">￥<?php echo $goods['member_goods_price']; ?></div>
											<?php endif; ?>
											

										</div>

									</td>

									<td width="120"><?php echo $goods['goods_num']; ?></td>

									<td width="100">

										<span class="total-price">￥<?php echo $order_info['order_amount']; ?></span>

									</td>

								</tr>

                                <tr>

                                    <td colspan="5" class="order-summary">

                                        <div>

                                            <p class="commodity-num">商品件数：<span><?php echo $goods['goods_num']; ?></span>件</p>

                                            <p class="commodity-price">商品税费（不含运费税）：￥0.00</p>

                                            <p class="commodity-price">商品应付总计：￥<?php echo $order_info['order_amount']; ?></p>

                                            <p class="commodity-total-price">总价（不含运费）：<span>￥<?php echo $order_info['total_amount']; ?></span></p>

                                        </div>

                                    </td>

                                </tr>

								</tbody>

                                <?php endforeach; endif; else: echo "" ;endif; ?>

							</table>

						</div>

					</div>

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




<script src="__STATIC__/vendor/jquery.min.js"></script>

<script src="__STATIC__/vendor/swiper/js/swiper.min.js"></script>

<script src="__STATIC__/vendor/layer/layer.js"></script>

<script src="__STATIC__/js/main.js"></script>

<script>



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



    //未支付取消订单

    function cancel_order(id){

        layer.confirm("确定取消订单?",{

            btn:['确定','取消']

        },function(){

            location.href = "/index.php?m=Home&c=Order&a=cancel_order&id="+id;

        }, function(tmp){

            layer.close(tmp);

        })

    }

    //已支付取消订单

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

    //确定收货

    function order_confirm(order_id){

        layer.confirm("你确定收到货了吗?",{

            btn:['确定','取消']

        },function(){

            $.ajax({

                type : 'post',

                url : '/index.php?m=Home&c=Order&a=order_confirm&order_id='+order_id,

                dataType : 'json',

                success : function(data){

                    if(data.status == 1){

                        showErrorMsg(data.msg);

                        window.location.href = data.url;

                    }else{

                        showErrorMsg(data.msg);

                    }

                },

                error : function(XMLHttpRequest, textStatus, errorThrown) {

                    showErrorMsg('网络失败，请刷新页面后重试');

                }

            })

        }, function(index){

            layer.close(index);

        });

    }





</script>

</body>

</html>