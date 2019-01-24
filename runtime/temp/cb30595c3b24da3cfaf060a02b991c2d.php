<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:35:"./template/pc/jinghui/user/reg.html";i:1542040252;s:40:"./template/pc/jinghui/public/header.html";i:1542287950;s:40:"./template/pc/jinghui/public/footer.html";i:1534148398;}*/ ?>
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
    <link rel="stylesheet" href="__STATIC__/vendor/jquery-labelauty/jquery-labelauty.css"><!--单选复选css-->
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
        .footer{
            margin-top:0;
        }
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
<!--nav-->
<section class="login">
    <div class="login-cont">
        <div class="login-left">
            <img src="__STATIC__/images/login.png" alt="">
        </div>
        <div class="login-right">
            <div class="login-tab">
                <div class="tab-title">
                    <a href="javascript:;" reg-type="1">手机注册</a>
                    <a href="javascript:;" reg-type="2">账号注册</a>
                </div>
                <div class="tab-cont">
                    <form class="form">
                        <div class="tab-item">
							<div class="form-item" style="text-align:center;margin-top:0px;color:red;">
                               <span class="tips"></span>
                            </div>
                            <div class="form-item">
                                <input class="form-control phone-num" type="text" placeholder="请输入手机号" />
                            </div>
                            <div class="form-item">
                                <input class="form-control code-input" type="text" placeholder="请输入验证码" />
                                <button class="get-code">获取验证码</button>
                            </div>
                        </div>
                        <div class="tab-item">
							<div class="form-item" style="text-align:center;margin-top:0px;color:red;">
                               <span class="tips"></span>
                            </div>
                            <div class="form-item">
                                <input class="form-control username" type="text" placeholder="请输入邮箱地址" />
                            </div>
                            <div class="form-item">
                                <input class="form-control password" type="password" placeholder="请输入密码" />
                            </div>
                            <div class="form-item">
                                <input class="form-control password2" type="password" placeholder="请确认密码" />
                            </div>
                        </div>
                        <!-- <div class="form-item">
                            <input class="form-control id-num" type="text" placeholder="请输入身份证号" />
                        </div>
                        <div class="form-item">
                            <input class="form-control true-name" type="text" placeholder="请输入姓名" />
                        </div> -->
                        <div class="form-item">
                            <input type="button" onclick="reg_go()" value="注册" class="btn btn-primary">
                        </div>
                        <div class="form-item">
                            <input type="button" value="有账号，去登录" class="btn btn-default" onclick="window.location.href='/index.php?m=Home&c=User&a=login'">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--footer-->
<div class="container" style="max-width:none;">
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



</div>
<script src="__STATIC__/vendor/jquery.min.js"></script>
<script src="__STATIC__/vendor/jquery.cookie.min.js"></script>
<script src="__STATIC__/vendor/layer/layer.js"></script>
<script src="__STATIC__/vendor/jquery-labelauty/jquery-labelauty.js"></script><!--单选复选美化插件-->
<script src="__STATIC__/js/main.js"></script>
<script>

    $(function(){

        initTab(".login-tab");

        $(":checkbox").labelauty({
            label:false
        });


        //获取验证码
        function getCode(time){
            var obj = $(".get-code");
            var timeStorage = time;
            var timer = null;
            obj.on("click",function(){

                var phoneNum = $(".phone-num").val();
                if( phoneNum.trim() === '' ){
                    layer.msg("请填写手机号码",{
                        icon:2
                    });
                    return;
                }
                if( !checkPhone(phoneNum) ){
                    layer.msg("请填写正确的手机号码",{
                        icon:2
                    });
                    return;
                }
                //这里作交互
                var scene = 1;
                var type = 'type';
                $.post("<?php echo U('Api/send_validate_code'); ?>",{username:phoneNum,scene:scene,type:type},function (re) {

                    // if(re == -1){
                    //     layer.msg("此账号未注册，请先注册");
                    // }
                    
                    layer.msg(re.msg);
                    $(this).attr("disabled","disabled");
                    $(this).html("验证码在"+time+"s后失效");
                    timer = setInterval(function(){
                        time--;
                        if( time >= 0 ){
                            showNotice(time);
                        }else{
                            clearInterval(timer);
                            time = timeStorage;
                            obj.removeAttr("disabled");
                            showNotice();
                        }
                    },1000);
                    
                });
                return false;

            });

            function showNotice(time){
                if( time ){
                    obj.html("验证码在"+time+"s后失效");
                }else{
                    obj.html("获取验证码")
                }
            }
        }
        getCode(100);

        function checkPhone(value){
            return (/^1(3|4|5|7|8)\d{9}$/.test(value))
        }


        //登录如果勾选了记住用户名情调用下面方法
        //$.cookie("username","kobe",{expires:7}); //保存7天
        //$.cookie("phoneNum","15209895622",{expires:7});



        function setUsernameOrPhone(){
            if( $.cookie("phoneNum") ){
                $(".phone-num").val($.cookie("phoneNum"))
            }
            if( $.cookie("username") ){
                $(".username").val($.cookie("username"))
            }
        }
        setUsernameOrPhone();

    })
    
    function reg_go() {
        var reg_type = $('.login-tab .active').attr('reg-type');

        var nickname = $(".true-name").val();
        var usercode = $(".id-num").val();
        //手机注册
        if(reg_type == 1){
            var username = $(".phone-num").val();
            var code = $(".code-input").val();
            var check_phone = 1;
            var password = '';
            var password2 = '';
            var scene = 1;
        }else{
            var username = $(".username").val();
            var code = '';
            var check_phone = 0;
            var password = $(".password").val();
            var password2 = $(".password2").val();
            var scene = 0;
        }

        $.post("<?php echo U('reg'); ?>",{nickname:nickname,usercode:usercode,username:username,code:code,check_phone:check_phone,password:password,password2:password2,scene:scene},function (res) {
            console.log(res);
            //layer.msg(res.msg);
			$(".tips").text(res.msg);
            if(res.status == 1){
                setInterval(function(){
                    window.location.href="<?php echo U('index'); ?>"
                },1000);
            }
        },'json');


    }

</script>
</body>
</html>