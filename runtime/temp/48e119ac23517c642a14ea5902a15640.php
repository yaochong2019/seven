<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:40:"./template/pc/jinghui/content/index.html";i:1539848500;s:40:"./template/pc/jinghui/public/header.html";i:1542287950;s:40:"./template/pc/jinghui/public/footer.html";i:1534148398;}*/ ?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="renderer" content="webkit" />
		<meta name="keyword" content="" />
		<meta name="description" content="" />
		<title>联系我们</title>
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

		<style>
			.advantage {
				clear: both;
			}
			
			.about form {
				width: 700px;
				max-width: 100%;
				margin: 0 auto;
				padding-top: 60px;
			}
			
			.about input {
				line-height: 2.2;
				font-size: 1rem;
			}
			
			.about .am-form-group {
				overflow: hidden;
				margin-bottom: 15px;
			}
			
			.about .am-form-group label {
				float: left;
				width: 25%;
				line-height: 40px;
				text-align: right;
				margin-right: 5%;
			}
			
			.about .am-form-group .am-radio span {
				padding-left: 20px;
			}
			
			.about .am-form-group label>i {
				color: #ff0000;
			}
			
			.about .am-form-group input {
				width: 55%;
				float: left;
			}
			
			.about .am-form-group textarea {
				width: 70%;
				height: 120px;
			}
			
			.about .am-form-group .am-btn {
				width: 170px;
				height: 50px;
				font-size: 16px;
				background: #1d6cae;
				border: 0;
				border-radius: 2px;
				margin-top: 20px;
				transition: all .3s ease-in;
				color: #eee;
				padding: .5em 1em;
				line-height: 1.2;
				float: left;
			}
			
			.about .am-form-group .am-btn:hover {
				opacity: .8;
				border-color: #247cbb;
			}
			
			.about .am-form-group #doc-vld-code {
				width: 17%;
			}
			
			.content {
				padding-top: 60px;
				text-align: left;
				margin-left: 30%;
			}
			
			.content .lianxi {
				position: relative;
				left: 10%;
				width: 60%;
			}
			.contsele select{
				width: 50%;
				height: 30px;
				margin-top: 5px;
			}
			.about .xx{
				display: none;
			}
		</style>
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
		<!--content-->
		<div class="about">
			<form class="am-form" method="POST" id="am-form" action="<?php echo U('Home/Content/mailer'); ?>">
				<input type="hidden" name="addtime" value="" id="time">
				<div class="form-item" style="text-align:center;margin-top:0px;color:red;">
                               <span class="tips"></span>
                            </div>
				<div class="am-form-group contsele">
					<label for="doc-vld-name"><i class="xx">*</i> 联络事宜：</label> 
					<select name="lianluo">
						<option value="kefu">客服</option>
						<option value="other">其他事项</option>
					</select>
				</div>
				
				<div class="am-form-group">
					<label for="doc-vld-name"><i class="xx x1">*</i> 您的姓名：</label> 
					<input type="text" name="username" id="doc-vld-name" class="am-form-field rr r1">
				</div>
				<div class="am-form-group">
					<label for="doc-vld-phone"><i class="xx x2">*</i> 您的电话：</label> 
					<input type="text" name="phone" id="doc-vld-phone" class="am-form-field rr r2">
				</div>
				<div class="am-form-group">
					<label for="doc-vld-email-2"><i class="xx x21">*</i> 电子邮箱：</label> 
					<input type="email" name="email" id="doc-vld-email-2 rr r3">
				</div>
				<div class="am-form-group">
					<label for="doc-vld-phone"><i class="xx x3">*</i> 留言内容：</label> 
					<textarea type="text" name="content" id="doc-vld-content" class="am-form-field rr r4"></textarea>
				</div>
				<div class="am-form-group">
					<label for="doc-vld-submit" style="height: 1px;"></label>
					<input class="am-btn am-btn-secondary" type="submit" value="发送" id="am-btn"></input>
				</div>
			</form>
		</div>

		<div class="content">
			<div class="lianxi">
				<tr>
					<td>电话：</td>
					<td>0574-88259190</td>
				</tr><br />
				<tr>
					<td>电子邮箱：</td>
					<td>contact@pure-seven.com</td>
				</tr><br />
				<tr>
					<td>公司邮寄地址：</td>
					<td>浙江宁波鄞州区环合中心一号楼502室</td>
				</tr><br />
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
				observer: true,
				observeParents: true
			});
		</script>
		<script type="text/javascript">
			var date = new Date();
			var year = date.getFullYear(); //获取当前年份
			var mon = date.getMonth() + 1; //获取当前月份
			var da = date.getDate(); //获取当前日
			var mytime = year + "-" + mon + "-" + da;
			$("#time").val(mytime);

			$("#am-btn").click(function() {
				$(".rr").css({
                   	"color":"black",
                   })
				  $(".xx").css({
				  	"display":"none",
				  })
				var reg = /^1[34578][0-9]{9}/;
				var re = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
				var email = $("#doc-vld-email-2").val();
				var phone = $("#doc-vld-phone").val();
				var content = $("#doc-vld-content").val();
				if($("#doc-vld-name").val() != "") {				//名字不为空
					if($("#doc-vld-phone").val() != "" || $("#doc-vld-email-2").val() != "") {			//电话或邮箱不为空
						if(reg.test(phone) || re.test(email)){
								if(phone){
									if(!reg.test(phone)){
										$(".tips").text('您填写的电话号码有误');
										$(".x2").css({
											"display":"inline",
										})
										$(".r2").css({
											"color":"red",
										})
										return false;
									}
								}
								if(email){
									if(!re.test(email)){
										$(".tips").text('您填写的邮箱有误');
										$(".x21").css({
											"display":"inline",
										})
										$(".r3").css({
											"color":"red",
										})
										return false;
									}
								}
								if($("#doc-vld-content").val() != ""){		//内容不为空
									return true;
								}else{
									//layer.msg("请填写您的留言。",{
									//	icon:2
									//});
									$(".tips").text('请填写您的留言');
									$(".x3").css({
										"display":"inline",
									})
									return false;
									
								}
						}else{
								if(phone){
									if(!reg.test(phone)){
										$(".tips").text('您填写的电话号码有误');
										$(".x2").css({
											"display":"inline",
										})
										$(".r2").css({
											"color":"red",
										})
										return false;
									}
								}
								if(email){
									if(!reg.test(email)){
										$(".tips").text('您填写的邮箱有误');
										$(".x21").css({
											"display":"inline",
										})
										$(".r3").css({
											"color":"red",
										})
										return false;
									}
								}
								//layer.msg("您填写的邮箱或号码有误!",{
                        		//	icon:2
                   				//});
								/*$(".tips").text('您填写的邮箱或号码有误');
                   				$(".x2").css({
									//"display":"contents",
                   					"display":"inline",
                   				})*/
								return false;
						}
						
					}else{
						//layer.msg("请填写您的邮箱或号码。",{
                        //	icon:2
                   		//});
						$(".tips").text('请填写您的邮箱或号码');
                   		$(".x2").css({
                   			"display":"inline",
                   		})
						$(".x21").css({
                   			"display":"inline",
                   		})
						return false;
					}
				}else{
					//layer.msg("请填写您的名字。",{
                  //      icon:2
                  // 	});
					$(".tips").text('请填写您的名字');
                   	$(".x1").css({
                   		"display":"inline",
                   	})
					return false;
				}

			})
		</script>

	</body>

</html>