<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:37:"./template/pc/jinghui/cart/cart4.html";i:1542552620;s:40:"./template/pc/jinghui/public/header.html";i:1542287950;s:40:"./template/pc/jinghui/public/footer.html";i:1534148398;}*/ ?>
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

		<link rel="stylesheet" href="__STATIC__/vendor/jquery-labelauty/jquery-labelauty.css">
		<!--单选复选css-->

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

			<div class="pay" style="text-align:center;background: #e1f3e7">

				<div class="pay-title">订单提交成功！</div>

				<?php if($master_order_sn != ''): ?>

					<p class="text">

						<strong style="font-size: 15px;">订单号：</strong><em><?php echo $master_order_sn; ?></em>&nbsp;&nbsp;|&nbsp;&nbsp;<strong style="font-size: 15px;">付款金额：</strong><em><?php echo $sum_order_amount; ?></em>元

					</p>

					<?php else: ?>

					<p class="text">

						<strong style="font-size: 15px;">订单号：</strong><em><?php echo $order['order_sn']; ?></em>&nbsp;&nbsp;|&nbsp;&nbsp;<strong style="font-size: 15px;">付款金额：</strong><em><?php echo $order['order_amount']; ?></em>元

					</p>

				<?php endif; ?>

				<p class="title">请您在<em><?php echo $pay_date; ?></em>前完成支付，否则订单将自动取消</p>

			</div>

			<div class="pay">

				<div class="pay-title">快捷支付</div>

				<form name="cart4_form" id="cart4_form">

					<div class="pay-cont">

						<div class="pay-way">

							<?php if(is_array($paymentList) || $paymentList instanceof \think\Collection || $paymentList instanceof \think\Paginator): if( count($paymentList)==0 ) : echo "" ;else: foreach($paymentList as $k=>$v): ?>

								<div class="item checked">

									<div class="item-left">

										<input type="radio" checked class="labelauty-checked-image" value="pay_code=<?php echo $v['code']; ?>" name="pay_radio">

										<span class="labelauty-checked-image"></span>

										<div class="icon">

											<img src="/plugins/<?php echo $v['type']; ?>/<?php echo $v['code']; ?>/<?php echo $v['icon']; ?>" height="40" onClick="change_pay(this);" />

										</div>

									</div>

									<div class="item-right">

										支付<span>￥<?php echo $order['order_amount']; ?></span>

									</div>

								</div>

							<?php endforeach; endif; else: echo "" ;endif; ?>

						</div>

						<input type="hidden" name="order_id" id="order_id" value="<?php echo $order_id; ?>">

						<div class="pay-password-set pay-password-enter">

							<div class="head">支付密码：</div>

							<div class="form">

								<input class="form-control" type="password" name="paypwd" placeholder="请输入支付密码" autocomplete="off" />

							</div>

							<?php if(empty($user['paypwd'])): ?>

								<div class="head">请先<a href="<?php echo U('User/index'); ?>" style="color: #a05555;">设置支付密码</a></div>

								<?php else: ?>

								<div class="head"><a href="<?php echo U('User/index'); ?>" style="color: #a05555;">忘记支付密码?</a></div>

							<?php endif; ?>

						</div>

						<div class="pay-confirm">

							<a class="btn btn-primary" href="javascript:;" onclick="pay();">确认付款</a>

						</div>

				</form>

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




		<script src="__STATIC__/vendor/jquery-labelauty/jquery-labelauty.js"></script>
		<!--单选复选美化插件-->

		<script src="__STATIC__/vendor/swiper/js/swiper.min.js"></script>

		<script src="__STATIC__/vendor/layer/layer.js"></script>

		<script src="__STATIC__/js/main.js"></script>


		<script>
			$(document).ready(function() {

				$("input[name='pay_radio']").first().trigger('click');

				$(":radio").labelauty({
					label: false
				});

			});

			//二级菜单下的品牌滚动

			new Swiper('.food-sub-menu-scroll', {

				direction: 'vertical',

				autoHeight: true,

				navigation: {

					nextEl: '.food-brand-list-up',

					prevEl: '.food-brand-list-down'

				},

				observer: true,

				observeParents: true

			});



			// 切换支付方式

			function change_pay(obj) {

				$(obj).parent().siblings('input[name="pay_radio"]').trigger('click');

			}



			function pay() {

				var form = $('#cart4_form');
				var pay_radio = $("input[name='pay_radio']:checked").val();
				var order_id = $("input[name='order_id']").val();
				var paypwd = $("input[name='paypwd']").val();
				var data = form.serialize();

				$.post('<?php echo U("Payment/check_pas"); ?>', data, function(res) {
					console.log(res);
					if (res.status == 1) {
						location.href = ("/index.php?m=Home&c=Payment&a=getCode&pay_radio=" + pay_radio + "&order_id=" + order_id);
					} else {
						layer.msg('支付密码错误');
					}
				}, 'json')
			}
		</script>

	</body>

</html>
