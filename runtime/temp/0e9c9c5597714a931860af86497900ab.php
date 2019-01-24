<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:38:"./template/mobile/new2/user/login.html";i:1539407624;s:41:"./template/mobile/new2/public/header.html";i:1527754982;}*/ ?>
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


<header id="header-simple"
        data-am-widget="header"
        class="am-header am-header-default">
    <div class="am-header-left am-header-nav">
        <a href="<?php echo U('reg',array('foid'=>$foid)); ?>" class="">
           注册
        </a>
    </div>
    <h1 class="am-header-title">
        账号登录
    </h1>
    <a class="am-header-right am-header-nav login-close" href="/"><span>&times;</span></a>
</header>
<div class="bottomPlaceholder"></div>
<div class="login-cont">
    <form class="form">
        <div class="form-item">
            <input class="am-form-field am-round username" type="text" placeholder="手机号码">
        </div>
        <div class="form-item has-link">
            <input class="am-form-field am-round password" type="password" placeholder="输入密码">
            <a href="">忘记密码</a>
        </div>
        <div class="form-item">
            <button class="am-btn am-btn-primary am-round" onclick="login_go()" type="button">登录</button>
        </div>
        <div class="or">或</div>
        <div class="form-item">
            <a class="am-btn am-btn-default am-round" href="<?php echo U('login_phone'); ?>" >切换手机快捷登录</a>
        </div>
    </form>
</div>
<script src="__STATIC__/js/jquery.min.js"></script>
<script src="__STATIC__/amaze/js/amazeui.min.js"></script>
<script src="__STATIC__/amaze/js/amazeui.swiper.min.js"></script>
<script src="__STATIC__/layer_mobile/layer.js"></script>
<script src="__STATIC__/js/index.js"></script>
<script>
	function login_go() {
        
		
        var username = $(".username").val();
        var password = $(".password").val();
        $.post("<?php echo U('do_login'); ?>",{username:username,password:password},function (res) {
            layer.open({
                content:res.msg,
                time: 1.5
            });
			if(res.status == 1){
				location.href='/';
			}
        },'json');
		

    }
</script>
</body>
</html>